<?php

require_once "config.php";

session_start();

$ev_sahibi = $_SESSION["username"];
$oda_sayisi = $salon_sayisi = $fiyat = $banyo_sayisi = $bina_yasi = $kat = $m2 = $aciklama =  "";
$ev_sahibi_err = $oda_sayisi_err = $salon_sayisi_err = $fiyat_err = $banyo_sayisi_err = $bina_yasi_err = $kat_err = $m2_err = $aciklama_err = "";
if ($_SESSION["username"] == "admin") {
    echo "<script>alert('Admin ilan oluşturamaz.')</script>";
    header('location: ./car/offers2.php');

} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $input_ev_sahibi = trim($_POST["ev_sahibi"]);
    // if (empty($input_ev_sahibi)) {
    //     $ev_sahibi = "Lütfen isim giriniz.";
    // } 
    // else {
    //     $ev_sahibi = $input_ev_sahibi;
    // }

    // Oda sayısı doğrulama
    $input_oda_sayisi = trim($_POST["oda_sayisi"]);
    if (empty($input_oda_sayisi)) {
        $oda_sayisi_err = "Lütfen oda sayısı giriniz.";
    } else {
        $oda_sayisi = $input_oda_sayisi;
    }

    // Açıklama
    $input_aciklama = trim($_POST["aciklama"]);
    if (empty($input_aciklama)) {
        $aciklama_err = "Lütfen açıklama giriniz.";
    } else {
        $aciklama = $input_aciklama;
    }

    // Salon
    $input_salon_sayisi = trim($_POST["salon_sayisi"]);
    if (empty($input_salon_sayisi)) {
        $salon_sayisi_err = "Lütfen salon sayısı giriniz.";
    } else {
        $salon_sayisi = $input_salon_sayisi;
    }

    // fiyat
    $input_fiyat = trim($_POST["fiyat"]);
    if (empty($input_fiyat)) {
        $fiyat_err = "Lütfen salon sayısı giriniz.";
    } else {
        $fiyat = $input_fiyat;
    }

    //banyo
    $input_banyo_sayisi = trim($_POST["banyo_sayisi"]);
    if (empty($input_banyo_sayisi)) {
        $banyo_sayisi_err = "Lütfen banyo sayısı giriniz.";
    } else {
        $banyo_sayisi = $input_banyo_sayisi;
    }

    //yaş
    $input_bina_yasi = trim($_POST["bina_yasi"]);
    if (empty($input_bina_yasi)) {
        $bina_yasi_err = "Lütfen bina yaşı giriniz.";
    } else {
        $bina_yasi = $input_bina_yasi;
    }

    //kat
    $input_kat = trim($_POST["kat"]);
    if (empty($input_kat)) {
        $kat_err = "Lütfen katı giriniz.";
    } else {
        $kat = $input_kat;
    }

    //m2
    $input_m2 = trim($_POST["m2"]);
    if (empty($input_m2)) {
        $m2_err = "Lütfen evin m2 giriniz.";
    } else {
        $m2 = $input_m2;
    }


    if (
        empty($ev_sahibi_err) && empty($oda_sayisi_err) && empty($salon_sayisi_err) && empty($fiyat_err) && empty($banyo_sayisi_err)
        && empty($bina_yasi_err) && empty($kat_err) && empty($m2_err) && empty($aciklama)
    ) {
        $sql = "INSERT INTO ilanlar (ev_sahibi, aciklama, oda_sayisi, salon_sayisi, fiyat, banyo_sayisi, bina_yasi, kat, m2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($db, $sql)) {
            mysqli_stmt_bind_param(
                $stmt,
                "ssssssss",
                $param_ev_sahibi,
                $param_aciklama,
                $param_oda_sayisi,
                $param_salon_sayisi,
                $param_fiyat,
                $param_banyo_sayisi,
                $param_bina_yasi,
                $param_kat,
                $param_m2,
            );

            $param_ev_sahibi = $ev_sahibi;
            $param_aciklama = $aciklama;
            $param_oda_sayisi = $oda_sayisi;
            $param_salon_sayisi = $salon_sayisi;
            $param_fiyat = $fiyat;
            $param_banyo_sayisi = $banyo_sayisi;
            $param_bina_yasi = $bina_yasi;
            $param_kat = $kat;
            $param_m2 = $m2;

            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>İlan Oluştur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">İlan Oluştur</h2>
                    <p>Ev ilanı vermek için formu doldurunuz.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <!-- <div class="form-group">
                            <label>Ev Sahibi</label>
                            <input type="text" name="ev_sahibi" class="form-control <?php echo (!empty($ev_sahibi_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ev_sahibi; ?>">
                            <span class="invalid-feedback"><?php echo $ev_sahibi_err; ?></span>
                        </div> -->
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea name="aciklama" class="form-control <?php echo (!empty($aciklama_err)) ? 'is-invalid' : ''; ?>"><?php echo $aciklama; ?></textarea>
                            <span class="invalid-feedback"><?php echo $aciklama_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Oda Sayısı</label>
                            <textarea name="oda_sayisi" class="form-control <?php echo (!empty($oda_sayisi_err)) ? 'is-invalid' : ''; ?>"><?php echo $oda_sayisi; ?></textarea>
                            <span class="invalid-feedback"><?php echo $oda_sayisi_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Salon Sayısı</label>
                            <input type="text" name="salon_sayisi" class="form-control <?php echo (!empty($salon_sayisi_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salon_sayisi; ?>">
                            <span class="invalid-feedback"><?php echo $salon_sayisi_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Fiyat (Aylık)</label>
                            <input type="text" name="fiyat" class="form-control <?php echo (!empty($fiyat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fiyat; ?>">
                            <span class="invalid-feedback"><?php echo $fiyat_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Banyo Sayısı</label>
                            <textarea name="banyo_sayisi" class="form-control <?php echo (!empty($banyo_sayisi_err)) ? 'is-invalid' : ''; ?>"><?php echo $banyo_sayisi; ?></textarea>
                            <span class="invalid-feedback"><?php echo $banyo_sayisi_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Bina Yaşı</label>
                            <textarea name="bina_yasi" class="form-control <?php echo (!empty($bina_yasi_err)) ? 'is-invalid' : ''; ?>"><?php echo $bina_yasi; ?></textarea>
                            <span class="invalid-feedback"><?php echo $bina_yasi_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Kat</label>
                            <textarea name="kat" class="form-control <?php echo (!empty($kat_err)) ? 'is-invalid' : ''; ?>"><?php echo $kat; ?></textarea>
                            <span class="invalid-feedback"><?php echo $kat_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Ev kaç m2?</label>
                            <textarea name="m2" class="form-control <?php echo (!empty($m2_err)) ? 'is-invalid' : ''; ?>"><?php echo $m2; ?></textarea>
                            <span class="invalid-feedback"><?php echo $m2_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Ekle">
                        <a href="index.php" class="btn btn-secondary ml-2">İptal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>