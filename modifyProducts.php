<meta charset="UTF-8">
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
    <style>
      .box {
        padding-top: 3px;
        border:1px;
        border-style: solid;
        border-color:#DDD;
        border-radius: 5px;
        word-wrap: break-word;
        font-size: 15px;
        text-align: center;
      }
      .titlebox {
        color:white;
        background-color: #222;
      }
    </style>


   <div class="container">
     <!-- Page Heading -->
     <h1 class="my-3">Juegos en Existencia</h1>
       <div class='row my-6' >
         <div class="col-xl-1 titlebox box">
           Name
         </div>

         <div class="col-xl-3 titlebox box">
           Description
         </div>

         <div class="col-xl-1 titlebox box">
           Picture
         </div>

         <div class="col-xl-1 titlebox box">
           Price Credits
         </div>

         <div class="col-xl-1 titlebox box" style="font-size:13px">
          Stock
         </div>

         <div class="col-xl-1 titlebox box" style="font-size:14px">
           Origin
         </div>

         <div class="col-xl-1 titlebox box">
           Category
         </div>

         <div class="col-xl-1 titlebox box" style="font-size:14px">
           Sub Category
         </div>

     </div>
     <?php
         if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
         }


           $result = mysqli_query($conn,"SELECT * FROM products");


           while($row = mysqli_fetch_array($result)) {
             echo "<form action='./updateProduct.php' method='post'>";
             echo "<div class='row my-6' >";
             echo "<textarea class='col-xl-1 box' name='Name'>{$row['P_Name']}</textarea>";
             echo "<textarea class='col-xl-3 box' name='Description'>{$row['Description']}</textarea>";

             if($row['Category']=='Creature'){
               echo "<div class='col-xl-1 box'><img src='./images/Pictures/Creatures/{$row['Picture']}' style='max-width:100%; display:block; max-height:100%;'></img></div>";
             }else{
               echo "<div class='col-xl-1 box'><img src='./images/Pictures/Droids/{$row['Picture']}' style='max-width:100%; display:block; max-height:100%;'></img></div>";
             }

             echo "<textarea class='col-xl-1 box' name='Price Credits'>{$row['Price_Credits']}</textarea>";
             echo "<textarea class='col-xl-1 box' name='Stock'>{$row['Stock']}</textarea>";
             echo "<textarea class='col-xl-1 box' name='Category'>{$row['Category']}</textarea>";
             echo "<textarea class='col-xl-1 box' name='Origin'>{$row['Origin']}</textarea>";
             echo "<textarea class='col-xl-1 box' name='SubCategory'>{$row['SubCategory']}</textarea>";
             echo "<div> <button class='btn btn-primary btn-sm' name='ID_Product' value ={$row['ID_Product']} type='submit'>Actualizar</div>";
             echo "</div>";
             echo "</form>";
           }
     ?>
     <div class='form-group'>
       <div class='col-sm-offset-2 col-sm-12'>
       <a href='./admin.php' class='button'>Regresar a Admin</a>
     </div>
   </div>

         </div>
       </div>
