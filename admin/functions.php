<?php
include 'config.php';

//Produk
if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $publisher = $_POST['publisher'];
   $writer = $_POST['writer'];
   $genre = $_POST['genre'];
   $sinopsis = $_POST['sinopsis'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already added';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, publisher, writer, genre, sinopsis) 
      VALUES('$name', '$price', '$image', '$publisher', '$writer', '$genre', '$sinopsis')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
            header('location:index.php');

         }
      }else{
         $message[] = 'product could not be added!';
      }
   }
}

if(isset($_GET['delete_produk'])){
   $delete_id = $_GET['delete_produk'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:produk.php');
}

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_publisher = $_POST['update_publisher'];
   $update_writer = $_POST['update_writer'];
   $update_genre = $_POST['update_genre'];
   $update_sinopsis = $_POST['update_sinopsis'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price', publisher = '$update_publisher',
      writer = '$update_writer', genre = '$update_genre', sinopsis = '$update_sinopsis' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:produk.php');

}

//Pesanan
if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
   $message[] = 'payment status has been updated!';

}

if(isset($_GET['delete_pesanan'])){
   $delete_id = $_GET['delete_pesanan'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:pesanan.php');
}


//USER
if(isset($_GET['delete_user'])){
   $delete_id = $_GET['delete_user'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:user.php');
}
if(isset($_POST['update_user'])){

   $user_update_id = $_POST['order_id'];
   $update_name = $_POST['name'];
   $update_email = $_POST['email'];
   $update_password = $_POST['pasword'];
   mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email = '$update_email', password = '$update_name' WHERE id = '$order_update_id'") or die('query failed');
   $message[] = 'User has been updated!';

}
if(isset($_POST['admin_user'])){
   $admin_id = $_GET['user_id'];
   mysqli_query($conn, "UPDATE `users` SET user_type = 'admin' WHERE id = '$admin_id'") or die('query failed');
   $message[] = 'User has been updated to admin!';
   header('location:user.php');

}


//Pesan 
if(isset($_GET['delete_pesan'])){
   $delete_id = $_GET['delete_pesan'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   header('location:pesan.php');
}




?>