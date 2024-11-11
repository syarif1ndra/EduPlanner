@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container mt-5">
        <h1 class="display-4 text-center" style="color: #003366;">Profile Anda</h1>

        <!-- Tampilkan informasi profil pengguna -->
        <div class="card shadow-lg p-4 rounded" style="background-color: #ffffff; border-radius: 15px;">
            <div class="card-header text-center" style="background-color: #003366; color: #ffffff; border-radius: 15px 15px 0 0;">
                <h3 class="font-weight-bold">{{ Auth::user()->name }}</h3>
            </div>
            <div class="card-body" style="padding: 30px;">
                <div class="d-flex justify-content-center mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Profile Picture" class="rounded-circle" width="120" height="120">
                </div>

                <p class="lead"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p class="lead"><strong>Joined:</strong> {{ Auth::user()->created_at->format('d-m-Y') }}</p>

                <div class="text-center mt-4">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg" style="background-color: #003366; border-radius: 50px; padding: 12px 35px; width: 100%; transition: all 0.3s ease;">
                        Edit Profil
                    </a>
                </div>

                <div class="text-center mt-3">
                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg" style="border-radius: 50px; padding: 12px 35px; width: 100%; transition: all 0.3s ease;">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animasi saat halaman dimuat
        document.querySelector('.card').classList.add('fadeIn');
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
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        /* Gaya untuk avatar */
        .card img {
            border: 4px solid #003366;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Styling untuk teks */
        .lead {
            font-size: 1.2rem;
            font-weight: 500;
            color: #333333;
        }
    </style>
@endsection
