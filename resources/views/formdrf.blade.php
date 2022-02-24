<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yokogawa-Form GR</title>




    </head>
    @include('layouts.usernavbar')

    <body class="antialiased" style="background-image: #EAD689;">
      <form action="#" method="post">
  @csrf
  <header class="ml-4">
    <h2>Dispatch Request Form</h2>
  </header>

  <div>
    <label class="desc" id="title1" for="Field1">To:</label>
    <div>
      <label class="desc" id="title1" for="Field1">Service Dapaterment Head</label>
    </div>
  </div>

  <div>
    <fieldset>

      <legend id="title2" class="desc">
        CC :
      </legend>

      <div>
        <input id="radioDefault_2" name="Field2" type="hidden" value="">
        <div>
          <input id="Field2_0" name="Field2" type="radio" value="First Choice" tabindex="5" checked="checked">
          <label class="choice" for="Field2_0">Analyzer, GL</label>
        </div>
        <div>
          <input id="Field2_1" name="Field2" type="radio" value="Second Choice" tabindex="6">
          <label class="choice" for="Field2_1">SLC, GL</label>
        </div>
        <div>
          <input id="Field2_2" name="Field2" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field2_2">SUC, GL</label>
        </div>
        <div>
          <input id="Field2_3" name="Field2" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field2_3">SYS, GL</label>
        </div>
        <div>
          <input id="Field2_4" name="Field2" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field2_4">PCI, GL</label>
        </div>
      </div>
    </fieldset>
  </div>

  <div>
    <label class="desc" id="title3" for="Field3">Cost Expenses Allocation :</label>
    <div>
      <input id="Field3" name="Field3" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Project Number">
    </div>
    <div>
      <input id="Field3" name="Field3" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="SVO Numbers">
    </div>
  </div>


  <div>
    <label class="desc" id="title4" for="Field4">Customer Information :</label>
    <div>
      <input id="Field4" name="Field4" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Company Name">
    </div>
    <div>
      <input id="Field4" name="Field4" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Phone Company">
    </div>
    <div>
      <input id="Field4" name="Field4" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Contact Person">
    </div>
    <div>
      <input id="Field4" name="Field4" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Email Company">
    </div>
    <div>
      <input id="Field4" name="Field4" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Adress">
    </div>
  </div>

  <div>
    <label class="desc" id="title5" for="Field5">Dispatch Information</label>
    <div>
      <input id="Field5" name="Field5" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Date">
    </div>
    <div>
      <input id="Field5" name="Field5" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Duration">
    </div>
  </div>

  <div>
    <fieldset>

      <legend id="title6" class="desc">
        Number of Engineering
      </legend>

      <div>
        <input id="radioDefault_6" name="Field6" type="hidden" value="">
        <div>
          <input id="Field6_0" name="Field6" type="radio" value="First Choice" tabindex="5" checked="checked">
          <label class="choice" for="Field6_0">1</label>
        </div>
        <div>
          <input id="Field6_1" name="Field6" type="radio" value="Second Choice" tabindex="6">
          <label class="choice" for="Field6_1">2</label>
        </div>
        <div>
          <input id="Field6_2" name="Field6" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field6_2">3</label>
        </div>
        <div>
          <input id="Field6_3" name="Field6" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field6_3">4</label>
        </div>
        <div>
          <input id="Field6_4" name="Field5" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field5_4">5</label>
        </div>
      </div>
    </fieldset>
  </div>


  <div>
    <label class="desc" id="title7" for="Field7">SiteWork Location</label>
    <div>
      <input id="Field7" name="Field1" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Location SiteWork">
    </div>
  </div>

  <div>
    <fieldset>

      <legend id="title8" class="desc">
        Lodging Recomendation
      </legend>

      <div>
        <input id="radioDefault_8" name="Field8" type="hidden" value="">
        <div>
          <input id="Field8_0" name="Field8" type="radio" value="First Choice" tabindex="5" checked="checked">
          <label class="choice" for="Field8_0">Provided by Customer</label>
        </div>
        <div>
          <input id="Field8_1" name="Field8" type="radio" value="Second Choice" tabindex="6">
          <label class="choice" for="Field8_1">Provided by YIN</label>
        </div>
        <div>
          <input id="Field8_2" name="Field8" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field8_2">Not Required</label>
        </div>
      </div>
    </fieldset>
  </div>

  <div>
    <label class="desc" id="title9" for="Field9">Scope:</label>
    <div>
      <input id="Field9" name="Field9" type="text" class="field text fn" value="" size="8" tabindex="1"placeholder="Instrument Name">
    </div>
    <div>
      <input id="Field9" name="Field9" type="text" class="field text fn" value="" size="8" tabindex="1" placeholder="Model Code">
    </div>
  </div>

  <div>
    <fieldset>

      <legend id="title8" class="desc">
        Post Work Document :
      </legend>

      <div>
        <input id="radioDefault_10" name="Field10" type="hidden" value="">
        <div>
          <input id="Field10_0" name="Field10" type="radio" value="First Choice" tabindex="5" checked="checked">
          <label class="choice" for="Field10_0">Service / Investigation Report</label>
        </div>
        <div>
          <input id="Field10_1" name="Field10" type="radio" value="Second Choice" tabindex="6">
          <label class="choice" for="Field10_1">Time</label>
        </div>
        <div>
          <input id="Field10_2" name="Field10" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field10_2">FAT/SAT REPORT</label>
        </div>
        <div>
          <input id="Field10_2" name="Field10" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field10_2">Work Completition Certificate </label>
        </div>
        <div>
          <input id="Field10_2" name="Field10" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field10_2">Site Survey</label>
        </div>
        <div>
          <input id="Field10_2" name="Field10" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field102">Delivery </label>
        </div>
        <div>
          <input id="Field10_2" name="Field10" type="radio" value="Third Choice" tabindex="7">
          <label class="choice" for="Field10_2">Other </label>
        </div>
      </div>
    </fieldset>
  </div>







  <div>
		<div>
  	<button type="submit" class="btn btn-block btn-large"><i class="bi bi-check-lg"></i>Submit</button>
    </div>
	</div>

</form>
  </body>
</html>
