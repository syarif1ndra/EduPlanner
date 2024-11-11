@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="container mt-5">
        <h1 class="display-4 text-center" style="color: #003366;">Edit Profil Anda</h1>

        <!-- Menampilkan pesan status jika ada -->
        @if(session('status') == 'profile-updated')
            <div class="alert alert-success text-center" role="alert">
                Profil berhasil diperbarui!
            </div>
        @endif

        <!-- Formulir untuk mengedit profil -->
        <form action="{{ route('profile.update') }}" method="POST" class="shadow-lg p-4 rounded" style="background-color: #ffffff;">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="form-label" style="color: #003366;">Nama</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ old('name', Auth::user()->name) }}" required style="border-radius: 10px;"/>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label" style="color: #003366;">Email (Tidak dapat diubah)</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{ old('email', Auth::user()->email) }}" required style="border-radius: 10px;" disabled/>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg px-5 py-3" style="background-color: #003366; border-radius: 50px; width: 100%;">Perbarui Profil</button>
            </div>
        </form>

        <!-- Tombol Logout -->
        <div class="text-center mt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-lg px-5 py-3" style="border-radius: 50px; width: 100%;">Logout</button>
            </form>
        </div>

    </div>

    <script>
        // Animasi ketika halaman dimuat
        document.querySelectorAll('.form-control').forEach(function(input) {
            input.classList.add('fadeIn');
        });
    </script>

    <style>
        /* Animasi */
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
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        /* Alert Box Animations */
        .alert {
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
