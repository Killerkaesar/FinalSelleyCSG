<meta charset="UTF-8">
<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:index.php");
  }else {
    $conn = mysqli_connect('localhost','root','','finalproyectonuevo');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //From here
    $valido = true;
    $borrar=mysqli_query($conn,"SELECT p.ID_Product, p.Stock, h.cantidad FROM products p, historial h WHERE p.ID_Product=h.Product AND h.user='{$_SESSION['sess_user']}' AND h.pagado=0;");

    while($row = mysqli_fetch_array($borrar)){
      echo "Producto: {$row['ID_Product']}<br>";
      echo "Carrito: {$row['Stock']}<br>";
      echo "Usuario: {$row['cantidad']}<br>";

      $stock = $row['Stock'] - $row['cantidad'];
      if($stock < 0){
        $valido = false;
      }
      echo "Resultado: $stock<br><br><br>";
    }

    if($valido == true){
      echo "Compra valida<br><br>";

      $ejecutar=mysqli_query($conn,"SELECT p.ID_Product, p.Stock, h.cantidad FROM products p, historial h WHERE p.ID_Product=h.Product AND h.user='{$_SESSION['sess_user']}' AND h.pagado=0;");
      while($fila = mysqli_fetch_array($ejecutar)){
        $stock = $fila['cantidadJuego'] - 1;
        mysqli_query($conn,"UPDATE products SET Stock=$stock WHERE ID_Product={$fila['ID_Product']}");
      }

      $result = mysqli_query($con,"UPDATE historial SET pagado=1 WHERE user='{$_SESSION['sess_user']}' AND pagado=0");
        header("Location: ./history.php");
    }else{
        header("Location: ./buyError.php");
    }

    //to here
  }
?>
