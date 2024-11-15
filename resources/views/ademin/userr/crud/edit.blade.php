<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('landpage/bootstrap/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('landpage/summernote/summernote-bs5.css') }}" /> --}}
    {{-- <script src=" {{ asset('landpage/summernote/summernote-bs5.js') }}"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>EDIT-USER</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('EDIT USER') }}
                </h2>
            </div>
        </header>
        <!-- Page Content -->
        <main>

            <div class="content mt-5">
                <div class="container flex-auto">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('user-view') }}" class="btn btn-primary" type="button">Kembali</a>
                        </div>
                        <form action="{{ route('user-update', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="card-vody">
                                    <div class="container text-center">
                                        <div class="row justify-content-around">
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Nama
                                                        User</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="name" value="{{ $data->name }}">
                                                    @error('name')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Email
                                                        address</label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="exampleFormControlInput1" placeholder="name@example.com"
                                                        value="{{ $data->email }}">
                                                    @error('email')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-around">
                                            <div class="alert alert-info" role="alert">
                                                Password bisa dikosongkan jika memang tidak diganti
                                            </div>
                                        </div>
                                        <div class="row justify-content-around">
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="pw-input" name="password"
                                                            type="password" placeholder="**********">
                                                        <button class="btn btn-outline-primary" type="button"
                                                            id="togglePassword"><i class="bi bi-eye-slash"></i></button>
                                                    </div>
                                                    @error('password')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="password_confirmation"
                                                        class="form-label">Re-Password</label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="password_confirmation"
                                                            name="password_confirmation" type="password"
                                                            placeholder="**********">
                                                        <button class="btn btn-outline-primary" type="button"
                                                            id="togglePassword2"><i
                                                                class="bi bi-eye-slash"></i></button>
                                                    </div>

                                                    @error('password_confirmation')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row justify-content-around">
                                            <div class="col">
                                                <div class="m-3">
                                                    <label for="exampleFormControlInput1"
                                                        class="form-label">Role</label>
                                                    <select name="role" class="form-select"
                                                        aria-label="Default select example">
                                                        <option value="" disabled selected>Silahkan Pilih Role
                                                        </option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}"
                                                                {{ $data->roles->first()->name == $role->name ? 'selected' : '' }}>
                                                                {{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>


<script src="{{ asset('landpage/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery -->
<script src=" {{ asset('landpage/jquery/jquery3.7.1.min.js') }}"></script>
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
{{-- re-paswrdo --}}
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
