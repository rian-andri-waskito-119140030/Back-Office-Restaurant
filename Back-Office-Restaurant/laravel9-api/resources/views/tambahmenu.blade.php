<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script
      src="https://kit.fontawesome.com/25495e258e.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">
  <title>Tambah Menu</title>
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

  <!-- content -->
  <div class="content">
    <!-- header -->
    <div class="header-content pt-2">
      <h2>Tambah Menu</h2>
    </div>
    <!-- header -->

    <div class="body-content">
      <div class="content-utama">
        <!-- Tombol search -->
        <div class="search-btn">
        </div>
        <!-- Tombol search -->


        <!-- Menu Input -->
        <div class="form-input">
          <div class="box">
            <h4 style="background-color: #008fdf87">
              Tambah Menu
              <i class="fa-solid fa-plus"></i>
            </h4>
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
              <label>Gambar</label><br />
              <input type="file" name="gambar"/><br />
              <label>Nama Menu</label><br />
              <input type="text" name="nama_menu"/><br />
              <label>Kategori Makanan</label><br />
              <input type="text" name="tipe_produk"/><br />
              <label>Harga Modal</label><br />
              <input type="text" name="harga_modal"/><br />
              <label>Harga Jual</label><br />
              <input type="text" name="harga_jual"/><br />
              <label>Jumlah Stok</label><br />
              <input type="text" name="stok"/><br />
              <label>Deskripsi</label><br />
              <input type="text" name="deskripsi"/><br />
              <a style="margin-left: 40%;" ><button type="submit" class="btn btn-primary ml-3">Tambah</button></a>
            </form>
          </div>
          <!--  -->
        </div>
        <!-- Menu Input -->
      </div>
    </div>
    <!-- content -->
  </body>
  </html>
