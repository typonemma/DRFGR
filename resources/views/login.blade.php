<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login - Yokogawa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/css/style.css')}}"


    </head>
    <body class="antialiased">
       <div class="login">
        <h1>Login</h1>
        <h2>{{ $title }}</h2>
            <form method="post" action="{{ route('login.authenticate') }}">
                @csrf
                <input type="text" name="email" placeholder="Email" required="required" />
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <input type="password" name="password" placeholder="Password" required="required" />
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{ session('loginError') }}
                <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
            </form>
        </div>
    </body>
</html>
