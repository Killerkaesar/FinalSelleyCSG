<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:./index.php");
  }else{
    $admin = $_SESSION['sess_user'];
    if($admin != 'admin@admin.com'){
        header("Location:./index.php");
    }
  }

    $conn = mysqli_connect('localhost','root','','finalproyectonuevo');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($conn,"DELETE FROM products WHERE ID_Product={$_POST['eliminar']}");
    header("Location: ./editProducts.php");
?>
