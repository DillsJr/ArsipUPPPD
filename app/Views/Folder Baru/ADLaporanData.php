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
                    <h1> Laporan </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('ADLaporan/index');?>"> Laporan </a></li>
                        <li class="breadcrumb-item active"> Data Laporan </li>
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
                <h3 class="card-title"><b> Laporan </b></h3>
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
                            <th data-column="isi_lprn"> Isi Laporan <span class="sort-indicator"></span></th>
                            <th data-column="idarsp"> ID Arsip <span class="sort-indicator"></span></th>
                            <th data-column="judul_arsp"> Judul Arsip <span class="sort-indicator"></span></th>
                            <th data-column="nama_ptgs"> Nama Petugas <span class="sort-indicator"></span></th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + ($currentPage - 1) * $limit; foreach ($laporan as $lprn): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $lprn->isi_lprn ?></td>
                            <td><?= $lprn->idarsp ?></td>
                            <td><?= $lprn->judul_arsp ?></td>
                            <td><?= $lprn->nama_ptgs ?></td>
                            <td>
                                <button type="button" class="btn btn-tool"
                                    onclick="openDetailModal('<?= $lprn->isi_lprn ?>', '<?= $lprn->idarsp ?>', '<?= $lprn->judul_arsp ?>', '<?= $lprn->idptgs ?>', '<?= $lprn->nama_ptgs ?>')">
                                    Detail...
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
                <button type="button" class="btn btn-outline-secondary" onclick="downloadPDF()"> Unduh PDF </button> |
                <button type="button" class="btn btn-outline-secondary" onclick="downloadExcel()"> Unduh Excel </button>
            </div>
        </div>
    </section>
</div>

<!-- Form Tambah Laporan -->
<div class="modal fade" id="modalTambahLap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Tambah Laporan </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahLap">
                    <div class="form-group">
                        <label for="idlprn"> ID Laporan : </label>
                        <input type="text" id="idlprn" name="idlprn" required>
                    </div>
                    <div class="form-group">
                        <label for="isi_lprn"> Isi Laporan : </label>
                        <select id="isi_lprn" name="isi_lprn" required>
                            <option value=""> Pilih Isi Laporan </option>
                            <option value="Laporan Setoran Masa Pajak"> Laporan Setoran Masa Pajak </option>
                            <option value="Laporan PBB"> Laporan PBB </option>
                            <option value="Laporan Reklame"> Laporan Reklame </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idarsp"> ID Arsip : </label>
                        <select id="idarsp" name="idarsp" required onchange="setJudulArsip(this)">
                            <option value=""> Pilih ID Arsip </option>
                            <?php foreach ($arsip as $arsp): ?>
                            <option value="<?= $arsp->idarsp ?>" data-judul="<?= $arsp->judul_arsp ?>">
                                <?= $arsp->idarsp ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul_arsp"> Judul Arsip : </label>
                        <input type="text" id="judul_arsp" name="judul_arsp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="idptgs"> ID Petugas : </label>
                        <select id="idptgs" name="idptgs" required onchange="setPetugas(this)">
                            <option value=""> Pilih ID Petugas </option>
                            <?php foreach ($petugas as $ptgs): ?>
                            <option value="<?= $ptgs->idptgs ?>" data-petugas="<?= $ptgs->nama_ptgs ?>">
                                <?= $ptgs->idptgs ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_ptgs"> Nama Petugas : </label>
                        <input type="text" id="nama_ptgs" name="nama_ptgs" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Laporan -->
<div class="modal fade" id="modalEditLap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Data Arsip </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditLap" method="POST">
                    <div class="form-group">
                        <input type="hidden" id="edit_idlprn" name="idlprn">
                    </div>
                    <div class="form-group">
                        <label for="edit_isi_lprn"> Isi Laporan : </label>
                        <select id="edit_isi_lprn" name="isi_lprn" required>
                            <option value=""> Pilih Isi Laporan </option>
                            <option value="Laporan Setoran Masa Pajak"> Laporan Setoran Masa Pajak </option>
                            <option value="Laporan PBB"> Laporan PBB </option>
                            <option value="Laporan Reklame"> Laporan Reklame </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_idarsp"> ID Arsip : </label>
                        <select id="edit_idarsp" name="idarsp" required onchange="setJudulArsip(this)">
                            <option value=""> Pilih ID Arsip </option>
                            <?php foreach ($arsip as $arsp): ?>
                            <option value="<?= $arsp->idarsp ?>" data-judul="<?= $arsp->judul_arsp ?>">
                                <?= $arsp->idarsp ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_judul_arsp"> Judul Arsip : </label>
                        <input type="text" id="edit_judul_arsp" name="judul_arsp" readonly>
                    </div>
                    <div class="form-group">
                        <label for="edit_idptgs"> ID Petugas : </label>
                        <select id="edit_idptgs" name="idptgs" required onchange="setPetugas(this)">
                            <option value=""> Pilih ID Petugas </option>
                            <?php foreach ($petugas as $ptgs): ?>
                            <option value="<?= $ptgs->idptgs ?>" data-petugas=" <?= $ptgs->nama_ptgs ?>">
                                <?= $ptgs->idptgs ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_nama_ptgs"> Nama Petugas : </label>
                        <input type="text" id="edit_nama_ptgs" name="nama_ptgs" readonly>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="button btn-primary"> Simpan </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Hapus Laporan -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Konfirmasi Hapus Data Laporan </h5>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data laporan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="konfirmasiHapus()"> Hapus </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Detail Laporan -->
<div class="modal fade" id="modalDetailLap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Detail Data Laporan </h5>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.22/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script>

<script>
    // Fungsi untuk membuka modal tambah data laporan
    function openTambahModal() {
        var modal = new bootstrap.Modal(document.getElementById('modalTambahLap'));
        modal.show();
    }

    // Fungsi untuk menutup modal
    function closeModal(modalId) {
        var modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
        modal.hide();
    }

    // Fungsi untuk mengirim data tambah laporan ke backend
    document.getElementById("formTambahLap").addEventListener("submit", function (event) {
        event.preventDefault();
        tambahLaporan();
    });

    document.getElementById("formEditLap").addEventListener("submit", function (event) {
        event.preventDefault();
        editLap();
    });

    // Fungsi untuk mengisi judul arsip berdasarkan pilihan ID Arsip
    function setJudulArsip(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const judulArsip = selectedOption.getAttribute('data-judul');
        if (selectElement.id === 'idarsp') {
            document.getElementById('judul_arsp').value = judulArsip;
        } else {
            document.getElementById('edit_judul_arsp').value = judulArsip;
        }
    }

    // Fungsi untuk mengisi nama petugas berdasarkan pilihan ID Petugas
    function setPetugas(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const namaPetugas = selectedOption.getAttribute('data-petugas');
        if (selectElement.id === 'idptgs') {
            document.getElementById('nama_ptgs').value = namaPetugas;
        } else {
            document.getElementById('edit_nama_ptgs').value = namaPetugas;
        }
    }

    function tambahLaporan() {
        var data = {
            idlprn: document.getElementById("idlprn").value,
            isi_lprn: document.getElementById("isi_lprn").value,
            idarsp: document.getElementById("idarsp").value,
            judul_arsp: document.getElementById("judul_arsp").value,
            idptgs: document.getElementById("idptgs").value,
            nama_ptgs: document.getElementById("nama_ptgs").value
        };

        fetch('/ADLaporan/tambahLap', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('modalTambahLap');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Fungsi untuk membuka modal edit data laporan
    function openEditModal(idlprn, isi_lprn, idarsp, judul_arsp, idptgs, nama_ptgs) {
        document.getElementById('edit_idlprn').value = idlprn;
        document.getElementById('edit_isi_lprn').value = isi_lprn;
        document.getElementById('edit_idarsp').value = idarsp;
        document.getElementById('edit_judul_arsp').value = judul_arsp;
        document.getElementById('edit_idptgs').value = idptgs;
        document.getElementById('edit_nama_ptgs').value = nama_ptgs;

        const modal = new bootstrap.Modal(document.getElementById('modalEditLap'));
        modal.show();
    }

    function editLap() {
        var data = {
            idlprn: document.getElementById("edit_idlprn").value,
            isi_lprn: document.getElementById("edit_isi_lprn").value,
            idarsp: document.getElementById("edit_idarsp").value,
            judul_arsp: document.getElementById("edit_judul_arsp").value,
            idptgs: document.getElementById("edit_idptgs").value,
            nama_ptgs: document.getElementById("edit_nama_ptgs").value
        };

        fetch('/ADLaporan/editLap/' + data.idlprn, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal('modalEditLap');
                location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
    // Fungsi untuk menghapus data laporan
    function hapusLap(idlprn) {
        var modal = new bootstrap.Modal(document.getElementById('hapusModal'));
        document.getElementById('hapusModal').setAttribute('data-idlprn', idlprn);
        modal.show();
    }

    function konfirmasiHapus() {
        var idlprn = document.getElementById('hapusModal').getAttribute('data-idlprn');

        fetch('/ADLaporan/hapusLap/' + idlprn, {
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

    // Fungsi untuk membuka modal detail data laporan
    function openDetailModal(isi_lprn, idarsp, judul_arsp, idptgs, nama_ptgs) {
        var modal = new bootstrap.Modal(document.getElementById('modalDetailLap'));
        var detailContent = document.getElementById('detailArsipContent');

        // Mengambil data arsip berdasarkan idarsp
        fetch(`/ADLaporan/detail/${idlprn}`)
            .then(response => response.json())
            .then(data => {
                // Menyiapkan konten untuk ditampilkan
                var contentHTML = `
                <p><strong> Isi Laporan : </strong> ${isi_lprn}</p>
                <p><strong> ID Arsip : </strong> ${idarsp}</p>
                <p><strong> Judul Arsip : </strong> ${judul_arsp}</p>
                <p><strong> ID Petugas : </strong> ${idptgs}</p>
                <p><strong> Nama Petugas : </strong> ${nama_ptgs}</p>
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

    function downloadPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        let y = 10;
        doc.setFontSize(14);
        doc.text("Laporan Data", 10, y);
        y += 10;

        const headers = ["No", "ID Laporan", "Isi Laporan", "ID Arsip", "Judul Arsip", "Nama Petugas"];
        const data = [];
        const table = document.querySelector("table tbody").children;
        for (let i = 0; i < table.length; i++) {
            const row = table[i].children;
            const rowData = [];
            for (let j = 0; j < row.length - 1; j++) { // Minus 1 to exclude action buttons
                rowData.push(row[j].innerText);
            }
            data.push(rowData);
        }

        doc.autoTable({
            head: [headers],
            body: data,
            startY: y,
        });

        doc.save("LaporanData.pdf");
    }


    function downloadExcel() {
        const table = document.querySelector("table");
        const wb = XLSX.utils.table_to_book(table, {
            sheet: "Sheet 1"
        });
        XLSX.writeFile(wb, "LaporanData.xlsx");
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