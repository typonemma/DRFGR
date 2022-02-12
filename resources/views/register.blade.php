<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            @import url(https://fonts.googleapis.com/css?family=Open+Sans);
            .btn {
                color: #000000;

            }
            .btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] {
                background-color: #e6e6e6;
            }
            .btn-large {
                padding: 9px 14px;
                font-size: 15px;
                line-height: normal;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
            }
            .btn:hover {
                color: #333333;
                text-decoration: none;
                background-color: #DFB305;
                background-position: 0 -15px;
                -webkit-transition: background-position 0.1s linear;
                -moz-transition: background-position 0.1s linear;
                -ms-transition: background-position 0.1s linear;
                -o-transition: background-position 0.1s linear;
                transition: background-position 0.1s linear;
            }
            .btn-primary, .btn-primary:hover {
                text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
                color: #000;
            }
            .btn-primary.active {
                color: #DFB305;
            }
            .btn-primary {
                background-color: transparent;
                background-repeat: repeat-x;
                filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);
                border: 5px solid #000000;
                text-shadow: 1px 1px 1px rgba(0,0,0,0.4);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5);
            }
            .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] {
                filter: none;
                background-color: #DFB305;
            }
            .btn-block {
                width: 100%;
                display:block;
            }
            * {
                -webkit-box-sizing:border-box;
                -moz-box-sizing:border-box;
                -ms-box-sizing:border-box;
                -o-box-sizing:border-box;
                box-sizing:border-box;
            }
            html {
                width: 100%;
                height:100%;
                overflow:hidden;
            }
            body {
                width: 100%;
                height:100%;
                font-family: 'Open Sans', sans-serif;
                background: #DAC15F;

            }
            .register {
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -150px 0 0 -150px;
                width:300px;
                height:300px;
            }
            .register h1 {
                color: #000000;
                text-shadow: 0 0 10px rgba(0,0,0,0.3);
                letter-spacing:1px;
                text-align:center;
            }
            input {
                width: 100%;
                margin-bottom: 10px;
                background: rgba(21,18,18,1);
                border: none;
                outline: none;
                padding: 10px;
                font-size: 13px;
                color: #000000;

                border: 1px solid rgba(0,0,0,0.3);
                border-radius: 4px;
                box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
                -webkit-transition: box-shadow .5s ease;
                -moz-transition: box-shadow .5s ease;
                -o-transition: box-shadow .5s ease;
                -ms-transition: box-shadow .5s ease;
                transition: box-shadow .5s ease;
            }
            input:focus {
                color: #ffffff;
            }

        </style>


    </head>
    <body class="antialiased">
       <div class="register">
        <h1>Register</h1>
            <form method="post" action="{{ route('register.store') }}">
                @csrf
                <input type="text" name="name" placeholder="Name" required="required" />
                <input type="text" name="email" placeholder="Email" required="required" />
                <input type="password" name="password" placeholder="Password" required="required" />
                <input type="password" name="retypePassword" placeholder="Retype Password " required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large">Register</button>

            </form>
        </div>
    </body>
</html>
