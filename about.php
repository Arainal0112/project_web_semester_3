<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Web's Book Store</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>About Us</h3>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/inside-2.jpg" alt="">
      </div>

      <div class="content">
         <h3>Kenapa Harus Web's Book Store?</h3>
         <p>Karena kami menjual banyak buku dari berbagai jenis genre. Kalian bisa membeli atau memilih buku yang mereka suka dengan mudah.</p>
         <p>Dan kami memberikan harga terjangkau. Yang dapat dibeli oleh semua kalangan. Eitss jangan lupa, <b>GRATIS ONGKIR SELAMANYA</b> </p>
         <p>*Khusus Daerah Jawa Timur</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Riview Pelanggan</h1>

   <div class="box-container">

      <div class="box">
         <p>Buku yang ditawarkan sangat banyak. jadi binggung milih. Pelayanannya memuaskann!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Brodi Sutopo</h3>
      </div>

      <div class="box">
         <p>Buku yang dijual sangat bagus dan menarik. Buku sampai di depan rumah dalam kondisi baik.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Rachel Gloria</h3>
      </div>

      <div class="box">
         <p>Proses pengiriman cepat. Aku sampe kaget baru checkout, eh udah dateng aja bukunya.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Devon Pamungkas</h3>
      </div>

      <div class="box">
         <p>Harga yang ditawarkan sangat terjangkau, ga kalah dengan toko buku lain. Bakal re-order nih.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Johnatan</h3>
      </div>

      <div class="box">
         <p>Buku yang dijual sangat menginspirasi. Pelayanannya baik, adminnya ramahhhh.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Jhonny Deep</h3>
      </div>

      <div class="box">
         <p>Pengemasan sangat baik. Paket sampai dengan selamat tanpa cacat. Sukak order disini</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Lily Pretchet</h3>
      </div>

   </div>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>