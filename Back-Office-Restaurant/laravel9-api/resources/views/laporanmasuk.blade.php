<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://w7.pngwing.com/pngs/538/135/png-transparent-computer-icons-report-icon-angle-text-cost.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/25495e258e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/25495e258e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="all.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">
    <title>Tambah Laporan</title>
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
            <h2>Tambah Laporan</h2>
        </div>
        <!-- header -->

        <div class="body-content py-5" style="background-color: #42d7f5;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="card">
                            <div class="card-header" style="background-color: #6ECED9">
                                <h5>Tambah Laporan</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('laporanmasuk.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mx-auto">
                                        <div class="mb-3">
                                            <label for="">Hari</label>
                                            <input type="text" class="form-control" name="hari">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label>Tanggal</label>
                                            <div class="input-group date" id="startdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#startdate" />
                                                <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="mb-3">
                                            <label for="">Pemasukan</label>
                                            <input type="text" class="form-control" name="pemasukan">
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
                                            <h6>Tambah Laporan</h6>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $('#example2').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
            $('#startdate').datetimepicker({
                format: 'L'
            });
            $('#enddate').datetimepicker({
                format: 'L'
            });
            $('#btnlaporan').click(function() {
                confirm("Apa Anda Yakin ingin mengunduh laporan?");
            })
        </script>
</body>

</html>