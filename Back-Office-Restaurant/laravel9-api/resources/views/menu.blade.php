<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script
  src="https://kit.fontawesome.com/25495e258e.js"
  crossorigin="anonymous"
  ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">
  <title>MENU</title>
</head>
<body style="background-image: url(../images/resto.png);">

  <div class="sidebar">
    <h2>BACK OFFICE</h2>
    <i class="fa-5x fa-solid fa-circle-user"></i>
    <span>HEAD CHEF</span>
    <div class="left-bar">
      <a href="beranda.html">Beranda</a>
      <a href="menu.html">Menu</a>
      <a href="Kitchendisplay.html">Kitchen Display</a>
      <a href="pesanan.html">Pesanan Selesai</a>
      <a href="laporan.html">Laporan</a>
    </div>
  </div>


  <div class="content">
    <div class="header-content">
      <h2>Menu</h2>
    </div>
    
    <div class="body-content">
      <div class="box">  
        <div class="row">
          <div class="col-8 text-center">
            <button class="btn btn-large btn-success">Menu Restoran</button>
            <a href="{{ url('/tambahmenu') }}"><button class="btn btn-large btn-success" >Tambah Menu</button></a>
            
          </div>
        </div>

        <div class="card-body">
          <!-- <div class="container"> -->
          <table id="example2" class="table table-bordered data-table">
            <thead>
              <tr>
                <th>NO</th>
                <th>KATALOG</th>
                <th>NAMA</th>
                <th>KATEGORI</th>
                <th>HARGA MODAL</th>
                <th>HARGA JUAL</th>
                <th>JUMLAH STOK</th>
                <th>DESKRIPSI</th>
                <th width="100px">Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <!-- <tfoot>
              <tr>
                <th>NO</th>
                <th>KATALOG</th>
                <th>NAMA</th>
                <th>KATEGORI</th>
                <th>HARGA MODAL</th>
                <th>HARGA JUAL</th>
                <th>JUMLAH STOK</th>
                <th>DESKRIPSI</th>
                <th width="100px">Action</th>
              </tr>
            </tfoot> -->
          </table>
          </div> <!-- close div card code -->
        <!-- </div> -->
      </div> <!-- close box -->
    </div> <!-- close body content -->
</body>
<script type="text/javascript">
  $(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('menu.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'gambar', name: 'gambar'},
            {data: 'nama_menu', name: 'nama_menu'},
            {data: 'tipe_produk', name: 'tipe_produk'},
            {data: 'harga_modal', name: 'harga_modal'},
            {data: 'harga_jual', name: 'harga_jual'},
            {data: 'stok', name: 'stok'},
            {data: 'deskripsi', name: 'deskripsi'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('body').on('click', '.delete', function () {
      if (confirm("Delete Record?") == true) {
          var id_menu = $(this).attr('data-id');
          console.log("{{ csrf_token() }}");
// ajax
          $.ajax({
            type:"GET",
            url: "{{ route('menu.delete') }}",
            data: {
              id_menu: id_menu,
              _token: "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(res){
              // var oTable = $('#example2').dataTable();
              // oTable.fnDraw(true);
              $('#example2').DataTable().ajax.reload();
              }
          });
        }
      });
  });
</script>
</html>


