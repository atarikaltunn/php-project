<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Ev İlanları</h2>
                        <?php
                        if ($_SESSION["username"] == "admin") {
                            echo "<a href='./car/offers2.php' class='btn btn-primary'>Geri</a>";
                        } else {
                            echo "<a href='create.php' class='btn btn-success pull-right'><i class='fa fa-plus'></i> İlan Ekle</a>
                            <a href='./car/offers2.php' class='btn btn-primary'>Geri</a>";
                        }
                        ?>
                    </div>
                    <?php
                    require_once "config.php";
                    if ($_SESSION["username"] == "admin") {
                        $sql = "SELECT * FROM ilanlar";
                    } else {
                        $sql = "SELECT * FROM ilanlar where ev_sahibi = '{$_SESSION['username']}'";
                    }
                    if ($result = mysqli_query($db, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>İlan Sahibi</th>";
                            echo "<th>Oda Sayısı</th>";
                            echo "<th>Salon Sayısı</th>";
                            echo "<th>Fiyat</th>";
                            echo "<th>Banyo Sayısı</th>";
                            echo "<th>Bina Yaşı</th>";
                            echo "<th>Kat</th>";
                            echo "<th>m2</th>";
                            echo "<th>İlan Tarihi</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['ev_sahibi'] . "</td>";
                                echo "<td>" . $row['oda_sayisi'] . "</td>";
                                echo "<td>" . $row['salon_sayisi'] . "</td>";
                                echo "<td>" . $row['fiyat'] . "</td>";
                                echo "<td>" . $row['banyo_sayisi'] . "</td>";
                                echo "<td>" . $row['bina_yasi'] . "</td>";
                                echo "<td>" . $row['kat'] . "</td>";
                                echo "<td>" . $row['m2'] . "</td>";
                                echo "<td>" . $row["ilan_tarihi"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    mysqli_close($db);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>