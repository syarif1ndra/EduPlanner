@extends('layouts.app')

@section('title', 'Statistik Tugas')

@section('content')
    <h1 class="display-4 text-center" style="color: #003366;">Statistik Tugas</h1>

    <div class="row mt-5">
        <!-- Total Tugas Card -->
        <div class="col-md-4">
            <div class="card shadow-lg" style="border-radius: 12px; background-color: #003366; color: white;">
                <div class="card-header" style="background-color: #002244; border-radius: 12px 12px 0 0;">
                    <h5>Total Tugas</h5>
                </div>
                <div class="card-body text-center" style="font-size: 1.5rem;">
                    <h4>{{ $totalTasks }}</h4>
                </div>
            </div>
        </div>

        <!-- Tugas Selesai Card -->
        <div class="col-md-4">
            <div class="card shadow-lg" style="border-radius: 12px; background-color: #27ae60; color: white;">
                <div class="card-header" style="background-color: #1e8449; border-radius: 12px 12px 0 0;">
                    <h5>Tugas Selesai</h5>
                </div>
                <div class="card-body text-center" style="font-size: 1.5rem;">
                    <h4>{{ $completedTasks }}</h4>
                </div>
            </div>
        </div>

        <!-- Tugas Belum Selesai Card -->
        <div class="col-md-4">
            <div class="card shadow-lg" style="border-radius: 12px; background-color: #e74c3c; color: white;">
                <div class="card-header" style="background-color: #c0392b; border-radius: 12px 12px 0 0;">
                    <h5>Tugas Belum Selesai</h5>
                </div>
                <div class="card-body text-center" style="font-size: 1.5rem;">
                    <h4>{{ $pendingTasks }}</h4>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animasi ketika halaman dimuat
        document.querySelectorAll('.card').forEach(function(card) {
            card.classList.add('fadeIn');
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

        /* Card hover effect */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
    </style>
@endsection
