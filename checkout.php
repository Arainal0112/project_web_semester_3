<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $norek = $_POST['norek'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'rumah no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $grand_total = 0;
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
               $discount = '0';
               if (mysqli_num_rows($cart_query)>3){
                  $discount = '0.02';
               } else if(mysqli_num_rows($cart_query)>5 && mysqli_num_rows($cart_query)<11){
                $discount = '0.05';
              } else if(mysqli_num_rows($cart_query)>=11){
                $discount = '0.08';
              } 
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $grand_total += $sub_total;
      } $cart_total = ($grand_total - ($grand_total * $discount));
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND norek='$norek' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'order already placed! Thank u For Ordering.'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, norek, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$norek', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
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

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Checkout</h3>
</div>

<section class="display-order">

   <?php  
      $discount = '0';
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
               if (mysqli_num_rows($select_cart)>3){
                  $discount = '0.02';
               } else if(mysqli_num_rows($select_cart)>5 && mysqli_num_rows($select_cart)<11){
                $discount = '0.05';
              } else if(mysqli_num_rows($select_cart)>=11){
                $discount = '0.08';
              } 
           // $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            
            $grand_total += $total_price;
   ?>
   
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo 'Rp '.$fetch_cart['price'].',-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      } $discount += ($grand_total * $discount);
        $grand_total -= $discount;
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> Diskon : <span>Rp <?php echo $discount; ?>,-</span> </div>
   <div class="grand-total"> Total : <span>Rp <?php echo $grand_total; ?>,-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Lengkapi Data Anda</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Nama Lengkap :</span>
            <input type="text" name="name" required placeholder="Masukan Nama Lengkap">
         </div>
         <div class="inputBox">
            <span>Nomor Handphone :</span>
            <input type="number" name="number" required placeholder="Masukan Nomor Telepon">
         </div>
         <div class="inputBox">
            <span>Email :</span>
            <input type="email" name="email" required placeholder="Masukan Email">
         </div>
         <div class="inputBox">
            <span>Jenis Pembayaran :</span>
            <select name="method">
               <option value="cash on delivery">COD (Bayar di Tempat)</option>
               <option value="credit card">Transfer Bank</option>
               <option value="paypal">e-Money</option>
               <option value="paytm">PayLater</option>
            </select>
         </div>
         <div class="inputBox">
            <span>ID / No. Rekening :</span>
            <input type="text" name="norek" required placeholder="isi dengan no hp jika COD">
         </div>
         <div class="inputBox">
            <span>Nomor Rumah :</span>
            <input type="number" min="0" name="flat" required placeholder="ct.. Rumah no.">
         </div>
         <div class="inputBox">
            <span>Kota :</span>
            <input type="text" name="city" required placeholder="cth. Probolinggo">
         </div>
         <div class="inputBox">
            <span>Provinsi :</span>
            <input type="text" name="state" required placeholder="cth. Jawa Timur">
         </div>
         <div class="inputBox">
            <span>Negara :</span>
            <input type="text" name="country" required placeholder="cth. Indonesia">
         </div>
         <div class="inputBox">
            <span>Kode Pos :</span>
            <input type="number" min="0" name="pin_code" required placeholder="cth. 123456">
         </div>
         <div class="inputBox">
            <span>Alamat :</span>
            <input type="text" name="street" required placeholder="cth. Jl. Remujung Kec. Lowokwaru Kel. Jatimulyo">
         </div>
      </div>
      <input type="submit" value="order now" class="btn" name="order_btn">
   </form>

</section>


<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>