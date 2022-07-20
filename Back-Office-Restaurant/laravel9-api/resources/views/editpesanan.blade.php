<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
            <a href="beranda.html">Beranda</a>
            <a href="menu.html">Menu</a>
            <a href="Kitchendisplay.html">Kitchen Display</a>
            <a href="pesanan.html">Pesanan Selesai</a>
            <a href="laporanmasuk1.html">Laporan</a>
            <a href="{{ url('/feedback') }}">Feedback</a>
        </div>
    </div>

    <div class="content">
        <div class="header-content">
            <h2>Kitchen Display</h2>
        </div>
        <div class="col-12 text-center mb-4">
            <button class="btn btn-primary" style="padding:20px 40px; border-radius: 0; background-color:#6ECED9; color:#000; outline: #6ECED9;">PESANAN</button>
        </div>
        <div class="body-content">
            <div class="container" style="border-color:transparent">
                <div class="row mx-auto">

                    <form action="{{ route('pesanan.update', $pesanan->id_pesanan) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Modal -->
                        <div class="modal fade" id="addmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Book</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="bookForm" name="bookForm" class="form-horizontal">
                                            @csrf
                                            <input type="hidden" name="book_id" id="book_id">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                                                </div>
                                            </div>

                                            <div class="form-group mt-3">
                                                <label class="col-sm-2 control-label">Author</label>
                                                <div class="col-sm-12">
                                                    <textarea id="author" name="author" required="" placeholder="Enter Author" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-offset-2 col-sm-10 mt-3">
                                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                                                </button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="body-content">
      <div class="container">
        
      </div>
    </div> -->

        </div>
    </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>

</html>