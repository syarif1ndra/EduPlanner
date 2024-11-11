@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')
    <div class="container mt-5">
        <h1 class="display-4 text-center" style="color: #003366;">Tambah Tugas Baru</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="title" class="form-label" style="color: black;">Judul Tugas</label>
                <input type="text" class="form-control" id="title" name="title" required style="border-radius: 10px;">
            </div>
            <div class="mb-4">
                <label for="description" class="form-label" style="color: black;">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="4" required style="border-radius: 10px;"></textarea>
            </div>
            <div class="mb-4">
                <label for="deadline" class="form-label" style="color: black;">Tenggat Waktu</label>
                <input type="date" class="form-control" id="deadline" name="deadline" required style="border-radius: 10px;">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg" style="background-color: #27ae60; border-radius: 50px; padding: 10px 30px; transition: background-color 0.3s ease;">
                    Simpan Tugas
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
