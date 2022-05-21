<?php
    include "session.php";
    include "../koneksi.php";

    $querykategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahkategori = mysqli_num_rows($querykategori);

    $queryproduk = mysqli_query($con, "SELECT * FROM produk");
    $jumlahproduk = mysqli_num_rows($queryproduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DFM Online Store</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .kotak{
        border: solid;
    }

    .summary-kategori{
        background-color: #Ececec;
        border-radius: 15px;
    }

    .no-decoration{
        text-decoration: none;
    }
    

</style>

<body>
    <?php include "navbar.php"?>
    <div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
               <i class="fas fa-home"></i> Home
            </li>
        </ol>
    </nav>

    <h2>Halo <?php echo $_SESSION['username']; ?></h2>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="summary-kategori p-2">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa-solid fa-folder-open fa-8x text-black-50"></i>
                        </div>
                        <div class="col-6">
                            <h4 class="fs-3">Kategori</h4>
                            <p class="fs-5"><?php echo $jumlahkategori; ?> Category</p>
                            <p><a href="kategori.php" class="text-black no-decoration">See More</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="summary-kategori p-2">
                    <div class="row">
                        <div class="col-6">
                            <i class="fas fa-bag-shopping fa-8x text-black-50"></i>
                        </div>
                        <div class="col-6">
                            <h4 class="fs-3">Product</h4>
                            <p class="fs-5"><?php echo $jumlahproduk ?> Product</p>
                            <p><a href="produk.php" class="text-black no-decoration">See More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>