<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
{
    $query = Task::query();

    // Filter berdasarkan pencarian
    if ($request->has('search') && $request->search != '') {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('deadline', 'like', '%' . $request->search . '%');
    }

    // Filter berdasarkan status
    if ($request->has('status')) {
        if ($request->status == 'completed') {
            $query->where('is_completed', true);
        } elseif ($request->status == 'pending') {
            $query->where('is_completed', false);
        }
    }

    // Urutkan berdasarkan pilihan
    if ($request->has('sort_by')) {
        switch ($request->sort_by) {
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'deadline_asc':
                $query->orderBy('deadline', 'asc');
                break;
            case 'deadline_desc':
                $query->orderBy('deadline', 'desc');
                break;
        }
    }

    // Ambil data dengan pagination
    $tasks = $query->paginate(10);

    return view('tasks.index', compact('tasks'));
}



    public function create()
    {
        return view('tasks.create');
    }

    // 3. Menyimpan tugas baru
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'deadline' => 'required|date',
    ]);

    Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'deadline' => $request->deadline,
        'is_completed' => false,
        'user_id' => Auth::id(),  // Menyimpan ID pengguna yang sedang login
    ]);

    return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');
}


    // 4. Menampilkan detail tugas
    public function show(Task $task)
{
    if ($task->user_id !== Auth::id()) {
        abort(403);  // Mengarahkan pengguna ke halaman error jika tugas bukan miliknya
    }

    return view('tasks.show', compact('task'));
}


    // 5. Menampilkan form untuk mengedit tugas
    public function edit(Task $task)
{
    if ($task->user_id !== Auth::id()) {
        abort(403);
    }

    return view('tasks.edit', compact('task'));
}

    // 6. Memperbarui data tugas
    public function update(Request $request, Task $task)
{
    if ($task->user_id !== Auth::id()) {
        abort(403);
    }

    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'deadline' => 'required|date',
    ]);

    // Memeriksa jika checkbox dicentang, nilai is_completed diubah menjadi 1, jika tidak menjadi 0
    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'deadline' => $request->deadline,
        'is_completed' => $request->has('is_completed') ? 1 : 0,  // Menyimpan 1 jika dicentang, 0 jika tidak
    ]);

    return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
}


    // 7. Menghapus tugas
    public function destroy(Task $task)
{
    if ($task->user_id !== Auth::id()) {
        abort(403);
    }

    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
}





}


