<?php include('Pages/PTHeader.php'); ?>
<?php include('Pages/PTTopbar.php'); ?>
<?php include('Pages/PTSidebar.php'); ?>

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
        margin-bottom: 0.5rem;
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

    .modal-body .row {
        margin-bottom: 0.5rem;
        margin-left: 0.3rem;
    }

    .modal-body .col-mb-6 {
        flex: 0 0 calc(50% - 0.5rem);
        margin-right: 0.5rem;

    }

    .modal-body .col-mb-6:last-child {
        margin-right: 0;
    }

    .modal-body .form-group {
        margin-bottom: 0.5rem;
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
                        <li class="breadcrumb-item"><a href="<?= base_url('PTArsip/index');?>"> Kelola Data </a></li>
                        <li class="breadcrumb-item active"> Data Arsip </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> Data Arsip </b></h3>
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
                <form method="get" action="">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search"
                            value="<?= $search ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"> Search </button>
                        </div>
                    </div>
                </form>

                <table id="data-table">
                    <thead>
                        <tr>
                            <th data-column="no"> No <span class="sort-indicator" id="sort-no"></span></th>
                            <th data-column="idarsp"> ID Arsip <span class="sort-indicator" id="sort-idarsp"></span>
                            </th>
                            <th data-column="judul_arsp"> Judul Arsip <span class="sort-indicator"
                                    id="sort-judul_arsp"></span></th>
                            <th data-column="kat_arsp"> Kategori Arsip <span class="sort-indicator"
                                    id="sort-kat_arsp"></span></th>
                            <th data-column="nama_wp"> Nama Wajib Pajak <span class="sort-indicator"
                                    id="sort-nama_wp"></span></th>
                            <th data-column="nama_ptgs"> Nama Petugas <span class="sort-indicator"
                                    id="sort-nama_ptgs"></span></th>
                            <th data-column="tgl_pembuatan"> Tanggal Pembuatan <span class="sort-indicator"
                                    id="sort-tgl_pembuatan"></span></th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + ($currentPage - 1) * $limit; foreach ($arsip as $arsp): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $arsp->idarsp ?></td>
                            <td><?= $arsp->judul_arsp ?></td>
                            <td><?= $arsp->kat_arsp ?></td>
                            <td><?= $arsp->nama_wp ?></td>
                            <td><?= $arsp->nama_ptgs ?></td>
                            <td><?= $arsp->tgl_pembuatan ?></td>
                            <td>
                                <button type="button" class="btn btn-warning"
                                    onclick="openEditModal('<?= $arsp->idarsp ?>', '<?= $arsp->judul_arsp ?>', '<?= $arsp->kat_arsp ?>', '<?= $arsp->idwp ?>', '<?= $arsp->nama_wp ?>', '<?= $arsp->idptgs ?>', '<?= $arsp->nama_ptgs ?>', '<?= $arsp->tgl_pembuatan ?>', '<?= $arsp->status_arsp ?>')">
                                    Edit </button>
                                |
                                <button type="button" class="btn btn-danger" onclick="hapusDA('<?= $arsp->idarsp ?>')">
                                    Hapus </button> |
                                <button type="button" class="btn btn-tool"
                                    onclick="openDetailModal('<?= $arsp->judul_arsp ?>', '<?= $arsp->kat_arsp ?>', '<?= $arsp->idwp ?>', '<?= $arsp->nama_wp ?>', '<?= $arsp->idptgs ?>', '<?= $arsp->nama_ptgs ?>', '<?= $arsp->tgl_pembuatan ?>', '<?= $arsp->status_arsp ?>')">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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
                <button type="button" class="btn btn-primary" onclick="openTambahModal()"> Tambah Arsip </button>
            </div>
        </div>
    </section>
</div>

<!-- Modal untuk Tambah Data Arsip -->
<div class="modal fade" id="modalTambahDA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Data Arsip </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahDA">
                    <div class="form-group">
                        <label for="idarsp"> ID Arsip : </label>
                        <input type="text" id="idarsp" name="idarsp" required>
                    </div>
                    <div class="form-group">
                        <label for="judul_arsp"> Judul Arsip : </label>
                        <input type="text" id="judul_arsp" name="judul_arsp" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-mb-6">
                                <label for="idwp"> ID Wajib : </label>
                                <select id="idwp" name="idwp" required onchange="setNamaWP(this)">
                                    <option value=""> Pilih ID WP </option>
                                    <?php foreach ($wajibpajak as $wp): ?>
                                    <option value="<?= $wp->idwp ?>" data-namawp="<?= $wp->nama_wp ?>"><?= $wp->idwp ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-mb-6">
                                <label for="nama_wp"> Nama Wajib Pajak : </label>
                                <input type="text" id="nama_wp" name="nama_wp" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-mb-6">
                                <label for="idptgs"> ID Petugas : </label>
                                <select id="idptgs" name="idptgs" required onchange="setNamaPetugas(this)">
                                    <option value=""> Pilih ID Petugas </option>
                                    <?php foreach ($petugas as $ptgs): ?>
                                    <option value="<?= $ptgs->idptgs ?>" data-namaptgs="<?= $ptgs->nama_ptgs ?>">
                                        <?= $ptgs->idptgs ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-mb-6">
                                <label for="nama_ptgs"> Nama Petugas : </label>
                                <input type="text" id="nama_ptgs" name="nama_ptgs" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pembuatan"> Tanggal Pembuatan : </label>
                        <input type="date" id="tgl_pembuatan" name="tgl_pembuatan" required
                            onchange="checkTanggalPembuatan(this, document.getElementById('status_arsp'))">
                    </div>
                    <div class="form-group">
                        <label for="kat_arsp"> Kategori Arsip : </label>
                        <select id="kat_arsp" name="kat_arsp" required>
                            <option value=""> Pilih Kategori </option>
                            <option value="Hiburan"> Hiburan </option>
                            <option value="Restauran"> Restauran </option>
                            <option value="Hotel"> Hotel </option>
                            <option value="Parkir"> Parkir </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_arsp"> Status Arsip : </label>
                        <input type="text" id="status_arsp" name="status_arsp" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Data Arsip -->
<div class="modal fade" id="modalEditDA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Data Arsip </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditDA">
                    <div class="form-group">
                        <input type="hidden" id="edit_idarsp" name="idarsp">
                    </div>
                    <div class="form-group">
                        <label for="edit_judul_arsp"> Judul Arsip : </label>
                        <input type="text" id="edit_judul_arsp" name="judul_arsp" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-mb-6">
                                <label for="edit_idwp"> ID Wajib Pajak : </label>
                                <select id="edit_idwp" name="idwp" required onchange="setNamaWP(this)">
                                    <option value=""> Pilih ID WP </option>
                                    <?php foreach ($wajibpajak as $wp): ?>
                                    <option value="<?= $wp->idwp ?>" data-namawp="<?= $wp->nama_wp ?>"><?= $wp->idwp ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-mb-6">
                                <label for="edit_nama_wp"> Nama Wajib Pajak : </label>
                                <input type="text" id="edit_nama_wp" name="nama_wp" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-mb-6">
                                <label for="edit_idptgs"> ID Petugas : </label>
                                <select id="edit_idptgs" name="idptgs" required onchange="setNamaPetugas(this)">
                                    <option value=""> Pilih ID Petugas </option>
                                    <?php foreach ($petugas as $ptgs): ?>
                                    <option value="<?= $ptgs->idptgs ?>" data-namaptgs="<?= $ptgs->nama_ptgs ?>">
                                        <?= $ptgs->idptgs ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-mb-6">
                                <label for="edit_nama_ptgs"> Nama Petugas : </label>
                                <input type="text" id="edit_nama_ptgs" name="nama_ptgs" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_tgl_pembuatan"> Tanggal Pembuatan : </label>
                        <input type="date" id="edit_tgl_pembuatan" name="tgl_pembuatan" required
                            onchange="checkTanggalPembuatan(this, document.getElementById('edit_status_arsp'))">
                    </div>
                    <div class="form-group">
                        <label for="edit_kat_arsp"> Kategori Arsip : </label>
                        <select id="edit_kat_arsp" name="kat_arsp" required>
                            <option value=""> Pilih Kategori </option>
                            <option value="Hiburan"> Hiburan </option>
                            <option value="Restauran"> Restauran </option>
                            <option value="Hotel"> Hotel </option>
                            <option value="Parkir"> Parkir </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_status_arsp"> Status Arsip : </label>
                        <input type="text" id="edit_status_arsp" name="status_arsp" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Hapus Data Arsip -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Konfirmasi Hapus Data Arsip </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data arsip ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="konfirmasiHapus()"> Hapus </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Detail Penyimpanan Data Arsip -->
<div class="modal fade" id="modalDetailPDA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Detail Data Arsip </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body" id="detailArsipContent">
                <!-- Informasi detail arsip akan ditampilkan di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="button btn-secondary" data-dismiss="modal"> Tutup </button>
            </div>
        </div>
    </div>
</div>

<?php include('Pages/Footer.php'); ?>

<script>
    // Fungsi untuk membuka modal tambah data arsip
    function openTambahModal() {
        var modal = new bootstrap.Modal(document.getElementById('modalTambahDA'));
        modal.show();
    }

    // Fungsi untuk menutup modal
    function closeModal(modalId) {
        var modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
        modal.hide();
    }

    // Fungsi untuk mengirim data tambah arsip ke backend
    document.getElementById("formTambahDA").addEventListener("submit", function (event) {
        event.preventDefault();
        tambahDataDA();
    });

    // Fungsi untuk mengisi nama wp berdasarkan pilihan ID wp
    function setNamaWP(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const namaWP = selectedOption.getAttribute('data-namawp');
        if (selectElement.id === 'idwp') {
            document.getElementById('nama_wp').value = namaWP;
        } else {
            document.getElementById('edit_nama_wp').value = namaWP;
        }
    }

    // Fungsi untuk mengisi nama petugas berdasarkan pilihan ID petugas
    function setNamaPetugas(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const namaPtgs = selectedOption.getAttribute('data-namaptgs');
        if (selectElement.id === 'idptgs') {
            document.getElementById('nama_ptgs').value = namaPtgs;
        } else {
            document.getElementById('edit_nama_ptgs').value = namaPtgs;
        }
    }

    function tambahDataDA() {
        var data = {
            idarsp: document.getElementById("idarsp").value,
            judul_arsp: document.getElementById("judul_arsp").value,
            kat_arsp: document.getElementById("kat_arsp").value,
            idwp: document.getElementById("idwp").value,
            nama_wp: document.getElementById("nama_wp").value,
            idptgs: document.getElementById("idptgs").value,
            nama_ptgs: document.getElementById("nama_ptgs").value,
            tgl_pembuatan: document.getElementById("tgl_pembuatan").value,
            status_arsp: document.getElementById("status_arsp").value
        };

        fetch('/PTArsip/tambahDA', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('modalTambahDA');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk membuka modal edit data arsip
    function openEditModal(idarsp, judul_arsp, kat_arsp, idwp, nama_wp, idptgs, nama_ptgs, tgl_pembuatan, status_arsp) {
        document.getElementById('edit_idarsp').value = idarsp;
        document.getElementById('edit_judul_arsp').value = judul_arsp;
        document.getElementById('edit_kat_arsp').value = kat_arsp;
        document.getElementById('edit_idwp').value = idwp;
        document.getElementById('edit_nama_wp').value = nama_wp;
        document.getElementById('edit_idptgs').value = idptgs;
        document.getElementById('edit_nama_ptgs').value = nama_ptgs;
        document.getElementById('edit_tgl_pembuatan').value = tgl_pembuatan;
        document.getElementById('edit_status_arsp').value = status_arsp;

        var modal = new bootstrap.Modal(document.getElementById('modalEditDA'));
        modal.show();
    }

    // Fungsi untuk mengirim data edit arsip ke backend
    document.getElementById("formEditDA").addEventListener("submit", function (event) {
        event.preventDefault();
        editDataDA();
    });

    function editDataDA() {
        var data = {
            idarsp: document.getElementById("edit_idarsp").value,
            judul_arsp: document.getElementById("edit_judul_arsp").value,
            kat_arsp: document.getElementById("edit_kat_arsp").value,
            idwp: document.getElementById("edit_idwp").value,
            nama_wp: document.getElementById("edit_nama_wp").value,
            idptgs: document.getElementById("edit_idptgs").value,
            nama_ptgs: document.getElementById("edit_nama_ptgs").value,
            tgl_pembuatan: document.getElementById("edit_tgl_pembuatan").value,
            status_arsp: document.getElementById("edit_status_arsp").value
        };

        fetch('/PTArsip/editDA/' + data.idarsp, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('modalEditDA');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk menghapus data arsip
    function hapusDA(idarsp) {
        var modal = new bootstrap.Modal(document.getElementById('hapusModal'));
        document.getElementById('hapusModal').setAttribute('data-idarsp', idarsp);
        modal.show();
    }

    function konfirmasiHapus() {
        var idarsp = document.getElementById('hapusModal').getAttribute('data-idarsp');

        fetch('/PTArsip/hapusDA/' + idarsp, {
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

    // Fungsi untuk membuka modal detail data penyimpanan arsip
    function openDetailModal(judul_arsp, kat_arsp, idwp, nama_wp, idptgs, nama_ptgs, tgl_pembuatan, status_arsp) {
        var modal = new bootstrap.Modal(document.getElementById('modalDetailPDA'));
        var detailContent = document.getElementById('detailArsipContent');

        // Mengambil data arsip berdasarkan idarsp
        fetch(`/ADPenyimpananArsip/detail/${idarsp}`)
            .then(response => response.json())
            .then(data => {
                // Menyiapkan konten untuk ditampilkan dalam bentuk tabel
                var contentHTML = `
            <table>
                <tr><td><strong> Judul Arsip : </strong></td><td> ${judul_arsp}</td></tr>
                <tr><td><strong> Kategori Arsip : </strong></td><td> ${kat_arsp}</td></tr>
                <tr><td><strong> ID Wajib Pajak : </strong></td><td> ${idwp}</td></tr>
                <tr><td><strong> Nama Wajib Pajak : </strong></td><td> ${nama_wp}</td></tr>
                <tr><td><strong> ID Petugas : </strong></td><td> ${idptgs}</td></tr>
                <tr><td><strong> Nama Petugas : </strong></td><td> ${nama_ptgs}</td></tr>
                <tr><td><strong> Tanggal Pembuatan : </strong></td><td> ${tgl_pembuatan}</td></tr>
                <tr><td><strong> Status Arsip : </strong></td><td> ${status_arsp}</td></tr>
            </table>
            `;

                // Memasukkan konten ke dalam modal
                detailContent.innerHTML = contentHTML;

                // Menampilkan modal
                modal.show();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    //Fungsi untuk mengsortir data tabel
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('data-table');
        const headers = table.querySelectorAll('th[data-column]');
        let currentSort = {
            column: '',
            order: ''
        };

        headers.forEach(header => {
            header.addEventListener('click', () => {
                const column = header.getAttribute('data-column');
                const sortIndicator = header.querySelector('.sort-indicator');

                if (currentSort.column === column) {
                    currentSort.order = currentSort.order === 'asc' ? 'desc' : 'asc';
                } else {
                    currentSort.column = column;
                    currentSort.order = 'asc';
                }

                updateSortIndicators();
                sortTable(column, currentSort.order);
            });
        });

        function updateSortIndicators() {
            headers.forEach(header => {
                const sortIndicator = header.querySelector('.sort-indicator');
                if (header.getAttribute('data-column') === currentSort.column) {
                    sortIndicator.className = 'sort-indicator ' + currentSort.order;
                } else {
                    sortIndicator.className = 'sort-indicator';
                }
            });
        }

        function sortTable(column, order) {
            const rows = Array.from(table.querySelector('tbody').rows);
            rows.sort((a, b) => {
                const cellA = a.querySelector(`td:nth-child(${getColumnIndex(column)})`).innerText
                    .toLowerCase();
                const cellB = b.querySelector(`td:nth-child(${getColumnIndex(column)})`).innerText
                    .toLowerCase();

                if (cellA < cellB) return order === 'asc' ? -1 : 1;
                if (cellA > cellB) return order === 'asc' ? 1 : -1;
                return 0;
            });

            rows.forEach(row => table.querySelector('tbody').appendChild(row));
        }

        function getColumnIndex(column) {
            return Array.from(headers).findIndex(header => header.getAttribute('data-column') === column) + 1;
        }
    });

    // Fungsi untuk memeriksa tanggal pembuatan dan mengubah status arsip
    function checkTanggalPembuatan(tglElement, statusElement) {
        const tanggal = new Date(tglElement.value);
        const tahun = tanggal.getFullYear();

        if (tahun < 2023) {
            statusElement.value = "Tidak Aktif";
        } else {
            statusElement.value = "Aktif";
        }
    }
</script>