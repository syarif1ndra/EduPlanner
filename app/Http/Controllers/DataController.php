<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function index()
    {
        // Ambil data statistik tugas untuk pengguna yang sedang login
        $totalTasks = Task::where('user_id', Auth::id())->count(); // Hitung total tugas untuk user
        $completedTasks = Task::where('user_id', Auth::id())->where('is_completed', true)->count(); // Hitung tugas yang selesai untuk user
        $pendingTasks = Task::where('user_id', Auth::id())->where('is_completed', false)->count(); // Hitung tugas yang belum selesai untuk user

        // Kirim data ke view
        return view('data.index', compact('totalTasks', 'completedTasks', 'pendingTasks'));
    }
}
