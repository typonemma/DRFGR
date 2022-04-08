<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yokogawa</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
@include('layouts.navbar')
<body class="antialiased" style="background-image: #EAD689;">
  <header class="ml-4 mt-4 auto ">
          <h2  style=" font-weight: bold; text-color:#2A363B;">History</h2>
        </header>
        <section class="statis mt-4 ">
          <div class="row justify-content-md-center">
            <div class="col-md-6 col-lg-11 mb-12 mb-lg-0">
              <form action="#">
                <input type="submit" value="History DRF" class="box  col-lg-12 text-left"  style="background:#2A363B; border-radius: 10px; height:100px; color:#EAD689; font-size:32px;" />
              </form>
            </div>
          </div>
        </section>

        <section class="statis mt-4 ">
          <div class="row justify-content-md-center">
              <div class="col-md-6 col-lg-11 mb-12 mb-lg-0" >
              <form action="#">
                <input type="submit" value="History GR" class="box  col-lg-12 text-left justify-content-center"  style="background:#2A363B; border-radius: 10px; height:100px; color:#EAD689; font-size:32px;" />
              </form>
            </div>
          </div>
        </section>

        <div class="row justify-content-md-center">
          <div class="col-md-6 col-lg-11 mb-12 mb-lg-0" >
                <input id="datepicker" width="276" />
          </div>
        </div>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</body>
</html>
