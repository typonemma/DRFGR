<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


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
<link rel="stylesheet" href="{{asset('css/form.css')}}">
<nav class="navbar navbar-expand-lg navbar-light ">
    <h1 class="navbar-header mr-4" href="#">Yokogawa</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="{url('dashboarduser')}}">Home </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Form
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{url('dashboarduser/formgr')}}">Goods Receive Form</a>
              <a class="dropdown-item" href="{{url('dashboarduser/formdrf')}}">Dispatch Request Form</a>
            </div>
          </li>
      </ul>
    </div>
    <form action="{{ route('logout') }}" method="POST">
      <div class="logout my-2 my-lg-0">
        @csrf
        <button type='submit' class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i></button>
      </div>
    </form>
</nav>

<style media="screen">
@import url('https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Bubblegum+Sans|Caveat+Brush|Chewy|Lobster+Two');
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");

* {
    -webkit-box-sizing:border-box;
    -moz-box-sizing:border-box;
    -ms-box-sizing:border-box;
    -o-box-sizing:border-box;
    box-sizing:border-box;
}
html {
    width: 100%;
    height:100%;

}
body {
    width: 100%;
    height:100%;
    font-family: 'Open Sans', sans-serif;
    background: #EAD689;

}

nav{
      background-color: #EAD689;
}

* ===== NAVIGATION ======*/
.navbar {
    border: 0;
    z-index: 9999;
    letter-spacing: 4px;


}
.logo {
    display: block;
    height: auto;
    width: 52px;
    padding-top: 5px;
    margin-right: 15px;
}

.navbar-brand>img {
  height: 100%;
  padding: 5px; /* firefox bug fix */
  width: auto;
}
.navbar .nav > li > a {
  line-height: 50px;
}

.navbar .navbar-header{

    color: black !important;
    font-family: 'Lobster Two', cursive;
}

.navbar li a, .navbar {
    color: #242424; !important;
    font-size: 18px;
    transition: all 0.6s 0s;
}

.navbar-toggle {
    background-color: transparent !important;
    border: 0;
}

.navbar li a:hover, .navbar li.active a {
    color: #DAC15F !important;
}

.logout i {
  font-size: 2rem;
  color: #242424;
  width: 32px;
  height: 32px;
}

</style>
