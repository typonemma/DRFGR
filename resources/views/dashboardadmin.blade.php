<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard Admin - Yokogawa </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
          <link rel="stylesheet" href="{{asset('css/admindashboard.css')}}">

            <!--Calling bootstrap-->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        		<meta name="viewport" content="width=device-width, initial-scale=1">
            <!--Calling Icon CSS-->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <!-- Styles   -->



    </head>

    @include('layouts.navbar')
    <body class="antialiased" style="background-image: #EAD689;">

      <section class="statis mt-4 text-center">
     <div class="row">
       <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
         <div class="box  p-3" >
           <i class="uil-eye"></i>
           <h3>{{ $ivspWeek }}</h3>
           <p class="lead">This Week GR</p>
         </div>
       </div>
       <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
         <div class="box  p-3">
           <i class="uil-user"></i>
           <h3>{{ $drfWeek }}</h3>
           <p class="lead">This Week drf</p>
         </div>
       </div>
       <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
         <div class="box  p-3">
           <i class="uil-shopping-cart"></i>
           <h3>{{ $ivspMonth }}</h3>
           <p class="lead">This Month GR</p>
         </div>
       </div>
       <div class="col-md-6 col-lg-3">
         <div class="box  p-3">
           <i class="uil-feedback"></i>
           <h3>{{ $drfMonth }}</h3>
           <p class="lead">This Month drf</p>
         </div>
       </div>
     </div>
   </section>



    </body>
</html>
