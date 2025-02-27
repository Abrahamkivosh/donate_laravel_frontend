{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.guest')

@section('styles')
    <!-- Link to Animate.css for animation -->
    <link href="https://cdn.jsdelivr.net/npm/animate.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .login-container {
            max-width: 450px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(50px);
            opacity: 0;
        }

        .login-container.show {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.7s ease-out;
        }

        .form-input {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            width: 100%;
            margin-bottom: 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .btn-login {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 2rem 0;
            border-radius: 10px;
            width: 100%;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #45a049;
        }

        .text-center {
            margin-top: 10px;
            font-size: 14px;
        }

        .text-center a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .text-danger {
            color: #ff0000;
            font-size: 14px;
        }

        .bg-light {
            background-color: #f3f4f6;
            height: 100vh;
        }
    </style>
@endsection

@section('content')
    <div class=" d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="login-container animate__animated animate__fadeIn animate__delay-1s ">
            <div class="text-center mb-5">
                <h2 class="text-2xl font-semibold">Login to Your Account</h2>
                <p class="text-gray-600 mt-2">Welcome back! Please enter your credentials to continue.</p>
            </div>
            <div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        class="form-input form-control" placeholder="Email Address">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="password" name="password" required autocomplete="current-password"
                        class="form-input form-control" placeholder="Password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" class="text-muted small">Remember Me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-muted small" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn-login btn">Login</button>
            </form>

            <div class="text-center mt-4">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Initialize Page Animation on Load -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loginContainer = document.querySelector('.login-container');
            loginContainer.classList.add('show');
        });
    </script>
@endsection
