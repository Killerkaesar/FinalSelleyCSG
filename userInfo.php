<meta charset="UTF-8">
<?php include './header.php';?>


      <?php
          $conn = mysqli_connect('localhost','root','','finalproyectonuevo');
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          //Selecting Database
          $user = $_SESSION['sess_user'];
          $query = mysqli_query($conn, "SELECT * FROM user WHERE Email ='".$user."'");
          $row = mysqli_fetch_array($query);
        ?>


    <div class="container">
      <!-- Page Heading -->

      <div class="col-lg-12">
        <div class="card mt-4">
        <div class="card-body">
          <h1 class="my-1">User Info</h1>
            <!-- User -->
            <br>
            <div class="form-group">
              <label class="control-label col-sm-2">Email</label>
              <div class="col-sm-12">
                <input type="email" name="user" class="form-control" id="email" value=<?php echo"{$row['Email']}";?> readonly>
              </div>
            </div>
            <!-- Password -->
            <div class="form-group">
              <label class="control-label col-sm-2">Password:</label>
              <div class="col-sm-12">
                <input type="password" name="pass" class="form-control" id="pwd" value=<?php echo"{$row['Password']}";?> readonly>
              </div>
            </div>

            <!-- Año-->
            <div class="form-group">
              <label class="control-label col-sm-2">Year of birth</label>
              <div class="col-sm-12">
                <input type="number" name="year" class="form-control" id="email" value=<?php echo"{$row['Birth_Date']}";?> readonly>
              </div>
            </div>

            <!-- Direccion-->
            <div class="form-group">
              <label class="control-label col-sm-2">Address</label>
              <div class="col-sm-12">
                <input type="text" name="address" class="form-control" id="email" value=<?php echo"{$row['Address']}";?> readonly>
              </div>
            </div>

            <!-- Postal-->
            <div class="form-group">
              <label class="control-label col-sm-2">Aleigance</label>
              <div class="col-sm-12">
                <input type="text" name="postal" class="form-control" id="email" value=<?php echo"{$row['Aleigance']}";?> readonly>
              </div>
            </div>

            <!-- Tarjeta-->
            <div class="form-group">
              <label class="control-label col-sm-2">Credit Funds:</label>
              <div class="col-sm-12">
                <input type="number" name="cc" class="form-control"  value=<?php echo"{$row['Credits']}";?> readonly>
              </div>
            </div>
