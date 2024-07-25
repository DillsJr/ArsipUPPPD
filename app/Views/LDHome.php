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
                        <li class="breadcrumb-item"><a href="<?= base_url('Roles/pimpinan');?>"> Home </a></li>
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

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('Pages/Footer.php'); ?>