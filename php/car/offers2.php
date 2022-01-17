<!-- <?php
      session_start();
      if (!(isset($_SESSION["loggedin"])) && $_SESSION["loggedin"] === false) {
        header("location: ./offers.php");
        exit;
      }
      ?> -->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Ev Kiralamak Artık Çok Kolay</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-xs-12">
          <ul class="left-info">
            <li><a href="#"><i class="fa fa-envelope"></i>atarikaltunn@gmail.com</a></li>
            <li><a href="#"><i class="fa fa-phone"></i>0555 555 55 55</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="right-icons">
            <li><a href="#"><i class="fa fa-github"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <h2>Ev Kiralama<em></em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="offers.html">İlanlar</a>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["username"]; ?></a>
              <?php
              if ($_SESSION["username"] == "admin") {
                echo "
              <div class='dropdown-menu'>
                <a class='dropdown-item' href='../index.php'>Tüm İlanlar</a>
                <a class='dropdown-item' href='../logout.php'>Çıkış Yap</a>
              </div>";
              } else {
                echo "
              <div class='dropdown-menu'>
                <a class='dropdown-item' href='../create.php'>İlan Ver</a>
                <a class='dropdown-item' href='../index.php'>İlanlarım</a>
                <a class='dropdown-item' href='../logout.php'>Çıkış Yap</a>
              </div>";
              }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <?php require_once "../config.php";

  $sql = "SELECT * FROM ilanlar";
  $i = 0;

  if ($result = mysqli_query($db, $sql)) {
    $i = 0;
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $ilanlar[] = $row; // Inside while loop

      }
    }
  } ?>

  <!-- Page Content -->
  <div class="page-heading header-text">
  </div>

  <div class="services">
    <div class="container">
      <div class="row">
        <?php
        $j = 1;
        for ($i = 0; $i < count($ilanlar); $i++) {
          echo "<div class='col-md-4'>
                <div class='service-item'>
                  <img src='assets/images/ev" . $j . ".jpg' alt=''>
                    <div class='down-content'>
                      <h4>" . $ilanlar[$i]['oda_sayisi'] . "+" . $ilanlar[$i]['salon_sayisi'] . " " . $ilanlar[$i]['aciklama'] . "</h4>
                      <div style='margin-bottom:10px;'>
                        <span>Aylık Fiyat:
                          " . $ilanlar[$i]['fiyat'] . "<sup>₺</sup>
                        </span>
                      </div>
                      <a href='#' data-toggle='modal' data-target='#exampleModal" . $ilanlar[$i]['id'] . "' class='filled-button'>İlan Detayları</a>
                      </div>
                  </div>

                <br>
              </div>
            ";
          $j++;
        }
        ?>
      </div>

      <br>
      <br>

      <nav>
        <ul class="pagination pagination-lg justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">«</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">»</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>

      <br>
      <br>
      <br>
      <br>
    </div>
  </div>

  <!-- Footer Starts Here -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3 footer-item">
          <h4>House Rental Website</h4>
          <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien vitae.</p>
          <ul class="social-icons">
            <li><a rel="nofollow" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item">
          <h4>Useful Links</h4>
          <ul class="menu-list">
            <li><a href="#">Vivamus ut tellus mi</a></li>
            <li><a href="#">Nulla nec cursus elit</a></li>
            <li><a href="#">Vulputate sed nec</a></li>
            <li><a href="#">Cursus augue hasellus</a></li>
            <li><a href="#">Lacinia ac sapien</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item">
          <h4>Additional Pages</h4>
          <ul class="menu-list">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Terms</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item last-item">
          <h4>Contact Us</h4>
          <div class="contact-form">
            <form id="contact footer-contact" action="" method="post">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Modal -->
  <?php
  for ($i = 0; $i < count($ilanlar); $i++) {

    echo "<div class='modal fade' id='exampleModal". $ilanlar[$i]['id'] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' style='margin-top: 70px;'>
    <div class='modal-dialog modal-lg' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>İlan Detayları</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
          <form action='#' id='contact'>

          <b>" . $ilanlar[$i]['aciklama'] . "

            <div class='form-group'>
              <fieldset>
                <b>İlan Sahibi: " . $ilanlar[$i]['ev_sahibi'] . "
              </fieldset>
            </div>
            
            <div class='col-md-6'>
            <div class='form-group'>
              <fieldset>
                <b>Fiyat: " . $ilanlar[$i]['fiyat'] . "
              </fieldset>
            </div>
          </div>

            <div class='col-md-6'>
              <div class='form-group'>
                <fieldset>
                  <b>m²: " . $ilanlar[$i]['m2'] . "
                </fieldset>
              </div>
            </div>

            <div class='col-md-6'>
              <div class='form-group'>
                <fieldset>
                  <b>Oda Sayısı: " . $ilanlar[$i]['oda_sayisi'] . "+" . $ilanlar[$i]['salon_sayisi'] . "
                </fieldset>
              </div>
            </div>

            <div class='col-md-6'>
              <div class='form-group'>
                <fieldset>
                  <b>Banyo Sayısı: " . $ilanlar[$i]['banyo_sayisi'] . "
                </fieldset>
              </div>
            </div>

            <div class='col-md-6'>
              <div class='form-group'>
                <fieldset>
                  <b>Bina Yaşı: " . $ilanlar[$i]['bina_yasi'] . "
                </fieldset>
              </div>
            </div>

            <div class='col-md-6'>
              <div class='form-group'>
                <fieldset>
                  <b>Kat: " . $ilanlar[$i]['kat'] . "
                </fieldset>
              </div>
            </div>

            <div class='col-md-6'>
              <div class='form-group'>
                <fieldset>
                  <b>İlan Tarihi: " . $ilanlar[$i]['ilan_tarihi'] . "
                </fieldset>
              </div>
            </div>

          </form>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Geri</button>
        </div>
      </div>
    </div>
  </div>";
  }
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/accordions.js"></script>

  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>