<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="https://www.instagram.com/bookly.book/" class="" target="blank"><img src="ig.png" width="25" align="center"></a>
            <a href="https://shopee.co.id/bookly.store" class="" target="blank"><img src="shopee.png" width="30" align="center"></a>
            
         </div>

         <p><span><?php echo $_SESSION['user_name']; ?></span> | <a href="logout.php">logout</a></p>

      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Web's Book Store</a>

         <nav class="navbar">
            <a href="index.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <a href="store.php">STORE</a>
            <a href="shop.php">SHOP</a>
            <a href="contact.php">CONTACT</a>
            <a href="orders.php">ORDER</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>
      </div>
   </div>

</header>