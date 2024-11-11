@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4" style="color: #003366;">Daftar Tugas</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-success btn-lg" style="border-radius: 50px; padding: 10px 30px;">
            <i class="bi bi-plus-circle"></i> Tambah Tugas
        </a>
    </div>

    <!-- Form Pencarian dan Filter -->
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Pencarian -->
            <input type="text" name="search" class="form-control w-50" placeholder="Cari berdasarkan nama atau deadline" value="{{ request()->query('search') }}" style="margin-right: 10px;">

            <!-- Filter berdasarkan abjad dan deadline -->
            <select name="sort_by" class="form-control w-25" style="margin-right: 10px;">
                <option value="" disabled selected>Sort by</option>
                <option value="title_asc" {{ request()->query('sort_by') == 'title_asc' ? 'selected' : '' }}>A-Z (Judul)</option>
                <option value="title_desc" {{ request()->query('sort_by') == 'title_desc' ? 'selected' : '' }}>Z-A (Judul)</option>
                <option value="deadline_asc" {{ request()->query('sort_by') == 'deadline_asc' ? 'selected' : '' }}>Deadline Terdekat</option>
                <option value="deadline_desc" {{ request()->query('sort_by') == 'deadline_desc' ? 'selected' : '' }}>Deadline Terlama</option>
            </select>

            <!-- Filter Status -->
            <select name="status" class="form-control w-25" style="margin-right: 10px;">
                <option value="">Semua Status</option>
                <option value="completed" {{ request()->query('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                <option value="pending" {{ request()->query('status') == 'pending' ? 'selected' : '' }}>Belum Selesai</option>
            </select>

            <!-- Tombol Cari -->
            <button type="submit" class="btn btn-primary" style="padding: 10px 30px;">Cari</button>
        </div>
    </form>



    <!-- Tugas -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($tasks->isEmpty())
        <div class="alert alert-warning" role="alert">
            Belum ada tugas. Tambahkan tugas baru!
        </div>
    @else
        <div class="list-group">
            @foreach ($tasks as $task)
                <a href="{{ route('tasks.show', $task->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-3 mb-2" style="border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: background-color 0.3s ease;">
                    <span class="text-dark" style="font-size: 1.2rem;">{{ $task->title }}</span>
                    <div class="d-flex align-items-center">
                        <span class="badge {{ $task->is_completed ? 'bg-success' : 'bg-warning' }}" style="font-size: 1rem;">
                            {{ $task->is_completed ? 'Selesai' : 'Belum Selesai' }}
                        </span>
                        <span class="text-muted" style="font-size: 0.9rem; font-style: italic; margin-left: 10px;">
                            {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-3 d-flex justify-content-center">
            {{ $tasks->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>

    @endif
@endsection
