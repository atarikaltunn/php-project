<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "config.php";
    
    $sql = "SELECT * FROM ilanlar WHERE id = ?";
    
    if($stmt = mysqli_prepare($db, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                $ev_sahibi = $row["ev_sahibi"];
                $oda_sayisi = $row["oda_sayisi"];
                $salon_sayisi = $row["salon_sayisi"];
                $fiyat = $row["fiyat"];
                $banyo_sayisi = $row["banyo_sayisi"];
                $bina_yasi = $row["bina_yasi"];
                $kat = $row["kat"];
                $m2 = $row["m2"];
            } else{
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    mysqli_stmt_close($stmt);
    
    mysqli_close($db);
} else{
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>İlanı Görüntüle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
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
                    <h1 class="mt-5 mb-3">İlan Detayları</h1>
                    <div class="form-group">
                        <label>İlan Sahibi</label>
                        <p><b><?php echo $row["ev_sahibi"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Oda Sayısı</label>
                        <p><b><?php echo $row["oda_sayisi"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Salon Sayısı</label>
                        <p><b><?php echo $row["salon_sayisi"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Fiyat</label>
                        <p><b><?php echo $row["fiyat"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Banyo Sayısı</label>
                        <p><b><?php echo $row["banyo_sayisi"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Bina Yaşı</label>
                        <p><b><?php echo $row["bina_yasi"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Kat</label>
                        <p><b><?php echo $row["kat"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>m2</label>
                        <p><b><?php echo $row["m2"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>İlan Tarihi</label>
                        <p><b><?php echo date('m/d/Y',$row["ilan_tarihi"]); ?></b></p>
                    </div>

                    <p><a href="index.php" class="btn btn-primary">Geri</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>