<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-white elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <a href="<?= base_url('Roles/petugas');?>"><img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0D-XsTa-toWl5gn0zUIgS-YGlgafBuiZDtuBZeP_7ow&s"
                style="width:45;" class="w3-round">
            <span class="brand-text font-weight-light">
                <h4><b> UPPPD Pasar Minggu </b></h4>
            </span>
        </a>

        <style>
            .custom-navbar {
                height: 950px;
            }

            .custom-navbar .nav-link {
                display: flex;
                align-items: center;
                padding: 10px 15px;
            }

            .custom-navbar .nav-icon {
                margin-right: 10px;
            }

            .custom-navbar .nav-header {
                padding: 10px 15px;
                font-size: 1.2em;
                font-weight: bold;
            }
        </style>

        <!-- Sidebar -->
        <div class="sidebar custom-navbar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-header"> Officer </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Roles/petugas');?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Kelola Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('PTWajibPajak/index');?>" class="nav-link">
                                    <i class="fas fa-arrow-right nav-icon"></i>
                                    <p> Data Wajib Pajak </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('PTArsip/index');?>" class="nav-link">
                                    <i class="fas fa-arrow-right nav-icon"></i>
                                    <p> Data Arsip </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('PTPenyimpananArsip/index');?>" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Penyimpanan Data Arsip
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="confirmLogout(event)">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

        <!-- Tambahkan ini di bagian bawah halaman Anda atau di dalam tag <head> -->
        <script type="text/javascript">
            function confirmLogout(event) {
                event.preventDefault(); // Mencegah tindakan default dari link

                // Menampilkan konfirmasi logout
                if (confirm("Apakah Anda yakin ingin logout?")) {
                    // Jika pengguna mengkonfirmasi, arahkan ke URL logout
                    window.location.href = "<?= base_url('Auth/logout');?>";
                }
            }
        </script>

</aside>