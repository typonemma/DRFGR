<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yokogawa-Form IVSP</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
        <!-- Styles -->


    </head>
    @include('layouts.navbar')

    <body class="antialiased" style="background-image: #EAD689;">
        <header>
          <h2>{{ $ivsp->id }}</h2>
        </header>

        <div class="d-flex flex-row">
          <label class="desc p-2">For:</label>
          <div>
            <p class="desc p-2">{{ $ivsp->for}}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Customer Name :</label>
          <div>
            <p class="desc p-2">{{ $ivsp->customer_name}}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Customer Address :</label>
          <div>
            <p class="desc p-2">{{ $ivsp->customer_address}}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Customer Telephone :</label>
          <div>
            <p class="desc p-2">{{ $ivsp->customer_telephone}}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Contact Person:</label>
          <div>
            <p class="desc p-2">{{ $ivsp->contact_person}}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">In Date:</label>
          <div>
            <p class="desc p-2">{{ $ivsp->in_date}}</p>
          </div>
        </div>


        @foreach($ivsp->ivspNomorModel as $inm)
        <div class="d-flex flex-row">
          <div>
            <p class="desc p-2">Model Serial Number : {{ $inm->serial_number}}</p>
            <p class="desc p-2">Model Instrument Model : {{ $inm->instrument_model}}</p>
            <p class="desc p-2">Model Fault Report  : {{ $inm->fault_report}}</p>
            <p class="desc p-2">Deskripsi Rusak Model : {{ $inm->desc}}</p></br>
          </div>
        </div>
        @endforeach




<script type="text/javascript">

$(document).ready(function(){
   $( ".add-row" ).click(function(){
      var $clone = $( "div.add" ).first().clone();

      $clone.insertBefore( ".add-row" );
   });

});

function ShowHideDiv() {
        var chkYes = document.getElementById("CheckOther");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkYes.checked ? "block" : "none";
    }

</script>


    </body>
</html>
