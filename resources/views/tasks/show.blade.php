@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')
    <h1 style="color: black;">{{ $task->title }}</h1>
    <p style="color: black;"><strong>Deskripsi:</strong> {{ $task->description }}</p>
    <p style="color: black;"><strong>Tenggat Waktu:</strong> {{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</p>
    <p style="color: black;"><strong>Status:</strong>
        <span class="badge {{ $task->is_completed ? 'bg-success' : 'bg-warning' }}">
            {{ $task->is_completed ? 'Selesai' : 'Belum Selesai' }}
        </span>
    </p>

    <div>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Kembali ke Daftar Tugas</a>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Tugas</a>

        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="mt-3" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus Tugas</button>
        </form>
    </div>
@endsection
