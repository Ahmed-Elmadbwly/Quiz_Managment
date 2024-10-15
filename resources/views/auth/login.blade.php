{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
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
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- link style -->
    <link rel="stylesheet" href="{{ asset('src/css/style.css') }}" />

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- include link font "english"-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Concert+One&family=Seymour+One&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    <!--  include font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- include link Alerts "iziToast" -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
        integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('src/css/btn.css') }}">

</head>

<body>

    <div class="login vh-100">
        <div class="d-block d-lg-flex d-xl-flex h-100 w-100">

            <div class="col-lg-6 col-xl-7 h-100">
                <div class="d-flex align-items-center justify-content-center p-5 h-100">

                    <div class="content-login">
                        <form class="loginTeacher" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="text-center mb-5">
                                <p class="welcome">WELCOME TO</p>
                                <p class="logo">Quiz <span>Managment</span></p>
                            </div>

                            <!-- username -->
                            <div class="mb-3">
                                <label for="username" class="label">Email</label>
                                <input type="text" id="username" name="email" class="input" required>
                                <div class="error me-3">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <!-- password -->
                            <div class="position-relative">
                                <label for="password" class="label">Password</label>
                                <input type="password" id="password" name="password" class="input auth__password"
                                    required>
                                <span class="password__icon">
                                    <i class="text-primary fs-6 fw-bold fa-solid fa-eye-slash eye cursor-pointer"></i>
                                </span>
                                <div class="error me-3">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="primary-btn w-100 mt-4">Login</button>
                        </form>
                    </div>

                </div>
            </div>

            <div class="images-login col-lg-6 col-xl-5 d-none d-lg-block d-xl-block" dir="ltr">
                <div class="w-100 h-100 d-flex align-items-center">
                    <div class="slider">
                        <div class="list">
                            <div class="item">
                                <img src="{{ asset('src/images/subject/english.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('src/images/subject/math - .jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('src/images/subject/science.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('src/images/subject/social-studies.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{ asset('src/images/subject/math.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="buttons">
                            <button id="prev">
                                < </button>
                                    <button id="next">></button>
                        </div>
                        <ul class="dots">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="{{ asset('src/js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
        integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
