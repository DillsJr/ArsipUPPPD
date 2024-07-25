<?php include('Pages/LDHeader.php'); ?>
<?php include('Pages/LDTopbar.php'); ?>
<?php include('Pages/LDSidebar.php'); ?>

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

    .pdf-viewer {
        width: 100%;
        height: 650px;
        border: none;
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
                        <li class="breadcrumb-item"><a href="<?= base_url('LDLaporan/index');?>"> Laporan </a></li>
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
                            <th data-column="idarsp"> ID Arsip <span class="sort-indicator"></span></th>
                            <th data-column="judul_arsp"> Judul Arsip <span class="sort-indicator"></span></th>
                            <th data-column="kat_arsp"> Kategori Arsip <span class="sort-indicator"></span></th>
                            <th data-column="nama_wajib_pajak"> Nama Wajib Pajak <span class="sort-indicator"></span>
                            </th>
                            <th data-column="npwp"> NPWP <span class="sort-indicator"></span></th>
                            <th data-column="nopd"> NOPD <span class="sort-indicator"></span></th>
                            <th data-column="email"> Email <span class="sort-indicator"></span></th>
                            <th data-column="alamat"> Alamat <span class="sort-indicator"></span></th>
                            <th data-column="nama_petugas"> Nama Petugas <span class="sort-indicator"></span></th>
                            <th data-column="jabatan"> Jabatan <span class="sort-indicator"></span></th>
                            <th data-column="tgl_pembuatan"> Tanggal Pembuatan <span class="sort-indicator"></span></th>
                            <th data-column="lok_peyimpanan"> Lokasi Penyimpanan <span class="sort-indicator"></span>
                            </th>
                            <th data-column="tipe_box"> Tipe Box <span class="sort-indicator"></span></th>
                            <th data-column="status_arsp"> Status Arsip <span class="sort-indicator"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + ($currentPage - 1) * $limit; foreach ($laporan_arsip as $lprn): ?>
                        <tr onclick="displayPDF(this)">
                            <td><?= $no++ ?></td>
                            <td><?= $lprn->idarsp ?></td>
                            <td><?= $lprn->judul_arsp ?></td>
                            <td><?= $lprn->kat_arsp ?></td>
                            <td><?= $lprn->nama_wajib_pajak ?></td>
                            <td><?= $lprn->npwp ?></td>
                            <td><?= $lprn->nopd ?></td>
                            <td><?= $lprn->email ?></td>
                            <td><?= $lprn->alamat ?></td>
                            <td><?= $lprn->nama_petugas ?></td>
                            <td><?= $lprn->jabatan ?></td>
                            <td><?= $lprn->tgl_pembuatan ?></td>
                            <td><?= $lprn->lok_penyimpanan ?></td>
                            <td><?= $lprn->tipe_box ?></td>
                            <td><?= $lprn->status_arsp ?></td>
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

        <!-- PDF Viewer Modal -->
        <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pdfModalLabel"> Detail Laporan </h5>
                        <button type="button" class="btn btn-tool" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="pdfViewer" class="pdf-viewer"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

    function downloadPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF({
            orientation: 'landscape'
        });

        let y = 10;
        doc.setFontSize(10); // Reduce font size to fit more content
        doc.text("Laporan Data Arsip", 10, y);
        y += 10;

        const headers = ["ID Arsip", "Judul Arsip", "Kategori Arsip", "Nama Wajib Pajak", "NPWP", "NOPD", "Email",
            "Alamat", "Nama Petugas", "Jabatan", "Tanggal Pembuatan", "Lokasi Penyimpanan", "Tipe Box",
            "Status Arsip"
        ];
        const data = [];
        const table = document.querySelector("table");
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const rowData = [];
            const cells = row.querySelectorAll('td');
            cells.forEach((cell, index) => {
                if (index === 0) {
                    return; // Skip the first column (No column)
                }
                rowData.push(cell.innerText);
            });
            data.push(rowData);
        });

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

    function displayPDF(row) {
        const cells = row.querySelectorAll('td');
        const pdfData = {
            " ID Arsip                        ": cells[1].innerText,
            " Judul Arsip                   ": cells[2].innerText,
            " Kategori Arsip              ": cells[3].innerText,
            " Nama Wajib Pajak       ": cells[4].innerText,
            " NPWP                          ": cells[5].innerText,
            " NOPD                          ": cells[6].innerText,
            " Email                           ": cells[7].innerText,
            " Alamat                         ": cells[8].innerText,
            " Nama Petugas            ": cells[9].innerText,
            " Jabatan                       ": cells[10].innerText,
            " Tanggal Pembuatan   ": cells[11].innerText,
            " Lokasi Penyimpanan  ": cells[12].innerText,
            " Tipe Box                     ": cells[13].innerText,
            " Status Arsip                ": cells[14].innerText
        };

        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF({
            orientation: 'portrait'
        });

        doc.setFontSize(15);
        doc.text("Detail Arsip", 10, 10);
        doc.setFontSize(10);

        let y = 20;
        for (const key in pdfData) {
            doc.text(`${key}: ${pdfData[key]}`, 10, y);
            y += 10;
        }

        const pdfOutput = doc.output('datauristring');
        document.getElementById('pdfViewer').src = pdfOutput;

        var modal = new bootstrap.Modal(document.getElementById('pdfModal'));
        modal.show();
    }


    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('data-table');
        const headers = table.querySelectorAll('th[data-column]');
        const rows = Array.from(table.querySelectorAll('tbody tr'));

        headers.forEach((header, index) => {
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
                    const cellA = a.querySelector(`td:nth-child(${index + 1})`)
                        .innerText.toLowerCase();
                    const cellB = b.querySelector(`td:nth-child(${index + 1})`)
                        .innerText.toLowerCase();

                    if (cellA < cellB) return sortOrder === 'asc' ? -1 : 1;
                    if (cellA > cellB) return sortOrder === 'asc' ? 1 : -1;
                    return 0;
                });

                const tbody = table.querySelector('tbody');
                rows.forEach(row => tbody.appendChild(row));
            });
        });
    });
</script>