<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    // 1. Menampilkan daftar tugas
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

    // Ambil data dengan pagination dan query string
    $tasks = $query->paginate(10)->appends(request()->query());

    return view('tasks.index', compact('tasks'));
}


    // 2. Menampilkan form untuk membuat tugas baru
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

        // Konversi deadline ke format datetime
        $deadline = Carbon::parse($request->deadline)->format('Y-m-d H:i:s');

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $deadline,
            'is_completed' => false,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    // 4. Menampilkan detail tugas
    public function show(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        // Menghitung waktu yang tersisa
        $task->time_remaining = Carbon::parse($task->deadline)->diffForHumans();

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

        // Konversi deadline ke format datetime
        $deadline = Carbon::parse($request->deadline)->format('Y-m-d H:i:s');

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $deadline,
            'is_completed' => $request->has('is_completed') ? 1 : 0,
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
