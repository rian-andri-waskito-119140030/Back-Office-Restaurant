<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/25495e258e.js" crossorigin="anonymous"></script>
  <link rel="icon" href="https://www.freepnglogos.com/uploads/logo-home-png/chimney-home-icon-transparent-1.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">

  <title>BERANDA</title>
</head>

<body style="background-image: url(../images/resto.png); background-size:cover;">

  <div class="sidebar">
    <h2>BACK OFFICE</h2>
    <i class="fa-5x fa-solid fa-circle-user"></i>
    <span>HEAD CHEF</span>
    <div class="left-bar">
      <a href="{{ url('/beranda') }}">Beranda</a>
      <a href="{{ url('/menu') }}">Menu</a>
      <a href="{{ url('kitchendisplay') }}">Kitchen Display</a>
      <a href="{{ url('/pesanan') }}">Pesanan Selesai</a>
      <a href="{{ url('/laporan') }}">Laporan</a>
      <a href="{{ url('/feedback') }}">Feedback</a>
    </div>
  </div>

  <div class="content">

    <div class="header-content">

      <h2>Beranda</h2>
      <span>Selamat Datang Di Restoran</span>
      <a class="" href="{{ route('signout') }}" style="position:absolute;right:10px;top:20px;"><button type="button" class="btn btn-danger">Log Out</button></a>
    </div>

    <div class="body-content">
      <div class="container-fluid">
        <div class="box">

          <a href="{{ url('/menu') }}">
            <div class="col">
              <i class="fa-4x fa-solid fa-book"></i>
              <p style="margin-top: 20px; font-weight: bold">Menu</p>
            </div>
          </a>

          <a href="{{ url('/kitchendisplay') }}">
            <div>
              <i class="fa-4x fa-solid fa-user-group"></i>
              <p style="margin-top: 20px; font-weight: bold">Kitchen Display</p>
            </div>
          </a>

          <a href="{{ url('/pesanan') }}">
            <div>
              <i class="fa-4x fa-solid fa-hand-holding-dollar"></i>
              <p style="margin-top: 20px; font-weight: bold">Pesanan Selesai</p>
            </div>
          </a>

          <a href="{{ url('/laporan') }}">
            <div>
              <i class="fa-4x fa-solid fa-clipboard"></i>
              <p style="margin-top: 20px; font-weight: bold">Laporan</p>
            </div>
          </a>
          <a href="{{ url('/feedback') }}">
            <div>
              <i class="fa-4x fa-solid fa-comments"></i>
              <p style="margin-top: 20px; font-weight: bold">Feedback</p>
            </div>
          </a>

        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<style>
  * {
    margin: 0;
    padding: 0;
    font-style: Arial, Helvetica, sans-serif !important;
  }

  a {
    text-decoration: none;
  }

  .sidebar {
    background-color: #6ECED9;
    width: 15%;
    height: 100%;
    position: fixed;
  }

  .sidebar h2 {
    background-color: #12B0D2;
    text-align: center;
    padding: 10px;
    color: white;
  }

  .sidebar i {
    width: 100%;
    text-align: center;
    margin-top: 30px;
  }

  .sidebar span {
    width: 100%;
    text-align: center;
    display: block;
    margin-top: 10px;
    font-weight: bold;
  }

  .sidebar .left-bar {
    margin-top: 30px;
  }

  .sidebar a {
    display: block;
    line-height: 40px;
    font-size: 14pt;
    color: black;
    padding-left: 20px;
    padding-right: 10px;
    padding-top: 10px;
    padding-bottom: 7px;
    box-sizing: border-box;
  }

  .sidebar a:hover {
    background-color: rgb(224, 216, 206);
  }

  .content {
    width: 90%;
    margin-left: 15%;
    height: 100%;
    display: block;
  }
</style>

<style>
  .content .header-content {
    width: auto;
    height: 10%;
    padding-left: 20px;
    background-color: #89F3FF;
    font-size: 13pt;
    padding-bottom: 5px;
    padding-top: 10px;
  }

  .content .header-content span {
    font-size: 17pt;
  }

  .content .body-content {
    background-image: url("resto.png");
    width: 100%;
    height: 80%;
    display: block;
  }

  .content .body-content .box {
    display: flex;
    width: auto;
    height: 50%;
    padding-top: 50px;
    padding-bottom: 352px;
    justify-content: center;
  }

  .content .body-content .box a {
    background-color: #6ECED9;
    width: 170px;
    height: 150px;
    margin-top: 100px;
    margin-left: 40px;
    margin-right: 50px;
    text-align: center;
    justify-content: center;
    color: black;
    border-radius: 5px;
  }

  .content .body-content .box div i {
    display: block;
    margin-top: 30px;
  }

  .content .body-content .box div span {
    display: block;
    margin-top: 20px;
    font-size: 15pt;
    font-weight: 550;
  }
</style>