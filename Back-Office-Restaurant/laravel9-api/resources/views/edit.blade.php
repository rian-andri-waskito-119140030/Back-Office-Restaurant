<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="https://cdn2.vectorstock.com/i/1000x1000/89/56/restaurant-menu-logo-or-label-cooking-cuisine-vector-27828956.jpg" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/25495e258e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">
  <title>Tambah Menu</title>
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

  <!-- content -->
  <div class="content">
    <!-- header -->
    <div class="header-content pt-2">
      <h2>Edit Menu</h2>
    </div>
    <!-- header -->

    <div class="body-content py-5 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mx-auto">
            <div class="card">
              <div class="card-header" style="background-color: #6ECED9">
                <h5>Edit Menu</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('menu.update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group mx-auto">
                    <div class="mb-3">
                      <label for="">Gambar</label>
                      <input type="file" class="form-control" name="gambar" value="{{ $menu->gambar }}">
                    </div>
                    <div class="mb-3">
                      <label for="">Nama Menu</label>
                      <input type="text" class="form-control" name="nama_menu" value="{{ $menu->nama_menu }}">
                    </div>
                    <div class="mb-3">
                      <label for="">Tipe Produk</label>
                      <input type="text" class="form-control" name="tipe_produk" value="{{ $menu->tipe_produk }}">
                    </div>
                    <div class="mb-3">
                      <label for="">Harga Modal</label>
                      <input type="text" class="form-control" name="harga_modal" value="{{ $menu->harga_modal }}">
                    </div>
                    <div class="mb-3">
                      <label for="">Harga Jual</label>
                      <input type="text" class="form-control" name="harga_jual" value="{{ $menu->harga_jual }}">
                    </div>
                    <div class="mb-3">
                      <label for="">Stok</label>
                      <input type="text" class="form-control" name="stok" value="{{ $menu->stok }}">
                    </div>
                    <div class="mb-3">
                      <label for="">Deskripsi</label>
                      <input type="textarea" class="form-control" name="deskripsi" value="{{ $menu->deskripsi }}">
                    </div>

                    <button width="20%" type="submit" class="btn-success mx-auto" style="
                    background-color: #6ECED9;
                    color: black;
                    border: 0;
                    width: 77%;
                    height: 90%;
                    display: flex;
                    justify-content: center;
                  ">
                      <h6>Ubah Menu</h6>
                    </button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


</body>

</html>