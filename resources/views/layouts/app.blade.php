<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        /* Warna tema biru tua */
        :root {
            --primary-color: #003366;
            --secondary-color: #f0f0f0;
            --accent-color: #ffcc00;
        }

        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-family: 'Arial', sans-serif;
            /* Background gradient */
            background: linear-gradient(120deg, #003366, #336699, #00aaff);
            background-size: cover;
            background-attachment: fixed;
            color: #ffffff;
        }

        /* Atau Gambar Background */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            opacity: 0.15; /* Transparansi gambar background */
            z-index: -1;
        }

        /* Navbar */
        .navbar {
            background-color: rgba(0, 51, 102, 0.8); /* Transparan agar background terlihat */
            transition: background-color 0.3s ease;
        }
        .navbar-brand {
            color: #ffffff !important;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #ffffff !important;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: var(--accent-color) !important;
        }

        /* Konten Fade-in */
        .container {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.8s ease-out forwards;
            animation-delay: 0.5s;
            background-color: rgba(255, 255, 255, 0.8); /* Warna putih transparan */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Animasi Fade-In */
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

        /* Footer Transisi */
        footer {
            background-color: var(--primary-color);
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin-top: auto;
            animation: slideUp 0.8s ease-out forwards;
            animation-delay: 1s;
        }
        .navbar-logo {
            height: 40px; /* Sesuaikan dengan tinggi navbar */
            filter: brightness(0) invert(1); /* Membuat logo menjadi putih */
        }

        /* Animasi Slide-Up */
        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Pagination */
        .pagination {
            opacity: 0;
            animation: fadeInPagination 1s ease-out forwards;
            animation-delay: 0.8s;
            margin-top: 20px;
            margin-bottom: 20px;
            justify-content: center;
        }

        /* Animasi Fade-In pada Pagination */
        @keyframes fadeInPagination {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('tasks.index') }}">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo EduPlanner" class="navbar-logo"> EduPlanner
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('tasks.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('data.index') }}">Data</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile.index') }}">Profile</a></li>
                    @endauth
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endguest
                    <!-- Waktu Realtime -->
                    <li class="nav-item">
                        <span id="current-time" class="nav-link" style="color: #ffffff; font-weight: bold;"></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer>
        <p>&copy; 2024 EduPlanner | <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script untuk menampilkan waktu real-time
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateTime, 1000); // Update setiap detik
        updateTime(); // Panggil saat halaman pertama kali dimuat
    </script>
</body>
</html>
