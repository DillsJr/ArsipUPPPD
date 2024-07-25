<!doctype html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>Aplikasi Bisnis</title>
    <style>
        .topmenu {
    background-color: black;
}

.leftmenu {
    background-color: crimson;
    height: 70vh;
    margin-left: 12px;
    border-radius: 3px;
}
.bodycontent {
    background-color: crimson;
    height: 70vh;
    width: 80%;
    margin-left:12px;
    border-radius: 3px;
}

.nav-link {
    color: black;
}

.nav-link:hover{
    color: white;
    text-decoration: underline;
}

.form01 {
    margin-top: 40px;
    margin-left: 20px;
    margin-right: 20px;
}
    </style>
</head>

<body>
<form method="post" action="<?=base_url()?>/karyawan/EditKaryawan">
    <!-- Top Menu -->
    <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-dark topmenu">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Top Menu -->

        <div class="row mt-2">
            <!-- Left Menu -->
            <div class="col-sm-2 leftmenu">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="tambah_data">Home</a>
                    </li>
                </ul>
            </div>
            <!-- End Left Menu -->
<body>
    <div class="col-sm-10 bodycontent">
                <div class="form01">
                    <form>
                        <div class="row mb-3">
                            <label for="#" class="col-sm-2 col-form-label">ID Karyawan</label>
                            <div class="col-sm-10">
                            <input type="text" name="idkaryawan" class="form-control" value="<?=$dt->idkaryawan?>"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="#" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" name="nama_karyawan" class="form-control" value="<?=$dt->nama_karyawan?>"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="#" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                            <input type="text" name="idjabatan" class="form-control" value="<?=$dt->idjabatan?>"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="#" class="col-sm-2 col-form-label">Tanggal_lahir</label>
                            <div class="col-sm-10">
                            <input type="text" name="tanggal_lahir" class="form-control" value="<?=$dt->tanggal_lahir?>"> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="#" class="col-sm-2 col-form-label">kota</label>
                            <div class="col-sm-10">
                            <input type="text" name="kota" class="form-control" value="<?=$dt->kota?>"> 
                            </div>
                        </div>
                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                    <a href="<?php base_url()?>/karyawan/showkaryawan" class="btn btn-danger btn-sm">Cancel</a>
                    </form>
                </div>
    </div>
</body>
</html>