<!DOCTYPE html>
<html>

<head>
  <title> UPPPD Pasar Minggu </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/AHstyle.css') ?>">
  <script src="<?= base_url('js/AH.js') ?>"></script>

</head>

<body class="w3-light-grey w3-content" style="max-width:2600px">
  <div class="container">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
      <div class="w3-container">
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
          title="close menu">
          <i class="fa fa-remove"></i>
        </a>
        <a href="<?= site_url('Roles/admin');?>"><img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0D-XsTa-toWl5gn0zUIgS-YGlgafBuiZDtuBZeP_7ow&s"
            style="width:45%;" class="w3-round"><br><br>
          <h4><b> UPPPD Pasar Minggu </b></h4>
      </div>
      <div class="w3-bar-block">
        <a href="#About" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
            class="fa fa-users fa-fw w3-margin-right"></i> Tentang Kami </a>
        <a href="#KelolaData" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
            class="fa fa-user fa-fw w3-margin-right"></i> Kelola Data </a>
        <a href="#Laporan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
            class="fa fa-folder fa-fw w3-margin-right"></i> Laporan </a>
        <a href="#Kontak" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
            class="fa fa-comments fa-fw w3-margin-right"></i> Kontak </a>
      </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
      title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px">

      <!-- Header -->
      <header id="Header">
        <div class="header-container">
          <div class="title w3-section w3-padding-5" style="text-align: center;">
            <h2><b> Aplikasi Pengarsipan Setoran Masa Pajak </b></h2>
          </div>
          <div class="user-image-container w3-bottombar w3-padding-5" style="text-align: center;">
            <a href="#">
              <img src="https://i.pinimg.com/564x/cd/06/9a/cd069a94bd0484f2a1b13653194ff870.jpg"
                class="w3-hover-opacity logout-image w3-circle w3-right w3-hover-opacity">
            </a>
            <span class="w3-button w3-xxlarge w3-hover-text-grey w3-hide-large" onclick="w3_open()">
              <i class="fa fa-bars"></i>
            </span>
          </div>
        </div>
      </header>

      <!-- Form Logout -->
      <div class="logout-form" id="logoutForm">
        <form>
          <p> Yakin Ingin Logout? </p>
          <button type="button" onclick="logout()"> Logout </button>
        </form>
      </div>

      <div id="About" class="w3-container w3-padding-large" style="margin-bottom:32px">
        <div style="margin-bottom:32px">
          <h4 class="h3" style="text-align: center;"><b> Tentang Kami </b></h4>
          <div class="w3-row-padding">
            <p><b>
                “Jakarta kota maju, lestari dan berbudaya yang warganya terlibat dalam
                mewujudkan keberadaban, keadilan dan kesejahteraan bagi semua”
              </b></p>
            <p>
              Misi:<br>
              1. Menciptakan keamanan, kesehatan, kecerdasan, dan budaya yang kuat. Memperkuat nilai-nilai keluarga dan
              memberi ruang untuk kreativitas melalui kepemimpinan yang inklusif.<br>
              2. Meningkatkan kesejahteraan umum dengan menciptakan lapangan kerja, kestabilan, dan aksesibilitas
              kebutuhan
              pokok. Memperkuat keadilan sosial, mempercepat pembangunan infrastruktur, memudahkan investasi, dan
              meningkatkan
              tata ruang.<br>
              3. Memastikan pelayanan publik yang efektif, meritokratis, dan berintegritas. Mengatasi berbagai masalah
              kota
              dan warga.<br>
              4. Memperkuat keberlanjutan lingkungan dan sosial.<br>
              5. Memajukan Jakarta sebagai ibukota dinamis yang mencerminkan keadilan, kebangsaan, dan keberagaman
              Indonesia.<br>
            </p>
          </div>
        </div>
        <hr>
      </div>

      <div id="KelolaData" class="w3-container w3-padding-large" style="margin-bottom:32px">
        <div style="margin-bottom:32px">
          <h3 class="h3" style="text-align: center"><b> Kelola Data </b></h3>
          <!-- First Photo Grid-->
          <div class="w3-row-padding">
            <div class="w3-third w3-container w3-margin-bottom card" style="width: 35rem">
              <a href="<?= base_url('WajibPajak/index');?>">
                <img src="https://pajakonline.jakarta.go.id/assets/transaction.jpg" alt="Norway" style="width:100%"
                  class="w3-hover-opacity">
                <div class="w3-container w3-white">
                  <p><b> Data Wajib Pajak </b></p>
                  <p> Kelola Data Wajib Pajak adalah sistem untuk mempermudah proses pengarsipan </p>
                </div>
              </a>
            </div>
            <div class="w3-third w3-container w3-margin-bottom card" style="width: 30rem">
              <a href="<?= base_url('Arsip/index');?>">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy3-lG0494Fsbj3wsVTuPnIk_I60ztAw_Lpw&s"
                  alt="Norway" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                  <p><b> Data Arsip </b></p>
                  <p> Kelola Data Arsip adalah sistem untuk pengarsipan laporan setoran masa pajak </p>
                </div>
              </a>
            </div>
            <div class="w3-third w3-container w3-margin-bottom  card" style="width: 35rem">
              <a href="<?= base_url('Petugas/index');?>">
                <img src="https://pajakonline.jakarta.go.id/assets/transaction.jpg" alt="Norway" style="width:100%"
                  class="w3-hover-opacity">
                <div class="w3-container w3-white">
                  <p><b> Data Petugas </b></p>
                  <p> Kelola Data Petugas adalah sistem untuk mendata para petugas yang bertugas </p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div>
        <!-- Footer -->
        <footer id="Kontak" class="w3-container w3-padding-32 w3-black">
          <div class="w3-row-padding">
            <div class="w3-third">
              <img
                src="data:image/png;base64,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"
                style="width:100%;" class="w3-round">
            </div>

            <div class="w3-third">
              <h3> © Badan Pendapatan Daerah </h3>
              <ul class="w3-ul">
                <li class="w3-padding-16">
                  <span class="w3-large">UPPPD Pasar Minggu</span><br>
                  <span>( Unit Pelayanan Pemungutan Pajak Daerah )</span>
                </li>
                <li class="w3-padding-16">
                  <span class="w3-large"> upppd.pasarminggu@jakarta.go.id </span><br>
                  <span> 088975615484 </span>
                </li>
              </ul>
            </div>

            <div class="w3-third">
              <h3> Social Media </h3>
              <div class="w3-panel w3-large">
                <i class="fa fa-instagram w3-hover-opacity"></i> |
                <i class="fa fa-twitter w3-hover-opacity"></i> |
                <i class="fa fa-linkedin w3-hover-opacity"></i>
              </div>
            </div>

          </div>
        </footer>

        <div class="w3-black w3-center w3-padding-24 w3-dark-grey"> Create by <a href="https://github.com/DillsJr"
            title="W3.CSS" target="_blank" class="w3-hover-opacity"> Dillah </a></div>
        <!-- End page content -->
      </div>
    </div>
  </div>

</body>

</html>