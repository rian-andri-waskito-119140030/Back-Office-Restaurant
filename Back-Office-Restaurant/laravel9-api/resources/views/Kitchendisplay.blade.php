<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="icon" href="https://w7.pngwing.com/pngs/408/758/png-transparent-cooking-chef-s-hat-restaurant-chef-professional-cooking-knife-kitchen-utensils-icon-logo.png" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/25495e258e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="all.css">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">
  <title>Kitchen Display</title>
</head>

<body style="background-image: url(../images/resto.png);">

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
      <h2>Kitchen Display</h2>
    </div>

    <div class="body-content">
      <div class="container" style="border-color:transparent">
        <div class="row mx-auto pesanan">




          <!-- <div class="col-md-4 mb-3 mt-3">
            <div class="card border-0">
              <div class="card-header" style="border-bottom: 5px solid black ;">
                <h5 class="my-2">Pesanan </h5>
              </div>
              <div class="card-body">

                <button type="button" value="" class="edit_pesanan btn btn-primary btn-sm">add</button>
              </div>
            </div>

          </div> -->

        </div>
      </div>
    </div>
    <!-- <div class=" body-content">
                    <div class="container">

                    </div>
                </div> -->

  </div>
  </div>
  </div>
  </div>
  <div class="modal fade" id="addmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_pesanan" id="id_pesanan">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-12">
              <select class="form-control" id="status" class="status" value="status">
                <option>di masak</option>
                <option>selesai</option>
                <option>cancel</option>

              </select>
            </div>
          </div>

          <div class="col-sm-offset-2 col-sm-10 mt-3">
            <button type="submit" class="btn btn-primary update-pesanan" id="saveBtn" value="create">Save changes
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script>
  $(document).ready(function() {
    getData();

    function getData() {
      $.ajax({
        type: 'GET',
        url: '/pesanan-datang',
        dataType: 'json',
        success: function(response) {
          //console.log(response.pesanan);
          for (var i = 0; i < response.pesanan.length; i++) {
            if (response.pesanan[i].status == 'di masak' || response.pesanan[i].status == 'di pesan') {
              var html = '<div class="col-md-4 mb-3 mt-3">' +
                '<div class="card border-0">' +
                '<div class="card-header" style="border-bottom: 5px solid black ;">' +
                '<h5 class="my-2">Pesanan ' + [i + 1] + '</h5>' +
                '</div>' +
                '<div class="card-body">' +
                '<p>Nama Menu = ' + response.pesanan[i].nama_menu + '</p>' +
                '<p>Jumlah = ' + response.pesanan[i].jumlah + '</p>' +
                '<button type="button" value="' + response.pesanan[i].id_pesanan + '" class="edit_pesanan btn btn-primary btn-m">' + response.pesanan[i].status + '</button>' +
                '</div>' +
                '</div>' +
                '</div>';
              $('.pesanan').append(html);
            } else {
              var html = '<div class="col-md-4 mb-3 mt-3">' +
                '<div class="card border-0">' +
                '<div class="card-header" style="border-bottom: 5px solid black ;">' +
                '<h5 class="my-2">Pesanan Kosong</h5>' +
                '</div>' +
                '<div class="card-body">' +
                '<p></p>' +
                '<p></p>' +
                //'<button type="button" value="' + response.pesanan[i].id_pesanan + '" class="edit_pesanan btn btn-primary btn-m">' + response.pesanan[i].status + '</button>' +
                '</div>' +
                '</div>' +
                '</div>';
              $('.pesanan').append(html);
            }

          }
        }
      })
    }
    $(document).on('click', '.edit_pesanan', function(e) {
      e.preventDefault();
      var id_pesanan = $(this).val();
      $('#addmodel').modal('show');
      $.ajax({
        type: 'GET',
        url: '/edit-pesanan/' + id_pesanan,
        dataType: 'json',
        success: function(response) {
          if (response.status == 404) {
            console.log(response.message);
          } else {
            $('#status').val(response.pesanan.status);
            $('#id_pesanan').val(id_pesanan);
          }
        }
      })
    });

    $(document).on('click', '.update-pesanan', function(e) {
      e.preventDefault();
      var id_pesanan = $('#id_pesanan').val();
      var data = {
        'status': $('#status').val()
      };
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'PUT',
        url: '/update-status/' + id_pesanan,
        data: data,
        dataType: "json",
        success: function(response) {
          if (response.status == 404) {
            console.log(response.message);
          } else {
            $('#addmodel').modal('hide');

          }
        }
      })
    });

  });
</script>

</html>