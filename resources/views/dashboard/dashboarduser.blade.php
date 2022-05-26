<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yokogawa</title>


        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
        <!-- Styles -->



    </head>
    @include('layouts.usernavbar')

    <body>
      <form class="search-container" action="{{ route('dashboarduser.index') }}" method='GET'>
        <input type="text" id="search-bar" name="search" placeholder="Cari IVSP atau DRF..." value="{{ old('search') }}">
        <button class="btn">Search</button>
      </form>

      <div class="report-table">
        <table style="width:100%;">
          <tr>
            <th>ID</th>
            <th>Process</th>
            <th>In Date</th>
            <th>Estimate</th>
          </tr>
          <tr>
            <td>
              @if($ivsp)
              {{ $ivsp->id }}
              @elseif ($drf)
              {{ $drf->id }}
              @endif
            </td>
            <td>
              @if($ivsp)
              {{ $ivsp->process }}
              @elseif ($drf)
              {{ $drf->process }}
              @endif
            </td>
            <td>
              @if($ivsp)
              {{ $ivsp->in_date }}
              @elseif ($drf)
              {{ $drf->di_date }}
              @endif
            </td>
            <td>
              @if($ivsp)
              {{ $ivsp->estimate }}
              @elseif ($drf)
              {{ $drf->estimate }}
              @endif
            </td>
          </tr>
        </table>
      </div>




    </body>
</html>
