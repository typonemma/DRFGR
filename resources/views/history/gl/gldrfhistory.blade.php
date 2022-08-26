<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yokogawa - DRF History</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="{{asset('css/form.css')}}">
          <link rel="stylesheet" href="{{asset('css/history.css')}}">


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

    @include('layouts.navbargl')

    <body class="antialiased" style="background-image: #EAD689;">
        <div class=" justify-content-md-left picker-date" >
          <div class="picker">
            <form class="POST" method="GET" action="{{ route('drf.historygl') }}">
              <input type="month" name="datepicker" id="start" min="2022-01" value="{{ $datepicker !== null ? $datepicker : "2022-01" }}">
              <button type="submit" value="submit" id="submit" name="submit" style="border-radius:5px; " class="mt-4 ">Submit </button>
            </form>
          </div>
        </div>

<div class="row">

        @forelse ($drf as $d)

        <div class="col-lg-6 ">
            <div class="card "  >
              <div class="card-header w-100">{{ $d->id }}</div>
              <div class="card-body">
                <h5 class="card-title">{{ $d->ci_company_name }}</h5>
                <p class="card-text">{{ $d->ci_phone_company }}</p>
                <a href="{{ route('gl.drf.show',$d->id) }}" class="text-secondary">More</a>
              </div>
            </div>
          </div>

            @empty
              <h3 class="mt-4 ml-4">Tidak ada apapuan bulan ini!</h3>
            @endforelse
          </div>





    <script>
      $('#datepicker').datepicker({
          uiLibrary: 'bootstrap4'
      });

      $(document).ready(function() {
        $('datepicker').datepicker({
          onSelect : function (dateText, inst){
            $('#formId').submit();
          }
        })
      })
    </script>
    </body>
</html>
