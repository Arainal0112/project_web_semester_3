<?php

include 'config.php';
include 'functions.php';

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:login.php');
// }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index.php">Web's Book Store</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!"><?php echo $_SESSION['admin_name']; ?></a></li>
                        <li><a class="dropdown-item" href="#!"><?php echo $_SESSION['admin_email']; ?></a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                DASHBOARD
                            </a>
                            <a class="nav-link collapsed" href="produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                PRODUK
                            </a>
                            <a class="nav-link collapsed" href="pesanan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                PESANAN
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                USER
                            </a>
                            <a class="nav-link" href="pesan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                KONTAK
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h3>Edit Produk</h3>
                        <?php
                            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                            if(mysqli_num_rows($select_products) > 0){
                                while($fetch_products = mysqli_fetch_assoc($select_products)){
                            ?>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Barang</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo $fetch_products['name']; ?>" required>
                            <label for="publisher" class="form-label">Nama Penerbit</label>
                            <input type="text" name="publisher" class="form-control" id="publisher" value="<?php echo $fetch_products['publisher']; ?>" required>
                            <label for="writer" class="form-label">Nama Penulis</label>
                            <input type="text" name="writer" class="form-control" id="writer" value="<?php echo $fetch_products['writer']; ?>" required>
                            <label for="genre" class="form-label">Genre Buku</label>
                            <input type="text" name="genre" class="form-control" id="genre" value="<?php echo $fetch_products['genre']; ?>" required>
                            <label for="sinopsis" class="form-label">Sinopsis</label>
                            <input type="text" name="sinopsis" class="form-control" id="sinopsis" value="<?php echo $fetch_products['name']; ?>" required>
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" name="proce" min="0" class="form-control" id="price" value="<?php echo $fetch_products['price']; ?>" required>
                            <label for="image" class="form-label">Foto Barang</label>
                            <input type="file" name="image" class="form-control" id="image" accept="image/jpg, image/jpeg, image/png" required>
                        </div>
                        <a class="btn btn-danger" role="button" href="functions.php?update_product=<?php echo $fetch_products['id']; ?>"onclick="return confirm('Update this Produk?');" >Update</a>
                        <a class="btn btn-primary" role="button" href="produk.php"onclick="return confirm('Apakah anda yakin untuk membatalkan perubahan?');" >Kembali</a>
                        
                    </form>
                    <?php
                                    }
                                        }else{
                                            echo '<p class="empty">no products added yet!</p>';
                                        }
                                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Arainal Aldiansyah 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
