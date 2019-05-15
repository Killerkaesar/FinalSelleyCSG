<?php include './header.php';?>

  <?PHP
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!isset($_SESSION['sess_user'])){
      header("Location:./index.php");
    }else{
      $admin = $_SESSION['sess_user'];
      if($admin != 'admin@admin.com'){
          header("Location:./index.php");
      }
    }
   ?>


   <div class="container">
     <!-- Page Heading -->

     <div class="col-lg-12">
       <div class="card mt-4">
       <div class="card-body">
         <h1 class="my-2">New Product</h1>

         <h6 style="color:red">
           <?php
             if(!isset($_POST['nombre']) ||!isset($_POST['cat'])||!isset($_POST['Subcat'])|| !isset($_POST['precio']) || !isset($_POST['c_almacen']) || !isset($_POST['origen']) || !isset($_POST['descripcion'])){
               echo "Fill all the inputs.";
             }else{
              $nombre = $_POST['nombre'];
              $descripcion = $_POST['descripcion'];
              $precio = $_POST['precio'];
              $c_almacen = $_POST['c_almacen'];
              $origen = $_POST['origen'];
              $cat = $_POST['cat'];
              $Subcat = $_POST['Subcat'];

               $result = mysqli_query($conn,"SELECT * FROM products ORDER BY ID_Product DESC");
               $row = mysqli_fetch_array($result);

               // $id = $row['idSkins'] + 1;
               // $date =  date("h:i:sa") ." ". date("Y/m/d");
               if($_POST['cat']=='Creature'){
                 $target_dir = "./img/Pictures/Creatures/";
               }else{
                 $target_dir = "./img/Pictures/Droids/";
               }

               $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
               $uploadOk = 1;
               $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               // Check if image file is a actual image or fake image
               if(isset($_POST["submit"])) {
                   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                   if($check !== false) {
                       $uploadOk = 1;
                   } else {
                       echo "File is not an image.<br>";
                       $uploadOk = 0;
                   }
               }
               // Check if file already exists
               if (file_exists($target_file)) {
                   echo "Sorry, file already exists.<br>";
                   $uploadOk = 0;
               }
               // Check file size
               if ($_FILES["fileToUpload"]["size"] > 500000) {
                   echo "Sorry, your file is too large.<br>";
                   $uploadOk = 0;
               }
               // Allow certain file formats
               if($imageFileType != "jpg") {
                   echo "Sorry, only JPG files are allowed.<br>";
                   $uploadOk = 0;
               }
               // Check if $uploadOk is set to 0 by an error
               if ($uploadOk == 0) {
                   echo "Sorry, your file was not uploaded.<br>";

               // if everything is ok, try to upload file
               } else {
                 $foto = basename($_FILES["fileToUpload"]["name"]);
                 echo "$nombre";
                 echo "$descripcion";
                 echo "$foto";
                 echo "$c_almacen";
                 echo "$origen";
                 echo "$Subcat";
                 echo "$cat";
                 echo "$precio";
                 $query =  "INSERT INTO products (P_Name, Description, Picture, Stock, Origin, Category, SubCategory, Price_Credits, Price_Trugut, Price_NovaCrystal, Price_Wupiupi, Price_Peggat)
                                          VALUES ('$nombre' , '$descripcion', '$foto', $c_almacen, '$origen', '$cat','$Subcat',$precio,$precio,$precio,$precio,$precio)";
                 $result = mysqli_query($conn, $query);

                 if($result){

                     echo "The product '$nombre' with the image file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to the Data Base.<br>";
                     echo "<div class='form-group'>";
                       echo "<div class='col-sm-offset-2 col-sm-12'>";
                       echo "<a href='./admin.php' class='button'>Regresar a Admin</a>";
                     echo "</div>";
                   echo "</div>";
                 }else{
                    echo "Fill all the inputs.";
                 }
               }
             }

           ?>
         </h6>

         <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

           <div class="row">

            <!-- nombre -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Product Name</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="30" name="nombre" class="form-control" placeholder="Enter name">
                 </div>
               </div>
             </div>

             <!-- precio -->
              <div class="col-xl-6">
                <div class="form-group">
                  <label class="control-label col-sm-12">Price in Credits</label>
                  <div class="col-sm-12">
                    <input type="number" maxlength="11" name="precio" class="form-control" placeholder="Enter price">
                  </div>
                </div>
              </div>

              <!-- cantidad -->
               <div class="col-xl-6">
                 <div class="form-group">
                   <label class="control-label col-sm-12">Stock</label>
                   <div class="col-sm-12">
                     <input type="number" maxlength="11" name="c_almacen" class="form-control" placeholder="Enter Stock">
                   </div>
                 </div>
               </div>

               <!-- fabricante -->
                <div class="col-xl-6">
                  <div class="form-group">
                    <label class="control-label col-sm-12">Category</label>
                    <div class="col-sm-12">
                      <input type="text" maxlength="20" name="cat" class="form-control" placeholder="Enter Category (Creature/Droid)">
                    </div>
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-group">
                    <label class="control-label col-sm-12">Sub Category</label>
                    <div class="col-sm-12">
                      <input type="text" maxlength="20" name="Subcat" class="form-control" placeholder="Enter Sub Category">
                    </div>
                  </div>
                </div>

            <!-- origen -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Origin</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="20" name="origen" class="form-control" placeholder="Enter Planet/Region">
                 </div>
               </div>
             </div>

            <!-- categoria -->

             <!-- file upload-->
              <div class="col-xl-6">
                <div class="form-group">
                  <label class="control-label col-sm-12">Select image to upload:</label>
                  <div class="col-sm-12">
                      <input type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                </div>
              </div>

            <!-- descripcion -->
             <div class="col-xl-12">
               <div class="form-group">
                 <label class="control-label col-sm-12">Description</label>
                 <div class="col-sm-12">
                   <textarea type="textarea" rows="5" maxlength="500" name="descripcion" class="form-control" placeholder="Enter a brief description"></textarea>
                 </div>
               </div>
             </div>

            <!-- Submit -->
             <div class="col-xl-12">
               <div class="form-group">
                 <div class="col-sm-12">
                   <button type="submit" name="submit" class="btn btn-primary btn-block">Insert Product</button>
                 </div>
               </div>
             </div>

           </div>
         </form>
       </div>
     </div>
     <div class='form-group'>
       <div class='col-sm-offset-2 col-sm-12'>
       <a href='./admin.php' class='button'>Regresar a Admin</a>
     </div>
   </div>
    <!-- /.container -->
