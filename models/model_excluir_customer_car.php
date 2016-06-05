<?PHP
  @session_start();
  require_once("/home/u130462423/public_html/controllers/conection.php"); 
  $id_car = $_GET['id'];

   	$sql = "SELECT *  FROM customer_cars   WHERE (id = '$id_car')";
  	$r = mysqli_query($conexao, $sql);
 
  while ($result = mysqli_fetch_array($r)) {

  	if(!empty($result['image1'])){
       unlink($result['image1']);
    }

   if(!empty($result['image2'])){
     
       unlink($result['image2']);
    }
   if(!empty($result['image3'])){
       unlink($result['image3']);
    }

   if(!empty($result['image4'])){
       unlink($result['image4']);
    }

   if(!empty($result['image5'])){
       unlink($result['image5']);
    }
  }
   
  	

  $sql = "DELETE FROM customer_cars   WHERE (id = '$id_car')";
  $r = mysqli_query($conexao, $sql);
      
  require_once("/home/u130462423/public_html/views/view_carro_excluido.php");

   ?>