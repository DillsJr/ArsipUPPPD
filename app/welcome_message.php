<!DOCTYPE html>
<html>

<head>
  <title> UPPPD Pasar Minggu </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Raleway", sans-serif
    }
  </style>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container">
      <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
        title="close menu">
        <i class="fa fa-remove"></i>
      </a>
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0D-XsTa-toWl5gn0zUIgS-YGlgafBuiZDtuBZeP_7ow&s"
        style="width:45%;" class="w3-round"><br><br>
      <h4><b> UPPPD Pasar Minggu </b></h4>
    </div>
    <div class="w3-bar-block">
      <a href="#About" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i
          class="fa fa-th-large fa-fw w3-margin-right"></i> Tentang Kami </a>
      <a href="#InfoPelayanan" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
          class="fa fa-user fa-fw w3-margin-right"></i> Informasi Pelayanan </a>
      <a href="#Kontak" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
          class="fa fa-envelope fa-fw w3-margin-right"></i> Kontak </a>
    </div>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
    title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px">

    <!-- Header -->
    <header id="Header">
      <a href="#"><img src="https://i.pinimg.com/564x/cd/06/9a/cd069a94bd0484f2a1b13653194ff870.jpg" style="width:65px;"
          class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity w3-padding-15"></a>
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i
          class="fa fa-bars"></i></span>
      <div class="w3-container" style="text-align: center;">
        <h1><b>~ WELCOME TO ~</b></h1>
        <div class="w3-section w3-bottombar w3-padding-15">
          <h2><b>Aplikasi Pengarsipan Setoran Masa Pajak</b></h2>
        </div>
      </div>
    </header>

    <div id="About" class="w3-container w3-padding-large" style="margin-bottom:32px">
      <h4><b> About Me </b></h4>
      <p><b>
          “Jakarta kota maju, lestari dan berbudaya yang warganya terlibat dalam
          mewujudkan keberadaban, keadilan dan kesejahteraan bagi semua”.
        </b></p>
      <p>
        Misi:<br>
        1. Menciptakan keamanan, kesehatan, kecerdasan, dan budaya yang kuat. Memperkuat nilai-nilai keluarga dan
        memberi ruang untuk kreativitas melalui kepemimpinan yang inklusif.<br>
        2. Meningkatkan kesejahteraan umum dengan menciptakan lapangan kerja, kestabilan, dan aksesibilitas kebutuhan
        pokok. Memperkuat keadilan sosial, mempercepat pembangunan infrastruktur, memudahkan investasi, dan meningkatkan
        tata ruang.<br>
        3. Memastikan pelayanan publik yang efektif, meritokratis, dan berintegritas. Mengatasi berbagai masalah kota
        dan warga.<br>
        4. Memperkuat keberlanjutan lingkungan dan sosial.<br>
        5. Memajukan Jakarta sebagai ibukota dinamis yang mencerminkan keadilan, kebangsaan, dan keberagaman
        Indonesia.<br>
      </p>
      <hr>

      <div style="margin-bottom:32px">
        <h3 id="InfoPelayanan" style="text-align: center"><b> Informasi Pelayanan </b></h3>
        <!-- First Photo Grid-->
        <div class="w3-row-padding">
          <div class="w3-third w3-container w3-margin-bottom">
            <a href="PelayananPajak.php">
              <img src="https://pajakonline.jakarta.go.id/assets/transaction.jpg" alt="Norway" style="width:100%"
                class="w3-hover-opacity">
              <div class="w3-container w3-white">
                <p><b>Pelaporan Pajak</b></p>
                <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies
                  congue gravida diam non fringilla.</p>
              </div>
          </div>
          <div class="w3-third w3-container w3-margin-bottom">
            <a href="link_to_your_page">
              <img
                src="data:image/png;base64,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"
                alt="Norway" style="width:100%" class="w3-hover-opacity">
              <div class="w3-container w3-white">
                <p><b>Pembayaran Pajak</b></p>
                <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies
                  congue gravida diam non fringilla.</p>
              </div>
          </div>
          <div class="w3-third w3-container">
            <a href="link_to_your_page">
              <img src="https://pajakonline.jakarta.go.id/assets/transaction.jpg" alt="Norway" style="width:100%"
                class="w3-hover-opacity">
              <div class="w3-container w3-white">
                <p><b>Laporan</b></p>
                <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies
                  congue gravida diam non fringilla.</p>
              </div>
          </div>
        </div>
      </div>
    </div>

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
          <ul class="w3-ul w3-hoverable">
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

    <div class="w3-black w3-center w3-padding-24"> Create by <a href="https://github.com/DillsJr" title="W3.CSS"
        target="_blank" class="w3-hover-opacity"> Dillah </a></div>

    <!-- End page content -->
  </div>

  <script>
    // Script to open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }
  </script>

</body>