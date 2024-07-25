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
                        <li class="breadcrumb-item"><a href="<?= base_url('ADPetugas/index');?>"> Kelola Data </a></li>
                        <li class="breadcrumb-item active"> Data Petugas </li>
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
                <h3 class="card-title"><b> Data Petugas </b></h3>
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
                            <th data-column="idptgs"> ID Petugas <span class="sort-indicator"></span></th>
                            <th data-column="nama_ptgs"> Nama Petugas <span class="sort-indicator"></span></th>
                            <th data-column="notlp"> No Telepon <span class="sort-indicator"></span></th>
                            <th data-column="jabatan"> Jabatan <span class="sort-indicator"></span></th>
                            <th data-column="jenis_kelamin"> Jenis Kelamin <span class="sort-indicator"></span></th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + ($currentPage - 1) * $limit; foreach ($petugas as $ptgs) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ptgs->idptgs ?></td>
                            <td><?= $ptgs->nama_ptgs ?></td>
                            <td><?= $ptgs->notlp ?></td>
                            <td><?= $ptgs->jabatan ?></td>
                            <td><?= $ptgs->jenis_kelamin ?></td>
                            <td>
                                <button type="button" class="btn btn-warning"
                                    onclick="openEditModal('<?= $ptgs->idptgs ?>', '<?= $ptgs->nama_ptgs ?>', '<?= $ptgs->notlp ?>', '<?= $ptgs->jabatan ?>', '<?= $ptgs->jenis_kelamin ?>')">
                                    Edit
                                </button> |
                                <button type="button" class="btn btn-danger" onclick="hapusDP('<?= $ptgs->idptgs ?>')">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>

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
                <button type="button" class="btn btn-primary" onclick="openTambahModal()"> Tambah Petugas </button>
            </div>
        </div>
    </section>
</div>

<!-- Modal untuk Tambah Data Petugas -->
<div class="modal fade" id="modalTambahDP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Data Petugas </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahDP">
                    <div class="form-group">
                        <label for="idptgs"> ID Petugas : </label>
                        <input type="text" id="idptgs" name="idptgs" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_ptgs"> Nama Petugas : </label>
                        <input type="text" id="nama_ptgs" name="nama_ptgs" required>
                    </div>
                    <div class="form-group">
                        <label for="notlp"> No Telepon : </label>
                        <input type="text" id="notlp" name="notlp" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan"> Jabatan : </label>
                        <select id="jabatan" name="jabatan" required>
                            <option value=""> Pilih Jabatan </option>
                            <option value="Kepala Unit"> Kepala Unit </option>
                            <option value="Kepala TU"> Kepala TU </option>
                            <option value="Staff TU"> Staff TU </option>
                            <option value="Sekretaris"> Sekretaris </option>
                            <option value="Petugas Lapangan"> Petugas Lapangan </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin"> Jenis Kelamin : </label>
                        <select id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value=""> Pilih Jenis Kelamin </option>
                            <option value="Laki - Laki"> Laki - Laki </option>
                            <option value="Perempuan"> Perempuan </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Data Petugas -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Data Petugas </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditDP">
                    <div class="form-group">
                        <label for="edit_idptgs"> ID Petugas : </label>
                        <input type="text" id="edit_idptgs" name="edit_idptgs" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_ptgs"> Nama Petugas : </label>
                        <input type="text" id="edit_nama_ptgs" name="edit_nama_ptgs" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_notlp"> No Telepon : </label>
                        <input type="text" id="edit_notlp" name="edit_notlp" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_jabatan"> Jabatan : </label>
                        <select id="edit_jabatan" name="edit_jabatan" required>
                            <option value=""> Pilih Jabatan </option>
                            <option value="Kepala Unit"> Kepala Unit </option>
                            <option value="Kepala TU"> Kepala TU </option>
                            <option value="Staff TU"> Staff TU </option>
                            <option value="Sekretaris"> Sekretaris </option>
                            <option value="Petugas Lapangan"> Petugas Lapangan </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_jenis_kelamin"> Jenis Kelamin : </label>
                        <select id="edit_jenis_kelamin" name="edit_jenis_kelamin" required>
                            <option value=""> Pilih Jenis Kelamin </option>
                            <option value="Laki - Laki"> Laki - Laki </option>
                            <option value="Perempuan"> Perempuan </option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Hapus Data Petugas -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Konfirmasi Hapus Data Petugas </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data petugas ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="konfirmasiHapus()"> Hapus </button>
            </div>
        </div>
    </div>
</div>

<?php include('Pages/Footer.php'); ?>

<script>
    // Fungsi untuk membuka modal tambah data petugas
    function openTambahModal() {
        var modal = new bootstrap.Modal(document.getElementById('modalTambahDP'));
        modal.show();
    }

    // Fungsi untuk menutup modal
    function closeModal(modalId) {
        var modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.hide();
    }

    // Fungsi untuk mengirim data tambah petugas ke backend
    document.getElementById("formTambahDP").addEventListener("submit", function (event) {
        event.preventDefault();
        tambahDataDP();
    });

    function tambahDataDP() {
        var data = {
            idptgs: document.getElementById("idptgs").value,
            nama_ptgs: document.getElementById("nama_ptgs").value,
            notlp: document.getElementById("notlp").value,
            jabatan: document.getElementById("jabatan").value,
            jenis_kelamin: document.getElementById("jenis_kelamin").value
        };

        fetch('/ADPetugas/tambahDP', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('modalTambahDP');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk membuka modal edit data petugas
    function openEditModal(idptgs, nama_ptgs, notlp, jabatan, jenis_kelamin) {
        document.getElementById('edit_idptgs').value = idptgs;
        document.getElementById('edit_nama_ptgs').value = nama_ptgs;
        document.getElementById('edit_notlp').value = notlp;
        document.getElementById('edit_jabatan').value = jabatan;
        document.getElementById('edit_jenis_kelamin').value = jenis_kelamin;

        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    }

    // Fungsi untuk mengirim data edit petugas ke backend
    document.getElementById("formEditDP").addEventListener("submit", function (event) {
        event.preventDefault();
        editDataDP();
    });

    function editDataDP() {
        var data = {
            idptgs: document.getElementById("edit_idptgs").value,
            nama_ptgs: document.getElementById("edit_nama_ptgs").value,
            notlp: document.getElementById("edit_notlp").value,
            jabatan: document.getElementById("edit_jabatan").value,
            jenis_kelamin: document.getElementById("edit_jenis_kelamin").value
        };

        fetch('/ADPetugas/editDP/' + data.idptgs, {
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

    // Fungsi untuk menghapus data petugas
    function hapusDP(idptgs) {
        var modal = new bootstrap.Modal(document.getElementById('hapusModal'));
        document.getElementById('hapusModal').setAttribute('data-idptgs', idptgs);
        modal.show();
    }

    function konfirmasiHapus() {
        var idptgs = document.getElementById('hapusModal').getAttribute('data-idptgs');

        fetch('/ADPetugas/hapusDP/' + idptgs, {
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
</script>