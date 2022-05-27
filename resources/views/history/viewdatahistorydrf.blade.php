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







    </head>
    @include('layouts.navbar')

    <body class="antialiased" style="background-image: #EAD689;">
        @csrf
        <header>
          <h2>{{ $drf->id }}</h2>
        </header>

        <div class="">
          <label class="desc">To:</label>
          <div>
            <p class="desc">Service Dapaterment Head</p>
          </div>
        </div>

        <div>
          <label class="desc">CC:</label>
          <div>
            <p class="desc">{{ $drf->cc }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Cost Expanses Project Number:</label>
          <div>
            <p class="desc"> {{ $drf->cea_project }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Cost Expanses SVO Number:</label>
          <div>
            <p class="desc">{{ $drf->cea_svo }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Company Name:</label>
          <div>
            <p class="desc">{{ $drf->ci_company_name }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Phone Company:</label>
          <div>
            <p class="desc">{{ $drf->ci_contact_person }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Contact Person:</label>
          <div>
            <p class="desc">{{ $drf->ci_contact_person }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Email Company:</label>
          <div>
            <p class="desc">{{ $drf->ci_email_company }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Adress:</label>
          <div>
            <p class="desc">{{ $drf->ci_address }}</p>
          </div>
        </div>

        <div>
          <label class="desc"> Dispatch Information Date:</label>
          <div>
            <p class="desc">{{ $drf->di_date }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Dispatch Information Duration:</label>
          <div>
            <p class="desc"> {{ $drf->di_duration }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Number of Engineering:</label>
          <div>
            <p class="desc">{{ $drf->lodging_recomendation }} </p>
          </div>
        </div>

        <div>
          <label class="desc">Lodging Recomendation:</label>
          <div>
            <p class="desc">{{ $drf->lodging_recomendation }} </p>
          </div>
        </div>

        <div>
          <label class="desc">Scope Instrument Name:</label>
          <div>
            <p class="desc">{{ $drf->scope_instrument_name }}</p>
          </div>
        </div>

          <div>
          <label class="desc">Scope Model Code :</label>
          <div>
            <p class="desc">{{ $drf->scope_model_code }}</p>
          </div>
        </div>

        <div>
          <label class="desc">Post Work Document:</label>
          <div>
            <p class="desc">{{ $drf->post_work_document }} </p>
          </div>
        </div>

          <div>
          <label class="desc">Work Type:</label>
          <div>
            <p class="desc">{{ $drf->work_type}}</p>
          </div>
        </div>

        <div>
          <label class="desc">Description:</label>
          <div>
            <p class="desc">{{ $drf->description }}</p>
          </div>
        </div>



        <div>
          <label class="desc">Document:</label>
          <div>
            <form action="{{ route('download.index') }}" method="post">
              @csrf
              <input type="hidden" name="dokumen_pendukung" value="{{ $drf->dokumen_pendukung }}">
                <button type="submit" name="button">Download</button>
            </form>
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
