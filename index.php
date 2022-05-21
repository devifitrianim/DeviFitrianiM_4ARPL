<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DFM Outfit | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    
    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>DFM Outfit</h1>
            <h3>Mau Cari Apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php" >
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Product Name" 
                        aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna2 text-white">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Categoies Highlight -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Best Seller</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-baju-pria d-flex justify-content-center
                    align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=menswear">Menswear</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-baju-wanita d-flex justify-content-center
                    align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=womenswear">Womenswear</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center
                    align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=shoes">Shoes</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us -->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>About Us</h3>
            <p class="fs-5 mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate aut accusantium assumenda facilis, 
                quo eos magni minima. Fuga iste optio voluptates repellat voluptate a! Perferendis magni corporis quod 
                molestiae soluta, quisquam beatae sint! Optio soluta, facere alias, magni maiores consequuntur saepe 
                officiis laudantium vero ipsam, nisi consectetur recusandae? Tempore in veritatis magnam aspernatur non 
                nemo omnis, harum eos maiores placeat libero nostrum velit molestiae ab itaque inventore? Suscipit unde 
                vel laboriosam asperiores facere esse quibusdam fugit, dicta, porro reiciendis tempore.
            </p>
        </div>
    </div>

    <!-- Product -->
    <div class="container-fluid" py-5>
        <div class="container text-center">
            <h3 class="mt-5">Products</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-4">
                    <div class="card">
                        <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga"><?php echo $data['harga']; ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna2 text-white">See Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>