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

    $nombre = $_POST['P_Name'];
    $descripcion = $_POST['Description'];
    $precio = $_POST['Price_Credits'];
    $c_almacen = $_POST['Stock'];
    $fabricante = $_POST['Category'];
    $origen = $_POST['Origin'];
    $campeon = $_POST['SubCategory'];

    $result = mysqli_query($conn,"UPDATE products SET P_Name='$nombre', Description='$descripcion', Price_Credits=$precio, Stock=$c_almacen, Category='$fabricante', Origin='$origen', SubCategory='$campeon' WHERE ID_Product={$_POST['ID_Product']}");
    header("Location: ./modifyProducts.php");
?>
''
