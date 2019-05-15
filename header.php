<!DOCTYPE html>
<html lang="en">
  <head>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
  	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
  	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
  	    rel="stylesheet">
  	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />

    <?php
      $conn = mysqli_connect('localhost','root','','finalproyectonuevo');
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      ?>

  </head>

<body>
  <div class="header_agileits">
    <div class="logo">
      <h1><a class="navbar-brand" href="index.php"><span>Space</span> <i>Port</i></a></h1>
    </div>
    <div class="overlay overlay-contentpush">
      <button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

      <nav>
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="shop_Droids.php">Droids</a></li>
          <li><a href="shop.php">Creatures</a></li>
            <?php
                  session_start();
                  if(isset($_SESSION['sess_user'])){
                    echo "<li>";
                      echo "<a href='cart.php'><span class='con icon-close'>Cart</span></a>";
                    echo "</li>";
                    echo "<li>";
                      echo "<a href='userInfo.php'><span class='con icon-close'>User Info: {$_SESSION['sess_user']}</span></a>";
                    echo "</li>";
                    echo "<li>";
                      echo "<a href='logout.php'><span class='con icon-close'>Log out: {$_SESSION['sess_user']}</span></a>";
                    echo "</li>";

                  }else{
                    echo "<li>";
                      echo "<a href='login.php'><span class='icon icon-person'>Sign In </span></a>";
                    echo "</li>";
                  }
                  ?>
        </ul>
      </nav>
    </div>
    <div class="mobile-nav-button">
      <button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
    </div>
    <!-- cart details -->
    <!-- //cart details -->

    <div class="clearfix"></div>
  </div>
</body>
