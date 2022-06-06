<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yokogawa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/addstakeholder.css')}}">

        <!--Logo-->
        <link rel="icon" href="data:image/jpeg;base64,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">
        <link rel="stylesheet" href="{{asset('css/dashboardadmin.css')}}">


    </head>
      @include('layouts.superadminnavbar')
    <body class="antialiased">
      <h1 class="ml-3 ">Add Engineer</h1>
       <div class="register ">
            <form method="post" action="{{ route('engineer.store') }}">
                @csrf
                <input type="text" name="name" placeholder="Name" required="required" />
                <input type="text" name="email" placeholder="Email" required="required" />
                <input type="password" name="password" placeholder="Password" required="required" />
                <input type="password" name="retypePassword" placeholder="Retype Password " required="required" />
                <button type="submit" class="btn  btn-block btn-large">Add Engineer</button>
            </form>
        </div>
    </body>
</html>
