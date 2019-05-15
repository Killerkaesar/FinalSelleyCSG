<meta charset="UTF-8">
<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:./index.php");
  }else {
    $product = $_POST['product'];
    $cantidad = $_POST['cantidad'];

    $conn = mysqli_connect('localhost','root','','finalproyectonuevo');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $quantity = mysqli_query($conn,"SELECT cantidad FROM historial WHERE user='{$_SESSION['sess_user']}' AND Product=$product AND pagado=0");

    $resul_cant = mysqli_fetch_array($quantity);
    if($resul_cant['cantidad']>0){
      echo "act";
      $cantidad = $cantidad + $resul_cant['cantidad'];
      mysqli_query($conn,"UPDATE historial SET cantidad = $cantidad WHERE user='{$_SESSION['sess_user']}' AND Product=$product AND pagado=0");
    }else{
      echo "ins";
      $insert = "INSERT INTO historial(mail,cantidad,pagado,Product,user) VALUES('{$_SESSION['sess_user']}', $cantidad,0,$product,'{$_SESSION['sess_user']}')";
      $result = mysqli_query($conn,$insert);
    }

    header("Location:./cart.php");

  }
?>
