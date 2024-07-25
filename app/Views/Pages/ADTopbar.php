<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <b> Sistem Pengarsipan Setoran Masa Pajak </b>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown user -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class='fas fa-user-circle' style='font-size:35px'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"> Administrator </span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" onclick="confirmLogout(event)">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

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