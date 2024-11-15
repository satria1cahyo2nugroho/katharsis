{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- boostrap v.5.3 -->
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('landpage/costcss/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Login</title>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('landpage/assets/image/ww.jpg') }}" alt="login form"
                                    class="img-fluid" style="border-radius: 1rem 0 0 1rem" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('landpage/assets/logo2.png') }}"
                                                class="rounded img-fluid" alt="..." />
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                                            Login into your account
                                        </h5>

                                        <div class="mb-3">
                                            <label class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="name@example.com" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group">
                                                <input id="pw-input" type="password" name="password"
                                                    class="form-control" placeholder="*******" />
                                                <button class="btn btn-outline-primary" type="button"
                                                    id="togglePassword"><i class="bi bi-eye-slash"></i></button>
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                    <div class="mt-3">
                                        @if (Route::has('password.request'))
                                            <a class="text" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                        <p class="mb-5 pb-lg-2" style="color: #393f81">
                                            Don't have an account?
                                            <a href="{{ 'register' }}" style="color: #393f81">Register here</a>
                                        </p>
                                        <a class="small text-muted" href="{{ '/' }}">kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- boostrap js 5.3 -->
<script src="{{ asset('landpagebootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('landpagejquery/jquery3.7.1.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- password --}}
<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        var passwordField = document.getElementById('pw-input');
        var toggleButton = document.getElementById('togglePassword');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleButton.innerHTML = '<i class="bi bi-eye"></i>';
            // Change icon to show it is now visible 
        } else {
            passwordField.type = 'password';
            toggleButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
            // Change icon to show it is now hidden 
        }
    });
</script>

</html>
