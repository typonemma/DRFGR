<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard Admin - Yokogawa </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">

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
    @include('layouts.navbar')
    <body class="antialiased" style="background-image: #EAD689;">

      <h1 style="font-weight:bold;" class="ml-4 mt-4 FDRF">Fullfill DRF - Only admin </h1>
      <form class="" action="{{route('admin.drf.update', $drf->id)}}" method="post">
          <p class=" mt-4 CWS"  >Current Work asdasdas</p>
              <div class="CWS-set">
                <fieldset>





                  <div>
                    <input id="radio" name="cc" type="hidden" value="">
                    <div>
                      <input id="Field2_0" name="cc" type="radio" value="Completed" tabindex="5" checked="checked">
                      <label class="choice" for="CWS">Compeleted</label>
                    </div>
                    <div>
                      <input id="Field2_1" name="cc" type="radio" value="Pending" tabindex="6">
                      <label class="choice" for="CWS">Pending</label>
                    </div>
                    <div>
                      <input id="Field2_4" name="cc" type="radio" value="Canceled" tabindex="7">
                      <label class="choice" for="CWS">Canceled</label>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="gl-add">
                <label class="desc" id="title1" for="Field2">GL Initial</label>
                <div>
                  <input id="Field2" name="customer_name" type="text" class="field text fn" value="{{ old('customer_name') }}" size="8" tabindex="1" placeholder="Customer Name">
                    @error('customer_name')
                      {{ $message }}
                    @enderror
                </div>
              </div>

          	<button type="submit" class="btn btn-block btn-small mx-auto" ><i class="bi bi-check-lg"></i>Submit</button>


<style media="screen">
.btn {
    color: #2A363B;
    border-radius: 5px;
    border-color: #2A363B;
    border-radius: 5px;
    border: 5px solid #2A363B;
}
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] {
    background-color: #DAC15F;
}
.btn-large {
    padding: 9px 14px;
    font-size: 15px;
    line-height: normal;
    border-radius: 5px;
    border: 5px solid #2A363B;
}
.btn:hover {
  color: #2A363B;
  border-radius: 5px;
  border-color: #2A363B;
  border-radius: 5px;
  border: 5px solid #2A363B;
}


.btn-block {
    width: 50%;
    display:block;
}
</style>




    </body>
</html>
