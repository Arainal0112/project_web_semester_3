<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

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
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>


<section class="home">

   <div class="content">
      <h3>Web's Book Store</h3>
      <p>Menyediakan berbagai macam buku dari berbagai genre yang menarik 
      </p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rp <?php echo $fetch_products['price']; ?>,-</div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Selengkapnya</button>
          
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Selengkapnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
               $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id='2'") or die('query failed');
               if(mysqli_num_rows($select_products) > 0){
                  while($fetch_products = mysqli_fetch_assoc($select_products)){
             ?>
                  <h2><?php echo $fetch_products['name']; ?></h2><hr>
                  <font size="4">Penerbit <?php echo $fetch_products['publisher']; ?></font><hr>
                  <font size="4">Penulis <?php echo $fetch_products['writer']; ?></font><hr>
                  <font size="4">Genre <?php echo $fetch_products['genre']; ?></font><hr>
                  <font size="4" align="justify"><?php echo $fetch_products['sinopsis']; ?></font><hr>
                  <h2>Rp <?php echo $fetch_products['price']; ?>,-</h2>
            
            <?php
               }
               }else{
               echo '<p class="empty">data tidak dapat ditampilkan!</p>';
               }
            ?>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Close</button>
            </div>
            </div>
        </div>
        </div>
     </form>
     
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/inside.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Fokus kami ialah melayani <i>book's addict</i> yang hendak berbelanja <i>their list to buy books</i> tanpa harus berpergian. 
         Jangan khawatir ongkos kirim. Di BOOKLY, <b>Ongkir Terjangkau.</b> Hanafi-Bookly merupakan akun resmi dari 
         Toko Buku Hanafi-Bookly adalah sebuah toko online yang me-rebranding Toko Buku Hanafi yang terdapat di Jl. Dr.Sutomo No.187A, Kota Probolinggo.</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Feel free to approach us! Jika terdapat kendala, kritik, dan saran, silahkan hubungi kami. Kami akan selalu menerima masukan Anda.
      </p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>






<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>