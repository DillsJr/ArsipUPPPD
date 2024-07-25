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
                    <h1> Penyimpanan Data Arsip </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('PTPenyimpananArsip/index');?>"> Penyimpanan
                                Data </a></li>
                        <li class="breadcrumb-item active"> Data Arsip </li>
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
                <h3 class="card-title"><b> Penyimpanan Data Arsip </b></h3>
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
                            <th data-column="no"> No <span class="sort-indicator"></span></th>
                            <th data-column="idpda"> ID Penyimpanan Arsip <span class="sort-indicator"></span></th>
                            <th data-column="idarsp"> ID Arsip <span class="sort-indicator"></span></th>
                            <th data-column="kat_arsp"> Kategori Arsip <span class="sort-indicator"></span></th>
                            <th data-column="lok_penyimpanan"> Lokasi Penyimpanan <span class="sort-indicator"></span>
                            </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + ($currentPage - 1) * $limit; foreach ($penyimpanan_arsip as $pda): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pda->idpda ?></td>
                            <td><?= $pda->idarsp ?></td>
                            <td><?= $pda->kat_arsp ?></td>
                            <td><?= $pda->lok_penyimpanan ?></td>
                            <td>
                                <button type="button" class="btn btn-warning"
                                    onclick="openEditModal('<?= $pda->idpda ?>', '<?= $pda->idarsp ?>', '<?= $pda->kat_arsp ?>', '<?= $pda->lok_penyimpanan ?>', '<?= $pda->tipe_box ?>')">
                                    Edit
                                </button> |
                                <button type="button" class="btn btn-danger" onclick="hapusPDA('<?= $pda->idpda ?>')">
                                    Hapus
                                </button> |
                                <button type="button" class="btn btn-tool"
                                    onclick="openDetailModal('<?= $pda->idarsp ?>', '<?= $pda->kat_arsp ?>', '<?= $pda->lok_penyimpanan ?>', '<?= $pda->tipe_box ?>')">
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
                <button type="button" class="btn btn-primary" onclick="openTambahModal()">
                    Tambah Penyimpanan Arsip
                </button>
            </div>
        </div>
    </section>
</div>

<!-- Form Tambah Penyimpanan Arsip -->
<div class="modal fade" id="modalTambahPDA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Penyimpanan Data Arsip </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahPDA">
                    <div class="form-group">
                        <label for="idpda"> ID Penyimpanan : </label>
                        <input type="text" id="idpda" name="idpda" required>
                    </div>
                    <div class="form-group">
                        <label for="idarsp"> ID Arsip : </label>
                        <select id="idarsp" name="idarsp" required onchange="setKategoriArsip(this)">
                            <option value=""> Pilih ID Arsip </option>
                            <?php foreach ($arsip as $arsp): ?>
                            <option value="<?= $arsp->idarsp ?>" data-kategori="<?= $arsp->kat_arsp ?>">
                                <?= $arsp->idarsp ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kat_arsp"> Kategori Arsip : </label>
                        <input type="text" id="kat_arsp" name="kat_arsp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="lok_penyimpanan"> Lokasi Penyimpanan : </label>
                        <select id="lok_penyimpanan" name="lok_penyimpanan" required>
                            <option value=""> Pilih Penyimpanan </option>
                            <option value="Gedung Baru"> Gedung Baru </option>
                            <option value="Gedung Lama"> Gedung Lama </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe_box"> Tipe Box : </label>
                        <select id="tipe_box" name="tipe_box" required>
                            <option value=""> Pilih Tipe </option>
                            <option value="Box I"> Box I </option>
                            <option value="Box II"> Box II </option>
                            <option value="Box III"> Box III </option>
                            <option value="Box IV"> Box IV </option>
                            <option value="Box V"> Box V </option>
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

<!-- Modal untuk Edit Penyimpanan Data Arsip -->
<div class="modal fade" id="modalEditPDA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Penyimpanan Data Arsip </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditPDA" method="POST">
                    <div class="form-group">
                        <input type="hidden" id="edit_idpda" name="idpda">
                    </div>
                    <div class="form-group">
                        <label for="edit_idarsp"> ID Arsip : </label>
                        <select id="edit_idarsp" name="idarsp" required onchange="setKategoriArsip(this)">
                            <option value=""> Pilih ID Arsip </option>
                            <?php foreach ($arsip as $arsp): ?>
                            <option value="<?= $arsp->idarsp ?>" data-kategori="<?= $arsp->kat_arsp ?>">
                                <?= $arsp->idarsp ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_kat_arsp"> Kategori Arsip : </label>
                        <input type="text" id="edit_kat_arsp" name="kat_arsp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_lok_penyimpanan"> Lokasi Penyimpanan : </label>
                        <select id="edit_lok_penyimpanan" name="lok_penyimpanan" required>
                            <option value=""> Pilih Penyimpanan </option>
                            <option value="Gedung Baru"> Gedung Baru </option>
                            <option value="Gedung Lama"> Gedung Lama </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_tipe_box"> Tipe Box : </label>
                        <select id="edit_tipe_box" name="tipe_box" required>
                            <option value=""> Pilih Tipe </option>
                            <option value="Box I"> Box I </option>
                            <option value="Box II"> Box II </option>
                            <option value="Box III"> Box III </option>
                            <option value="Box IV"> Box IV </option>
                            <option value="Box V"> Box V </option>
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

<!-- Modal untuk Hapus Penyimpanan Data Arsip -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Konfirmasi Hapus Data Penyimpanan Arsip </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data penyimpanan arsip ini?
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
                <h5 class="modal-title"> Detail Penyimpanan Data Arsip </h5>
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
    // Fungsi untuk membuka modal tambah data penyimpanan arsip
    function openTambahModal() {
        var modal = new bootstrap.Modal(document.getElementById('modalTambahPDA'));
        modal.show();
    }

    // Fungsi untuk menutup modal
    function closeModal(modalId) {
        var modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
        modal.hide();
    }

    // Fungsi untuk mengirim data tambah penyimpanan arsip ke backend
    document.getElementById("formTambahPDA").addEventListener("submit", function (event) {
        event.preventDefault();
        tambahPenyimpananDA();
    });

    document.getElementById("formEditPDA").addEventListener("submit", function (event) {
        event.preventDefault();
        editPDA();
    });

    // Fungsi untuk mengisi kategori arsip berdasarkan pilihan ID Arsip
    function setKategoriArsip(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const kategoriArsip = selectedOption.getAttribute('data-kategori');
        if (selectElement.id === 'idarsp') {
            document.getElementById('kat_arsp').value = kategoriArsip;
        } else {
            document.getElementById('edit_kat_arsp').value = kategoriArsip;
        }
    }

    function tambahPenyimpananDA() {
        var data = {
            idpda: document.getElementById("idpda").value,
            idarsp: document.getElementById("idarsp").value,
            lok_penyimpanan: document.getElementById("lok_penyimpanan").value,
            kat_arsp: document.getElementById("kat_arsp").value,
            tipe_box: document.getElementById("tipe_box").value
        };

        fetch('/PTPenyimpananArsip/tambahPDA', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('modalTambahPDA');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk membuka modal edit data penyimpanan arsip
    function openEditModal(idpda, idarsp, kat_arsp, lok_penyimpanan, tipe_box) {
        document.getElementById('edit_idpda').value = idpda;
        document.getElementById('edit_idarsp').value = idarsp;
        document.getElementById('edit_kat_arsp').value = kat_arsp;
        document.getElementById('edit_lok_penyimpanan').value = lok_penyimpanan;
        document.getElementById('edit_tipe_box').value = tipe_box;

        var modal = new bootstrap.Modal(document.getElementById('modalEditPDA'));
        modal.show();
    }

    function editPDA() {
        var data = {
            idpda: document.getElementById("edit_idpda").value,
            idarsp: document.getElementById("edit_idarsp").value,
            lok_penyimpanan: document.getElementById("edit_lok_penyimpanan").value,
            kat_arsp: document.getElementById("edit_kat_arsp").value,
            tipe_box: document.getElementById("edit_tipe_box").value
        };

        fetch('/PTPenyimpananArsip/editPDA/' + data.idpda, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('modalEditPDA');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
    // Fungsi untuk menghapus data penyimpanan arsip
    function hapusPDA(idpda) {
        var modal = new bootstrap.Modal(document.getElementById('hapusModal'));
        document.getElementById('hapusModal').setAttribute('data-idpda', idpda);
        modal.show();
    }

    function konfirmasiHapus() {
        var idpda = document.getElementById('hapusModal').getAttribute('data-idpda');

        fetch('/PTPenyimpananArsip/hapusPDA/' + idpda, {
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
    function openDetailModal(idarsp, kat_arsp, lok_penyimpanan, tipe_box) {
        var modal = new bootstrap.Modal(document.getElementById('modalDetailPDA'));
        var detailContent = document.getElementById('detailArsipContent');

        // Mengambil data arsip berdasarkan idarsp
        fetch('/ADPenyimpananArsip/detail/${idarsp}')
            .then(response => response.json())
            .then(data => {
                // Menyiapkan konten untuk ditampilkan dalam bentuk tabel
                var contentHTML = `
            <table>
                <tr><td><strong> ID Arsip : </strong></td><td> ${idarsp}</td></tr>
                <tr><td><strong> Kategori Arsip : </strong></td><td> ${kat_arsp}</td></tr>
                <tr><td><strong> Lokasi Penyimpanan : </strong></td><td> ${lok_penyimpanan}</td></tr>
                <tr><td><strong> Tipe Box : </strong></td><td> ${tipe_box}</td></tr>
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