@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')
    <div class="container mt-5">
        <h1 class="display-4 text-center" style="color: #003366;">Edit Tugas</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="form-label" style="color: black;">Judul Tugas</label>
                <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="form-control" required style="border-radius: 10px;">
            </div>

            <div class="mb-4">
                <label for="description" class="form-label" style="color: black;">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" required style="border-radius: 10px;">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="deadline" class="form-label" style="color: black;">Tenggat Waktu</label>
                <input type="date" name="deadline" id="deadline" value="{{ old('deadline', $task->deadline) }}" class="form-control" required style="border-radius: 10px;">
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_completed" style="color: black;">Tugas Selesai</label>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg" style="border-radius: 50px; padding: 10px 30px; transition: background-color 0.3s ease, transform 0.3s ease;">
                    Perbarui Tugas
                </button>
            </div>
        </form>
    </div>

    <script>
        // Animasi untuk form saat halaman dimuat
        document.querySelector('form').classList.add('fadeIn');
    </script>

    <style>
        /* Animasi FadeIn */
        .fadeIn {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Button hover effect */
        .btn:hover {
            background-color: #2ecc71;
            transform: scale(1.05);
            transition: background-color 0.3s ease, transform 0.3s ease-in-out;
        }
    </style>
@endsection
