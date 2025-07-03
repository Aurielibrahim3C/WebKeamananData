<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Button color change on click */
        .btn-clicked {
            background-color: #4CAF50;
            color: white;
        }

        /* RGB Border effect for inputs */
        .focus\:rgb-border:focus {
            border-color: rgb(255, 0, 0); /* RGB color for disco effect */
        }

        /* RGB gradient for the form container */
        .form-gradient {
            background: linear-gradient(45deg, rgb(255, 0, 0), rgb(255, 0, 255), rgb(0, 255, 255), rgb(0, 255, 0));
            background-size: 400% 400%;
            animation: gradient 5s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 100% 0;
            }

            50% {
                background-position: 0 100%;
            }

            100% {
                background-position: 100% 0;
            }
        }
    </style>
</head>

<body class="bg-white min-h-screen flex justify-center items-center">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8 form-gradient">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">SINTA-TI</h2>

        <!-- Error message display -->
        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Login form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Username input -->
            <div class="mb-5">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Email Address / UserName</label>
                <input type="username" name="username" id="username"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:rgb-border transition duration-300"
                    placeholder="example@domain.com" required autofocus>
            </div>

            <!-- Password input -->
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:rgb-border transition duration-300"
                    placeholder="••••••••" required>
            </div>

            <!-- Remember me checkbox -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Remember Me</label>
                </div>
            </div>

            <!-- Login button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300"
                id="login-btn">
                Login
            </button>
        </form>

        <!-- Sign up link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Don't have an account?</p>
        </div>
    </div>

    <script>
        const loginButton = document.getElementById("login-btn");

        loginButton.addEventListener("click", function() {
            loginButton.classList.toggle("btn-clicked");
        });
    </script>

</body>

</html>
