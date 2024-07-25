<?php include('Pages/ADHeader.php'); ?>
<?php include('Pages/ADTopbar.php'); ?>
<?php include('Pages/ADSidebar.php'); ?>

<style>
    .photo-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 25rem;
    }

    .photo-item {
        flex: 1;
        max-width: 500px;
    }

    .photo-item img {
        width: 100%;
        height: auto;
    }

    .w3-container {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .modals {
        box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
        border-radius: 20px;
    }

    .button {
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }

    .sort-indicator {
        display: inline-block;
        margin-left: 5px;
    }

    .sort-indicator.asc::before {
        content: "▲";
    }

    .sort-indicator.desc::before {
        content: "▼";
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Kelola Data </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('ADWajibPajak/index');?>"> Kelola Data </a>
                        </li>
                        <li class="breadcrumb-item active"> Data Wajib Pajak </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> Data Wajib Pajak </b></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="data-table">
                    <thead>
                        <tr>
                            <th data-column="no"> No <span class="sort-indicator"></span></th>
                            <th data-column="idwp"> ID Wajib Pajak <span class="sort-indicator"></span></th>
                            <th data-column="nama_wp"> Nama Wajib Pajak <span class="sort-indicator"></span></th>
                            <th data-column="npwp"> NPWP <span class="sort-indicator"></span></th>
                            <th data-column="nopd"> NOPD <span class="sort-indicator"></span></th>
                            <th data-column="notelp"> No Telpon <span class="sort-indicator"></span></th>
                            <th data-column="email"> Email <span class="sort-indicator"></span></th>
                            <th data-column="alamat"> Alamat <span class="sort-indicator"></span></th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + ($currentPage - 1) * $limit; foreach ($wajibpajak as $wp): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $wp->idwp ?></td>
                            <td><?= $wp->nama_wp ?></td>
                            <td><?= $wp->npwp ?></td>
                            <td><?= $wp->nopd ?></td>
                            <td><?= $wp->notelp ?></td>
                            <td><?= $wp->email ?></td>
                            <td><?= $wp->alamat ?></td>
                            <td>
                                <button type="button" class="btn btn-warning"
                                    onclick="openEditModal('<?= $wp->idwp ?>', '<?= $wp->nama_wp ?>', '<?= $wp->npwp ?>', '<?= $wp->nopd ?>', '<?= $wp->notelp ?>', '<?= $wp->email ?>', '<?= $wp->tgllahir ?>', '<?= $wp->alamat ?>')">
                                    Edit </button>
                                |
                                <button type="button" class="btn btn-danger" onclick="hapusWP('<?= $wp->idwp ?>')">
                                    Hapus </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- Previous button -->
                    <li class="page-item <?= $currentPage == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $currentPage - 1 ?>&search=<?= $search ?>"
                            aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only"> Previous </span>
                        </a>
                    </li>

                    <?php for ($i = 1; $i <= ceil($total / $limit); $i++): ?>
                    <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>&search=<?= $search ?>"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>

                    <!-- Next button -->
                    <li class="page-item <?= $currentPage == ceil($total / $limit) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $currentPage + 1 ?>&search=<?= $search ?>"
                            aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only"> Next </span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="card-footer">
                <button type="button" class="btn btn-primary" onclick="openTambahModal()"> Tambah Wajib Pajak </button>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal untuk Tambah Data Wajib Pajak -->
<div class="modal fade" id="modalTambahWP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Data Wajib Pajak </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahWP">
                    <div class="form-group">
                        <label for="idwp"> ID Wajib Pajak : </label>
                        <input type="text" id="idwp" name="idwp" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_wp"> Nama Wajib Pajak : </label>
                        <input type="text" id="nama_wp" name="nama_wp" required>
                    </div>
                    <div class="form-group">
                        <label for="npwp"> NPWP : </label>
                        <input type="number" id="npwp" name="npwp" oninput="validateNPWP(this)" minlength="16"
                            maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="nopd"> NOPD : </label>
                        <input type="number" id="nopd" name="nopd" minlength="16" oninput="validateNPWP(this)"
                            maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="notelp"> No Telpon : </label>
                        <input type="text" id="notelp" name="notelp" required>
                    </div>
                    <div class="form-group">
                        <label for="email"> Email : </label>
                        <input type="text" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="tgllahir"> Tanggal Lahir : </label>
                        <input type="date" id="tgllahir" name="tgllahir" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat"> Alamat : </label>
                        <input type="text" id="alamat" name="alamat" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Data Wajib Pajak -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Data Wajib Pajak </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditWP">
                    <div class="form-group">
                        <input type="hidden" id="edit_idwp" name="idwp">
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_wp"> Nama Wajib Pajak : </label>
                        <input type="text" id="edit_nama_wp" name="nama_wp" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_npwp"> NPWP : </label>
                        <input type="number" id="edit_npwp" name="edit_npwp" oninput="validateNPWP(this)" minlength="16"
                            maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_nopd"> NOPD : </label>
                        <input type="number" id="edit_nopd" name="edit_nopd" minlength="16" oninput="validateNPWP(this)"
                            maxlength="16" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_notelp"> No Telpon : </label>
                        <input type="text" id="edit_notelp" name="notelp" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email"> Email : </label>
                        <input type="text" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_tgllahir"> Tanggal Lahir : </label>
                        <input type="date" id="edit_tgllahir" name="tgllahir" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_alamat"> Alamat : </label>
                        <input type="text" id="edit_alamat" name="alamat" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Hapus Data Wajib Pajak -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Konfirmasi Hapus Data Wajib Pajak </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data wajib pajak ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="konfirmasiHapus()"> Hapus </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk membuka modal tambah data wajib pajak
    function openTambahModal() {
        var modal = new bootstrap.Modal(document.getElementById('modalTambahWP'));
        modal.show();
    }

    // Fungsi untuk menutup modal
    function closeModal(modalId) {
        var modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.hide();
    }

    // Fungsi untuk mengirim data tambah wajib pajak ke backend
    document.getElementById("formTambahWP").addEventListener("submit", function (event) {
        event.preventDefault();
        tambahDataWP();
    });

    function tambahDataWP() {
        var data = {
            idwp: document.getElementById("idwp").value,
            nama_wp: document.getElementById("nama_wp").value,
            npwp: document.getElementById("npwp").value,
            nopd: document.getElementById("nopd").value,
            notelp: document.getElementById("notelp").value,
            email: document.getElementById("email").value,
            tgllahir: document.getElementById("tgllahir").value,
            alamat: document.getElementById("alamat").value
        };

        fetch('/ADWajibPajak/tambahWP', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('modalTambahWP');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk membuka modal edit data wajib pajak
    function openEditModal(idwp, nama_wp, npwp, nopd, notelp, email, tgllahir, alamat) {
        document.getElementById('edit_idwp').value = idwp;
        document.getElementById('edit_nama_wp').value = nama_wp;
        document.getElementById('edit_npwp').value = npwp;
        document.getElementById('edit_nopd').value = nopd;
        document.getElementById('edit_notelp').value = notelp;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_tgllahir').value = tgllahir;
        document.getElementById('edit_alamat').value = alamat;

        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    }

    // Fungsi untuk mengirim data edit wajib pajak ke backend
    document.getElementById("formEditWP").addEventListener("submit", function (event) {
        event.preventDefault();
        editDataWP();
    });

    function editDataWP() {
        var data = {
            idwp: document.getElementById("edit_idwp").value,
            nama_wp: document.getElementById("edit_nama_wp").value,
            npwp: document.getElementById("edit_npwp").value,
            nopd: document.getElementById("edit_nopd").value,
            notelp: document.getElementById("edit_notelp").value,
            email: document.getElementById("edit_email").value,
            tgllahir: document.getElementById("edit_tgllahir").value,
            alamat: document.getElementById("edit_alamat").value
        };

        fetch('/ADWajibPajak/editWP/' + data.idwp, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('editModal');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk menghapus data wajib pajak
    function hapusWP(idwp) {
        var modal = new bootstrap.Modal(document.getElementById('hapusModal'));
        document.getElementById('hapusModal').setAttribute('data-idwp', idwp);
        modal.show();
    }

    function konfirmasiHapus() {
        var idwp = document.getElementById('hapusModal').getAttribute('data-idwp');

        fetch('/ADWajibPajak/hapusWP/' + idwp, {
                method: 'DELETE'
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('hapusModal');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    //Fungsi untuk mengsortir data tabel
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('data-table');
        const headers = table.querySelectorAll('th[data-column]');
        const rows = Array.from(table.querySelectorAll('tbody tr'));

        headers.forEach(header => {
            header.addEventListener('click', () => {
                const column = header.getAttribute('data-column');
                const sortOrder = header.classList.contains('asc') ? 'desc' : 'asc';

                headers.forEach(h => {
                    h.classList.remove('asc', 'desc');
                    h.querySelector('.sort-indicator').classList.remove('asc', 'desc');
                });

                header.classList.add(sortOrder);
                header.querySelector('.sort-indicator').classList.add(sortOrder);

                rows.sort((a, b) => {
                    const cellA = a.querySelector(
                            `td:nth-child(${header.cellIndex + 1})`).innerText
                        .toLowerCase();
                    const cellB = b.querySelector(
                            `td:nth-child(${header.cellIndex + 1})`).innerText
                        .toLowerCase();

                    if (cellA < cellB) return sortOrder === 'asc' ? -1 : 1;
                    if (cellA > cellB) return sortOrder === 'asc' ? 1 : -1;
                    return 0;
                });

                const tbody = table.querySelector('tbody');
                rows.forEach(row => tbody.appendChild(row));
            });
        });
    })

    // Fungsi untuk validasi NPWP hanya angka dan panjang 16 karakter
    function validateNPWP(input) {
        input.value = input.value.replace(/\D/g, ''); // Hanya angka yang diizinkan
        if (input.value.length > 16) {
            input.value = input.value.slice(0, 16); // Batasi panjang maksimal 16 karakter
        }
    }

    // Fungsi untuk validasi NOPD hanya angka dan panjang 16 karakter
    function validateNOPD(input) {
        input.value = input.value.replace(/\D/g, ''); // Hanya angka yang diizinkan
        if (input.value.length > 16) {
            input.value = input.value.slice(0, 16); // Batasi panjang maksimal 16 karakter
        }
    }
</script>

<?php include('Pages/Footer.php'); ?>