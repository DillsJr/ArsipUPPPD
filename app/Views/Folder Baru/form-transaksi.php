<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <form method="post" action="#">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Nomor Transaksi</label>
        <input type="text" name="transno" class="form-control">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Tanggal Transaksi</label>
        <input type="text" name="trans_date" class="form-control">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Contact Name</label>
        <select id = "cid" name="cid">
            <option value="">Select Contact name</option>
            <?php foreach($transh as $row)
                {
                    echo "<option value=$row->cid>$row->cid</option>";
                }
            ?>
        </select>
    </div>
    <button class="btn btn-primary btn-sm" type="submit">Save</button>
    <a href="#" class="btn btn-danger btn-sm">Cancel</a>
    </form>
    </div>
</body>
</html>