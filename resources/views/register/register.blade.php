@extends('layoutes.auth')
@section('content')

<body>
    <div class="relative flex flex-col justify-center min-h-screen bg-gradient-to-r from-blue-500 to-blue-700">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-xl lg:max-w-xl">
            <!-- Title Section -->
            <h1 class="text-3xl font-semibold text-center text-blue-700 uppercase">
                Register
            </h1>

            <p class="mt-4 text-sm text-center text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Login di sini</a>
            </p>

            <!-- Form Register -->
            <form action="{{ route('actionregister') }}" method="post" class="mt-6" onsubmit="return validatePassword()">
                @csrf <!-- CSRF Token -->

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-sm text-gray-800">Email</label>
                    <input type="email" name="email" id="email" required class="block w-full px-4 py-2 mt-2 text-blue-700 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Masukkan email Anda">
                </div>

                <!-- Input Username -->
                <div class="mt-4">
                    <label for="username" class="block text-sm text-gray-800">Username</label>
                    <input type="text" name="name" id="username" required class="block w-full px-4 py-2 mt-2 text-blue-700 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Masukkan username Anda">
                </div>

                <!-- Input Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm text-gray-800">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required class="block w-full px-4 py-2 mt-2 text-blue-700 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Masukkan password Anda">
                        <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-5 h-5 absolute right-3 top-3 cursor-pointer" viewBox="0 0 128 128">
                            <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                        </svg>
                    </div>
                </div>

                <!-- Input Retype Password -->
                <div class="mt-4">
                    <label for="retype_password" class="block text-sm text-gray-800">Retype Password</label>
                    <div class="relative">
                        <input type="password" name="retype_password" id="retype_password" required class="block w-full px-4 py-2 mt-2 text-blue-700 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Ulangi password Anda">
                        <svg id="toggleRetypePassword" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-5 h-5 absolute right-3 top-3 cursor-pointer" viewBox="0 0 128 128">
                            <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                        </svg>
                    </div>
                    <p id="passwordError" class="text-red-500 text-sm mt-2 hidden">Password tidak cocok!</p>
                </div>

                <!-- Tombol Register -->
                <div class="mt-6">
                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Section -->
    <script>
        // Toggle visibility of password
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });

        document.getElementById('toggleRetypePassword').addEventListener('click', function() {
            const retypePasswordInput = document.getElementById('retype_password');
            const type = retypePasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            retypePasswordInput.setAttribute('type', type);
        });

        // Validate passwords match
        function validatePassword() {
            const password = document.getElementById('password').value;
            const retypePassword = document.getElementById('retype_password').value;
            const passwordError = document.getElementById('passwordError');

            if (password !== retypePassword) {
                passwordError.classList.remove('hidden');
                return false; // Stop form submission
            } else {
                passwordError.classList.add('hidden');
                return true; // Allow form submission
            }
        }
    </script>
</body>
@endsection
