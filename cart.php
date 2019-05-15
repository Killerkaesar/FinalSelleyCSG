<meta charset="UTF-8">
<?php include './header.php';?>

    <!-- Page Content -->
    <div class="container">
      <div class="row my-3">

        <div class="col-xl-1">
          <h2>Cart</h2>
        </div>

        <div class="col-xl-2">
          <form action="./history.php" method="post">
            <button type='submit' class='btn btn-outline-primary align-middle'>User Transaction History</button>
          </form>
        </div>

        <div class="col-xl-7">
        </div>

        <div class="col-xl-2">
          <form action="./buyAction.php" method="post">
            <button type='submit' class='btn btn-lg btn-primary btn-block align-middle' style="border-radius: 25px;">Checkout</button>
          </form>
        </div>
      </div>

      <table class="table" style="text-align: center;">
        <thead class="thead-dark">
          <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Credits</th>
            <th>Quantity</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>

        <!-- Product -->
        <?PHP
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          if(!isset($_SESSION['sess_user'])){
            header("Location:./index.php");
          }else {
            $result = mysqli_query($conn,"SELECT DISTINCT u.Email, p.Category, p.ID_Product, p.P_Name, p.Price_Credits, h.cantidad, h.user FROM historial h, products p, user u WHERE h.Product=p.ID_Product AND u.Email=h.user AND u.Email='{$_SESSION['sess_user']}' AND pagado=0;");

            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
                echo "<td class='align-middle'> <h4>{$row['P_Name']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['Category']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['Price_Credits']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['cantidad']} </h4></td>";
                echo "<td class='align-middle'> <form action='./deleteCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['ID_Product']}'</input>";
                // echo "<button type='submit' class='btn btn-primary align-middle'>Eliminar</button></form></td>";
              echo "</tr>";
            }
          }
        ?>

        </tbody>
      </table>
    </div>
    <!-- /.container -->
