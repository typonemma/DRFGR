<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SUPER ADMIN -Yokogawa</title>


        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" href="{{asset('css/admindashboard.css')}}">
        <!-- Styles -->



    </head>
    @include('layouts.superadminnavbar')

    <body class="antialiased" style="background-image: #EAD689;">

      <h5 style="font-weight:bold;">Dashboard</h5>


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
              <p class="lead">This Week DRF</p>
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
              <p class="lead">This Month DRF</p>
            </div>
          </div>
        </div>
      </section>



        <h5 style="font-weight:bold;" class="mt-4">In Progress</h5>
        @forelse ($drf as $d)

        <section class="statis mt-4 text-center">
          <div class="row">
            <div class="col-md-12 ">
              <div class="box  p-3" >
                <i class="uil-eye"></i>
                <p class="lead">  {{ $d->id }}</p>
                <a href="{{ route('drf.sopAdmin', $d->id) }}" class="text-secondary">More</a>
              </div>
            </div>
          </div>
        </section>
        @empty
        @endforelse

        @forelse ($ivsp as $i)

        <section class="statis mt-4 text-center">
          <div class="row">
            <div class="col-md-12 ">
              <div class="box  p-3" >
                <i class="uil-eye"></i>
                <p class="lead">  {{ $i->id }}</p>
                <a href="{{ route('ivsp.sopAdmin', $i->id) }}" class="text-secondary">More</a>
              </div>
            </div>
          </div>
        </section>
        @empty
        @endforelse











    </body>
</html>
