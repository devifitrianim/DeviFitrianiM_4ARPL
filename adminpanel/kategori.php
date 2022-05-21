<?php
    include "session.php";
    include "../koneksi.php";

    $querykategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahkategori = mysqli_num_rows($querykategori);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration{
        text-decoration: none;
    }
</style>

<body>
    <?php include "navbar.php"; ?>
    <div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="../adminpanel" class="no-decoration text-muted">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
               <i class="fa-solid fa-folder-open"></i> Category
            </li>
        </ol>
    </nav>

    <div class="my-5 col-12 col-md-6">
        <h3>Add Categories</h3>

        <form action="" method="post">
            <div>
                <label for="kategori">Categories</label>
                <input type="text" id="kategori" name="kategori" placeholder="input name of categories"
                class="form-control">
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="submit" name="simpan_kategori">Save</button>
            </div>
        </form>

        <?php
            if(isset($_POST['simpan_kategori'])){
                $kategori = htmlspecialchars($_POST['kategori']);

                $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE 
                nama='$kategori'");
                $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

                if($jumlahDataKategoriBaru > 0){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        this category already exists
                    </div>
                    <?php
                }
                else{
                    $querysimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES 
                    ('$kategori')");

                    if($querysimpan){
                        ?>
                        <div class="alert alert-primary" role="alert">
                            Category saved successfully
                        </div>

                        <meta http-equiv="refresh" content="1; url=kategori.php"/>
                        <?php


                    }
                }
            }
        ?>
    </div>

    <div class="mt-3">
        <h2>List Categories</h2>

        <div class="table-responsive mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($jumlahkategori==0){
                    ?>
                        <tr>
                            <td colspan=3 class="text-center">Data kategori tidak tersedia</td>
                        </tr>
                    <?php
                        }
                        else{
                            $jumlah = 1;                            
                            while($data=mysqli_fetch_array($querykategori)){
                    ?>
                                <tr>
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td>
                                        <a href="kategori-detail.php?p=<?php echo $data['id']; ?>"
                                        class="btn btn-dark"><i class="fas fa-search"></i></a>
                                    </td>
                                </tr>
                    <?php
                            $jumlah++;
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>