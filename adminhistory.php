<meta charset="UTF-8">
<?php include './header.php';?>

    <!-- Page Content -->
    <div class="container">
      <div class="row my-3">
          <h2>Transaction History</h2>
      </div>

      <table class="table" style="text-align: center;">
        <thead class="thead-dark">
          <tr>
	          <th>User</th>
            <th>Product</th>
            <th>category</th>
            <th>Price Credits</th>
            <th>Quantity</th>
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
          $result = mysqli_query($conn,"SELECT DISTINCT u.Email, p.P_Name,p.Category, p.Price_Credits, h.cantidad, h.Product FROM  historial h, products p, user u WHERE h.Product=p.ID_Product AND u.Email=h.user AND pagado=1;");
            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
			    echo "<td class='align-middle'> <h4>{$row['Email']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['P_Name']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['Category']} </h4></td>";
                echo '<td class="align-middle"> <h4>$'. $row["Price_Credits"] .'</h4></td>';
                echo "<td class='align-middle'> <h4>{$row['cantidad']} </h4></td>";
              echo "</tr>";
            }
          }
        ?>

        </tbody>
      </table>
      <div class='form-group'>
        <div class='col-sm-offset-2 col-sm-12'>
        <a href='./admin.php' class='button'>back to Admin</a>
      </div>
    </div>
    </div>
    <!-- /.container -->
