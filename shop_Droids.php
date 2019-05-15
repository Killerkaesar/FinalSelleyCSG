<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<?php include './header.php';?>
<head>
	<title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website Template | Shop :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen" property="" />
	<link href="css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Owl-carousel-CSS -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

	<?php
    $conn = mysqli_connect('localhost','root','','finalproyectonuevo');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    ?>

</head>

<body>
	<!-- banner -->
<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">

		</div>


		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li>Shop Droids</li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">

			<div class="left-ads-display col-md-9">
				<div class="wrapper_top_shop">
					<!-- <div class="col-md-6 shop_left">
						<img src="images/banner3.jpg" alt="">
						<h6>40% off</h6>
					</div> -->
					<!-- <div class="col-md-6 shop_right">
						<img src="images/banner2.jpg" alt="">
						<h6>50% off</h6>
					</div> -->
					<div class="clearfix"></div>
					<!-- product-sec1 -->
					<div class="product-sec1">



						<!--/mens-->

						<?php

							$result = mysqli_query($conn,"Select * from products where Category = 'Droid'");
							while($row = mysqli_fetch_array($result)):
						 ?>
						 <div class="col-md-4 product-men">
 							<div class="product-shoe-info shoe">
 								<div class="men-pro-item">
 									<div class="men-thumb-item">
 										<img src="images/Pictures/Droids/<?= $row['Picture'] ?>" alt="">
 										<div class="men-cart-pro">
 											<div class="inner-men-cart-pro">
												<form action="single.php" method="POST">
 												<button type="hidden" href="single.php" name="hola" method="post" value="<?= $row['ID_Product'] ?>" class="link-product-add-cart">More info</a></button>
											</form>
											</div>
 										</div>
 										<span class="product-new-top">Stock: <?php echo $row['Stock'] ?></span>
 									</div>
 									<div class="item-info-product">
 										<h4>
 											<a href="single.html"><?php echo $row['P_Name'] ?> </a>
 										</h4>
 										<div class="info-product-price">
 											<div class="grid_meta">
 												<div class="product_price">
 													<div class="grid-price ">
 														<span class="money ">Credits: <?php echo $row['Price_Credits'] ?></span>
 													</div>
 													<div class="grid-price ">
 														<span class="money ">Truguts: <?php echo $row['Price_Trugut'] ?></span>
 													</div>
													<div class="grid-price ">
 														<span class="money ">Peggat: <?php echo $row['Price_Peggat'] ?></span>
 													</div>
													<div class="grid-price ">
 														<span class="money ">Wupiupi: <?php echo $row['Price_Wupiupi'] ?></span>
 													</div>
 													<div class="grid-price ">
 														<span class="money ">Nova Crystals (Kilos): <?php echo $row['Price_NovaCrystal'] ?></span>
 													</div>
 												</div>
 											</div>

 										</div>
 										<div class="clearfix"></div>
 									</div>
 								</div>
 							</div>
 						</div>

					 <?php endwhile; ?>


						<!-- //mens -->
						<div class="clearfix"></div>

					</div>


					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- //js -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!-- /nav -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/demo1.js"></script>
	<!-- //nav -->
	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
	<!-- price range (top products) -->
	<script src="js/jquery-ui.js"></script>
	<script>
		//<![CDATA[
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>


</body>

</html>
