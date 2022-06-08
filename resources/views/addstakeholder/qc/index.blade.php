<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Super Admin -Yokogawa</title>


        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/addstakeholder.css')}}">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" href="{{asset('css/admindashboard.css')}}">
        <!-- Styles -->



    </head>
    @include('layouts.superadminnavbar')

    <body class="antialiased" style="background-image: #EAD689;">

      <div class="row center">
        <div class="col-md-12">
          <h1 class="ml-3">Add QC </h1>
        </div>
        <div class="col-lg-12 ml-5" >
          <a href="{{route('qc.create')}}" class="btn"  >Add QC</a>
        </div>
      </div>


      <table id="example" class="display mt-4 ml-5" style="width:100%">
        <thead style="text-align: center">
            <th> No. </th>
            <th> Nama QC </th>
            <th> Email </th>
            <th> Action </th>
        </thead>
        @foreach ($qc as $qc)
        <tr style="text-align: center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $qc->name }}</td>
            <td>{{ $qc->email }}</td>

            <td class="d-flex">
                <form action="{{route('qc.destroy', $qc->id)}}" method="post" class=" btn-md d-md-inline">
                    @method('delete')
                    @csrf
                    <button class='btn btn-danger btn-lg' onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      </table>

    </body>
</html>
