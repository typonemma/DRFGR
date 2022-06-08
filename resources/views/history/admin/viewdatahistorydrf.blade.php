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
            <link rel="stylesheet" href="{{asset('css/history.css')}}">







    </head>
    @include('layouts.navbar')


    <body class="antialiased" style="background-image: #EAD689;">
        <header>
          <h2>{{ $drf->id }}</h2>
        </header>





          <div class="d-flex flex-row">
            <label class=" p-2">To:</label>
            <div>
              <p class="p-2">Service Departerment Head</p>
            </div>
          </div>




        <div  class="d-flex flex-row">
          <label class="desc p-2">CC:</label>
          <div>
            <p class="desc p-2">{{ $drf->cc }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Cost Expanses Project Number:</label>
          <div>
            <p class="desc p-2"> {{ $drf->cea_project }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Cost Expanses SVO Number:</label>
          <div>
            <p class="desc p-2">{{ $drf->cea_svo }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Company Name:</label>
          <div>
            <p class="desc p-2">{{ $drf->ci_company_name }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Phone Company:</label>
          <div>
            <p class="desc p-2">{{ $drf->ci_contact_person }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Contact Person:</label>
          <div>
            <p class="desc p-2">{{ $drf->ci_contact_person }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Email Company:</label>
          <div>
            <p class="desc p-2">{{ $drf->ci_email_company }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Adress:</label>
          <div>
            <p class="desc p-2">{{ $drf->ci_address }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2"> Dispatch Information Date:</label>
          <div>
            <p class="desc p-2">{{ $drf->di_date }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Dispatch Information Duration:</label>
          <div>
            <p class="desc p-2"> {{ $drf->di_duration }}</p>
          </div>
        </div>

        <div class="d-flex flex-row ">
          <label class="desc p-2">Number of Engineering:</label>
          <div>
            <p class="desc p-2">{{ $drf->lodging_recomendation }} </p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Lodging Recomendation:</label>
          <div>
            <p class="desc p-2">{{ $drf->lodging_recomendation }} </p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Scope Instrument Name:</label>
          <div>
            <p class="desc p-2">{{ $drf->scope_instrument_name }}</p>
          </div>
        </div>

          <div class="d-flex flex-row">
          <label class="desc p-2">Scope Model Code :</label>
          <div>
            <p class="desc p-2">{{ $drf->scope_model_code }}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Post Work Document:</label>
          <div>
            <p class="desc p-2">{{ $drf->post_work_document }} </p>
          </div>
        </div>

          <div class="d-flex flex-row">
          <label class="desc p-2">Work Type:</label>
          <div>
            <p class="desc p-2">{{ $drf->work_type}}</p>
          </div>
        </div>

        <div class="d-flex flex-row">
          <label class="desc p-2">Description:</label>
          <div>
            <p class="desc p-2">{{ $drf->description }}</p>
          </div>
        </div>



        <div class="d-flex flex-row">
          <label class="desc p-2">Document:</label>
          <div>
            <form action="{{ route('download.index') }}" method="post">
              @csrf
              <input type="hidden" name="dokumen_pendukung" value="{{ $drf->dokumen_pendukung }}">
                <button type="submit" name="button">Download</button>
            </form>
          </div>
        </div>

      </div>



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
