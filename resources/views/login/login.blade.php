@extends('layoutes.auth')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container py-5">
        <div class="w-50 border rounded px-3 py-3 mx-auto">
            <h1 class="mb-4">Login</h1>

            <!-- Error Message -->
            @if(session('error'))
                <div class="alert alert-danger">
                    <b>Oops!</b> {{ session('error') }}
                </div>
            @endif

            <!-- Form Login -->
            <form action="{{ route('actionlogin') }}" method="POST">
                @csrf <!-- CSRF Token -->

                <!-- Input Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required placeholder="Enter your email">
                </div>

                <!-- Input Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required placeholder="Enter your password">
                </div>

                <!-- Submit Button -->
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <!-- Register Link -->
            <p class="text-center mt-3">
                Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Register disini</a>
            </p>
        </div>
    </div>

    <!-- Toggle Password Visibility Script -->
    <script>
        document.getElementById('password').addEventListener('click', function () {
            const type = this.getAttribute('type') === 'password' ? 'text' : 'password';
            this.setAttribute('type', type);
        });
    </script>
</body>
</html>

@endsection
