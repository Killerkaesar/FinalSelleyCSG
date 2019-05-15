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
	<title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website Template | Single :: w3layouts</title>
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
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
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
	<?php

	$producto = $_POST['hola'];

	$result = mysqli_query($conn,"Select * from products where ID_Product = $producto");
	$row = mysqli_fetch_array($result);
	$name = $row['P_Name'];
	$Desc =	$row['Description'];
	$foto =	$row['Picture'];

	$Price_C =	$row['Price_Credits'];
	$Price_T =	$row['Price_Trugut'];
	$Price_N =	$row['Price_NovaCrystal'];
	$Price_W =	$row['Price_Wupiupi'];
	$Price_P =	$row['Price_Peggat'];
	$Stock =	$row['Stock'];
	$Origin =	$row['Origin'];
	$Category =	$row['Category'];
	$SubCat =	$row['SubCategory'];
?>

	<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">
		</div>
		<!-- //cart details -->
		<!-- search -->

		<!-- //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">

				<ul class="short">
					<li><a href="index.php">Home</a><i>|</i></li>
					<li></li>
				</ul>
			</div>
		</div>
		<!-- //banner_inner -->
	</div>

	<!-- //banner -->
	<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<!-- <li data-thumb="images/d1.jpg">
							<div class="thumb-image">  </div>
						</li> -->
						<li data-thumb="images/d2.jpg">
							<div class="thumb-image"> <?php echo "<img src='images/Pictures/Creatures/$foto' data-imagezoom='true' class='img-responsive'>"?> </div>
						</li>
						<!-- <ul class="slides">
							<li data-thumb="images/d2.jpg">
								<div class="thumb-image"> <img src="images/d2.jpg" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="images/d1.jpg">
								<div class="thumb-image"> <img src="images/d1.jpg" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="images/d3.jpg">
								<div class="thumb-image"> <img src="images/d3.jpg" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						</ul> -->
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
				<h3><?php echo $name ?></h3>
        <h4><?php echo $SubCat ?></h4>
				<p><span class="item_price"><?php echo 'Price in Credits: '.$Price_C ?></span>	</p>
				<p><span class="item_price"><?php echo 'Price in Truguts: '.$Price_T ?></span>	</p>
				<p><span class="item_price"><?php echo 'Price inPeggat: '.$Price_P ?></span>	</p>
				<p><span class="item_price"><?php echo 'Price in Wupiupi: '.$Price_W ?></span>	</p>
				<p><span class="item_price"><?php echo 'Price in Nova Crystals: '.$Price_N ?></span>	</p>
				<div class="description">
				</div>
				<?php
				if(isset($_SESSION['sess_user'])){
              if($row['Stock']>0){
                echo "<form class='form-inline' action='./addCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['ID_Product']}'</input>";
                echo "<button type='submit' class='btn btn-primary'>Add to cart</button>";
                echo "<div class='form-group'><h5> &nbsp&nbsp&nbsp Cantidad: &nbsp</h5><input type='number' name='cantidad' min=1 max={$row['Stock']} value=1 class='form-control'></div></form>";
              }
            }
				 ?>


			</div>
			<div class="clearfix"> </div>
			<!--/tabs-->
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Description</li>
						<li>Origin</li>
						<li>Stock</li>
					</ul>
					<div class="resp-tabs-container">
						<!--/tab_one-->
						<div class="tab1">

							<div class="single_page">
								<h6><?php echo $SubCat ?></h6>
								<p><?php echo $Desc ?></p>
							</div>
						</div>
						<!--//tab_one-->
						<div class="tab2">

							<div class="single_page">
								<h6><?php echo $Origin ?></h6>
							</div>
						</div>
						<div class="tab3">

							<div class="single_page">
								<h6><?php echo $Stock ?></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--//tabs-->
			<!-- /new_arrivals -->

			<!--//new_arrivals-->


		</div>
	</div>
	<!-- //top products -->

	<!-- /newsletter-->

	</div>
	<!-- //footer -->
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
	<!-- single -->
	<script src="js/imagezoom.js"></script>
	<!-- single -->
	<!-- script for responsive tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
	</script>
	<!-- FlexSlider -->
	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
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
