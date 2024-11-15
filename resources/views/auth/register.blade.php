{{-- <!DOCTYPE html>
<html lang="en"> --}}
{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {<link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    @vite('resources/css/app.css')
    <title>Login</title>
</head> --}}
{{-- <body>
    <div class="max-w-xl h-80 bg-transparent mx-auto">
        <image src="{{ asset('landpage/assets/logo.png') }}">
    </div>
    <div class=" max-w-xl mt-10 h-90 mx-auto bg-white">
        <div class="border rounded-lg shadow-lg p-10">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- boostrap v.5.3 -->
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('landpage/costcss/style.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- @vite('resources/css/app.css') --}}
    <title>Register</title>
</head>


<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block"> <img
                                    src="{{ asset('landpage/assets/image/ww.jpg') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem" /> </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1"> <img
                                                src="{{ asset('landpage/assets/logo2.png') }}" class="rounded img-fluid"
                                                alt="Logo" /> </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px"> Create New Account
                                        </h5>
                                        {{-- name --}}
                                        <div class="mb-3"> <label class="form-label" for="name">Nama</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="your name" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        {{-- email --}}
                                        <div class="mb-3"> <label class="form-label" for="email">Email
                                                address</label> <input id="email" name="email" type="email"
                                                class="form-control" placeholder="name@example.com" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        {{-- password --}}
                                        <div class="mb-3"> <label class="form-label" for="password">Password</label>
                                            <div class="input-group">
                                                <input id="password" name="password" type="password"
                                                    class="form-control" placeholder="*******" />
                                                <button class="btn btn-outline-primary" type="button"
                                                    id="togglePassword"><i class="bi bi-eye-slash"></i></button>
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        {{-- re-password --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">Re-Password</label>
                                            <div class="input-group">
                                                <input id="password_confirmation" name="password_confirmation"
                                                    type="password" class="form-control" placeholder="*******" />
                                                <button class="btn btn-outline-primary" type="button"
                                                    id="togglePassword2"><i class="bi bi-eye-slash"></i></button>
                                            </div>
                                        </div>
                                        <div class="d-grid"> <button class="btn btn-primary" type="submit">
                                                Register
                                            </button> </div>
                                        <div class="mt-1"> <a class="small text-muted"
                                                href="{{ route('login') }}">already have account ??</a> </div>
                                        <a class="small text-muted" href="{{ '/' }}">kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- boostrap js 5.3 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jquery/jquery3.7.1.min.js"></script>
        {{-- password --}}
        <script>
            document.getElementById('togglePassword').addEventListener('click', function() {
                var passwordField = document.getElementById('password');
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
        {{-- re-password --}}
        <script>
            document.getElementById('togglePassword2').addEventListener('click', function() {
                var passwordField = document.getElementById('password_confirmation');
                var toggleButton = document.getElementById('togglePassword2');
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
