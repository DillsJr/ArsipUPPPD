<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <a href="#" class="btn btn-info btn-sm">Add New</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Nomor Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Customer Id</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        foreach ($z as $row){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->transno; ?></td>
                <td><?= $row->trans_date ?></td>
                <td><?= $row->cid; ?></td>
                <td>
                  <a href="#" type="button" class="btn btn-danger btn-sm">Edit</a>
                  <a href="#" type="button" class="btn btn-primary btn-sm">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </table>
      </div>
    </body>
    </html>