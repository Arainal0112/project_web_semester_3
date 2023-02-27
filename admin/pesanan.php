<?php

include 'config.php';
// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:login.php');
// }
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = 'completed' WHERE id = '$order_update_id'") or die('query failed');
   $message[] = 'payment status has been updated!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}


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
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                DASHBOARD
                            </a>
                            <a class="nav-link collapsed" href="produk.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                PRODUK
                            </a>
                            <a class="nav-link collapsed" href="pesanan.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                PESANAN
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
                        <h1 class="mt-4">PESANAN</h1>                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                LIST PESANAN
                            </div>
                            <div class="card-body">
                                
                                <table id="datatablesSimple">
                                    <tr>
                                        <th>No. Pesanan</th>
                                        <th>ID User</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Nomor</th>
                                        <th>E-mail</th>
                                        <th>Alamat</th>
                                        <th>Total Produk</th>
                                        <th>Total Harga</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Nomor Rekening</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php
                                        $select_orders= mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                                        $i=0;
                                        if(mysqli_num_rows($select_orders) > 0){
                                            
                                        while($fetch_orders = mysqli_fetch_assoc($select_orders)){
                                            $i++;
                                    ?>
                                    <tr>
                                        <td><?= $i;?></td>
                                        <td><?php echo $fetch_orders['user_id']; ?></td>
                                        <td><?php echo $fetch_orders['placed_on']; ?></td>
                                        <td><?php echo $fetch_orders['name']; ?></td>
                                        <td><?php echo $fetch_orders['number']; ?></td>
                                        <td><?php echo $fetch_orders['email']; ?></td>
                                        <td><?php echo $fetch_orders['address']; ?></td>
                                        <td><?php echo $fetch_orders['total_products']; ?></td>
                                        <td><?php echo $fetch_orders['total_price']; ?></td>
                                        <td><?php echo $fetch_orders['method']; ?></td>
                                        <td><?php echo $fetch_orders['norek']; ?></td>
                                        <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                                            <?php echo $fetch_orders['payment_status']; ?>
                                            <input type="submit" value="update" name="update_order" class="btn btn-primary">
                                            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="btn btn-danger">delete</a>
                                        </form>
                                        </td>
                                            
                                        
                                                
                                        <!-- <form action="" method="post">
                                            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                                            <select name="update_payment">
                                            <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                                            <option value="pending">pending</option>
                                            <option value="completed">completed</option>
                                            </select>
                                            <input type="submit" value="update" name="update_order" class="option-btn">
                                            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
                                        </form></td> -->
                                        <?php
                                    }
                                        }else{
                                            echo '<p class="empty">no orders added yet!</p>';
                                        }
                                        ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>