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
    @include('layouts.usernavbar')

    <body class="antialiased" style="background-image: #EAD689;">
      <form action="{{ route('dashboarduser.storeIVSP') }}" method="post">
  @csrf
  <header>
    <h2>Goods Receive Form</h2>
  </header>
  {{ session('success') }}
  <div>
    <fieldset>

      <legend id="title5" class="desc">
        Select a Choice
      </legend>

      <div>
        <input id="radioDefault_1" name="for" type="hidden" value="">
        <div>
          <input id="Field1_0" name="for" type="radio" value="Investigation" tabindex="5" checked="checked">
          <label class="choice" for="for">Investigation</label>
        </div>
        <div>
          <input id="Field5_1" name="for" type="radio" value="Service Note" tabindex="6">
          <label class="choice" for="for">Service Note</label>
        </div>
        <div>
          <input id="Field1_2" name="for" type="radio" value="Repair" tabindex="7">
          <label class="choice" for="for">Repair</label>
        </div>
        <div>
          <input id="Field1_3" name="for" type="radio" value="Calibration" tabindex="7">
          <label class="choice" for="for">Calibration</label>
        </div>
        <div>
          <input id="CheckOther" name="for" type="radio" value="Other" tabindex="7" onclick="ShowHideDiv()">
          <label class="choice" for="for"  name="Other_A" value="Other">Other</label>
        </div>
        <div id="dvtext" style="display: none">
         <input type="text" id="textBoxOther" placeholder="Other"/>
        </div>
      </div>
    </fieldset>
  </div>


  <div>
    <label class="desc" id="title1" for="Field2">Customer Name</label>
    <div>
      <input id="Field2" name="customer_name" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Customer Name">
        @error('customer_name')
          {{ $message }}
        @enderror
    </div>
  </div>

  <div>
    <label class="desc" id="title1" for="Field3">Customer Adress</label>
    <div>
      <input id="Field3" name="customer_address" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Customer Adress">
        @error('customer_address')
          {{ $message }}
        @enderror
    </div>
  </div>

  <div>
    <label class="desc" id="title1" for="Field4">Customer Fax or Telephone</label>
    <div>
      <input id="Field4" name="customer_telephone" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Fax or Telephone">
        @error('customer_telephone')
          {{ $message }}
        @enderror
    </div>
  </div>



  <div>
    <label class="desc" id="title1" for="Field5">Contact Person</label>
    <div>
      <input id="Field5" name="contact_person" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Contact Person">
      @error('contact_person')
          {{ $message }}
        @enderror
    </div>
  </div>

  <div>
    <label class="desc" id="title1" for="Field6">In date</label>
    <div>
      <input id="Field6" name="in_date" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="In Date">
      @error('in_date')
          {{ $message }}
        @enderror
    </div>
  </div>

  <div class="add">
    <label class="desc" id="title1" for="Field7">Nomor Model</label>
    <div>
      <input id="Field7" name="instrument_model[]" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Instrument Models">
      @error('instrument_model')
          {{ $message }}
        @enderror
    </div>
    <div>
      <input id="Field7" name="serial_number[]" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Serial Number">
      @error('serial_number')
          {{ $message }}
        @enderror
    </div>
    <div>
      <input id="Field7" name="fault_report[]" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Fault Report">
      @error('fault_report')
          {{ $message }}
        @enderror
    </div>
    <div>
      <textarea id="Field9" name="desc[]" spellcheck="true" rows="10" cols="50" tabindex="4" placeholder="Put your description...."></textarea>
      @error('desc')
          {{ $message }}
        @enderror
    </div>
  </div>



  <div>
    <div>
      	<button type="button" id="add_more" class="add-row btn btn-block btn-large "><i class="bi bi-plus"></i>Add More</button>
    </div>
  </div>




  </div>




  <div>
		<div>
  		<button type="submit" class="btn btn-block btn-large"><i class="bi bi-check-lg"></i>Submit</button>
    </div>
	</div>
</form>

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
