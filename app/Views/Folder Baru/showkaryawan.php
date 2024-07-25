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
    <!-- Top Menu -->
    <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-dark topmenu">
                    <div class="container-fluid">
                    <a href="<?=base_url()?>/karyawan/form_tambahkaryawan">Add New</a>
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
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <!-- End Left Menu -->
<body>
    <div class="col-sm-10 bodycontent">
                <div class="form01">
                    <table class="table table-striped">
                      <tr>
                          <th>No</th>
                          <th>ID Karyawan</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Tanggal Lahir</th>
                          <th>Kota</th>
                          <th>Action</th>
                      </tr>
                      <?php
                        $no = 1;
                        foreach ($y as $row){
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->idkaryawan; ?></td>
                                <td><?= $row->nama_karyawan; ?></td>
                                <td><?= $row->idjabatan; ?></td>
                                <td><?= $row->tanggal_lahir; ?></td>
                                <td><?= $row->kota; ?></td>
                                <td>
                                  <a href="form_editkaryawan/<?=$row->idkaryawan ?>" class="btn btn-danger btn-sm">Edit</a>
                                  <a href="<?php base_url()?>/karyawan/delete_karyawan/<?= $row->idkaryawan?>" type="button" class="btn btn-primary btn-sm">Delete</a>
                                </td>
                            </tr>
                      <?php
                      }
                      ?>
                    </table>
                </div>
    </div>          
</body>
</html>