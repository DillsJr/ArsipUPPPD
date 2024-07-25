<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Gaming</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <a href="<?=base_url()?>/product/form_tambahproduct" class="btn btn-info btn-sm">Add New</a>
    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        $no = 1;
        foreach ($x as $row){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->pid; ?></td>
                <td><?= $row->pname ?></td>
                <td><?= $row->price; ?></td>
                <td>
                  <a href="form_editproduct/<?=$row->pid ?>" class="btn btn-danger btn-sm">Edit</a>
                  <a href="<?php base_url()?>/product/delete_product/<?= $row->pid?>" type="button" class="btn btn-primary btn-sm">Delete</a>
                  <!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                  </button>

                  
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah yakin ingin menghapus product ini?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <a href="<?php base_url()?>/product/delete_product/<?= $row->pid?>" type="button" class="btn btn-primary">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div> -->
                </td>
            </tr>
        <?php
        }
        ?>
        </table>
      </div>
    </body>
    </html>