<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yokogawa-Form GR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
        <!-- Styles -->


    </head>
    @include('layouts.usernavbar')

    <body class="antialiased" style="background-image: #EAD689;">
      <form action="#" method="post">
  @csrf
  <header>
    <h2>Goods Receive Form</h2>
  </header>

  <div>
    <fieldset>

      <legend id="title5" class="desc">
        Select a Choice
      </legend>

      <div>
        <input id="radioDefault_1" name="Field1" type="hidden" value="">
        <div>
          <input id="Field1_0" name="Field1" type="radio" value="First Choice" tabindex="5" checked="checked">
          <label class="choice" for="Field1_0">Investigation</label>
        </div>
        <div>
          <input id="Field5_1" name="Field5" type="radio" value="Second Choice" tabindex="6">
          <label class="choice" for="Field1_1">Service Note</label>
        </div>
        <div>
          <input id="Field1_2" name="Field1" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field1_2">Repair</label>
        </div>
        <div>
          <input id="Field1_3" name="Field1" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field1_3">Calibration</label>
        </div>
        <div>
          <input id="Field1_3" name="Field1" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field1_3">Other</label>
        </div>
      </div>
    </fieldset>
  </div>


  <div>
    <label class="desc" id="title1" for="Field2">Customer Name</label>
    <div>
      <input id="Field2" name="Field2" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>

  <div>
    <label class="desc" id="title1" for="Field3">Customer Adress</label>
    <div>
      <input id="Field3" name="Field3" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>

  <div>
    <label class="desc" id="title1" for="Field4">Customer Fax or Telephone</label>
    <div>
      <input id="Field4" name="Field4" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>



  <div>
    <label class="desc" id="title1" for="Field5">Contact Person</label>
    <div>
      <input id="Field5" name="Field5" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>

  <div>
    <label class="desc" id="title1" for="Field6">In date</label>
    <div>
      <input id="Field6" name="Field6" type="text" class="field text fn" value="" size="8" tabindex="1">
    </div>
  </div>

  <div>
    <label class="desc" id="title1" for="Field7">Nomor Model</label>
    <div>
      <input id="Field7" name="Field7" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Instrument Models">
    </div>
    <div>
      <input id="Field7" name="Field7" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Serial Number">
    </div>
    <div>
      <input id="Field7" name="Field7" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Fault Reporty">
    </div>
  </div>

  <div>
    <div>
      	<button type="submit" class="btn btn-block btn-large"><i class="bi bi-plus"></i>Add More</button>
    </div>
  </div>

  <div>
    <label class="desc" id="title8" for="Field8">
      Email
    </label>
    <div>
      <input id="Field8" name="Field8" type="email" spellcheck="false" value="" maxlength="255" tabindex="3">
   </div>
  </div>

  <div>
    <label class="desc" id="title9" for="Field9">
      Description
    </label>

    <div>
      <textarea id="Field9" name="Field9" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
    </div>
  </div>




  <div>
		<div>
  		<button type="submit" class="btn btn-block btn-large"><i class="bi bi-check-lg"></i>Submit</button>
    </div>
	</div>

</form>
    </body>
</html>
