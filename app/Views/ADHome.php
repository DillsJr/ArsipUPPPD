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
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Homepage </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Roles/admin');?>"> Home </a></li>
                        <li class="breadcrumb-item active"> Homepage </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> Tentang Kami </b></h3>
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
                <p><b>
                        “Jakarta kota maju, lestari dan berbudaya yang warganya terlibat dalam
                        mewujudkan keberadaban, keadilan dan kesejahteraan bagi semua”.
                    </b>
                </p>
                <p>
                    Misi:<br>
                    1. Menciptakan keamanan, kesehatan, kecerdasan, dan budaya yang kuat. Memperkuat nilai-nilai
                    keluarga dan
                    memberi ruang untuk kreativitas melalui kepemimpinan yang inklusif.<br>
                    2. Meningkatkan kesejahteraan umum dengan menciptakan lapangan kerja, kestabilan, dan aksesibilitas
                    kebutuhan
                    pokok. Memperkuat keadilan sosial, mempercepat pembangunan infrastruktur, memudahkan investasi, dan
                    meningkatkan
                    tata ruang.<br>
                    3. Memastikan pelayanan publik yang efektif, meritokratis, dan berintegritas. Mengatasi berbagai
                    masalah kota
                    dan warga.<br>
                    4. Memperkuat keberlanjutan lingkungan dan sosial.<br>
                    5. Memajukan Jakarta sebagai ibukota dinamis yang mencerminkan keadilan, kebangsaan, dan keberagaman
                    Indonesia.<br>
                </p>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                ...
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b> Kelola Data </b></h3>
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
                <!-- First Photo Grid-->
                <div class="photo-grid">
                    <div class="photo-item">
                        <a href="<?= base_url('ADWajibPajak/index');?>">
                            <img src="https://pajakonline.jakarta.go.id/assets/transaction.jpg" alt="Norway"
                                class="w3-hover-opacity">
                            <div class="w3-container w3-white">
                                <p><b> Data Wajib Pajak </b></p>
                                <p> Kelola Data Wajib Pajak adalah sistem untuk mempermudah proses pengarsipan </p>
                            </div>
                        </a>
                    </div>
                    <div class="photo-item">
                        <a href="<?= base_url('ADArsip/index');?>">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy3-lG0494Fsbj3wsVTuPnIk_I60ztAw_Lpw&s"
                                alt="Norway" class="w3-hover-opacity">
                            <div class="w3-container w3-white">
                                <p><b> Data Arsip </b></p>
                                <p> Kelola Data Arsip adalah sistem untuk pengarsipan laporan setoran masa pajak </p>
                            </div>
                        </a>
                    </div>
                    <div class="photo-item">
                        <a href="<?= base_url('ADPetugas/index');?>">
                            <img src="https://pajakonline.jakarta.go.id/assets/transaction.jpg" alt="Norway"
                                class="w3-hover-opacity">
                            <div class="w3-container w3-white">
                                <p><b> Data Petugas </b></p>
                                <p> Kelola Data Petugas adalah sistem untuk mendata para petugas yang bertugas </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                ...
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('Pages/Footer.php'); ?>