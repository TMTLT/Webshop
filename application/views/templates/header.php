<!doctype html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en">
<![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en">
<![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en">
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
   <!-- Meta -->
   <meta charset="utf-8">
   <!-- Title -->
   <title><?=(isset($title) ? $title : 'Geen titel')?> Mo's webshop</title>
   <!-- JS -->
   <script src="js/jquery-1.8.2.min.js"></script>
   <script src="js/common.js"></script>
   <script src="js/jquery.easing.1.3.js"></script>
   <script src="js/ddsmoothmenu.js"></script>
   <script src="js/jquery.flexslider.js"></script>
   <script src="js/jquery.elastislide.js"></script>
   <script src="js/jquery.jcarousel.min.js"></script>
   <script src="js/jquery.accordion.js"></script>
   <script src="js/light_box.js"></script>
   <script type="text/javascript">$(document).ready(function(){$(".inline").colorbox({inline:true, width:"50%"});});</script>
   <!-- Mobile Meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <!-- CSS -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/colors.css">
   <link rel="stylesheet" href="css/skeleton.css">
   <link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/ddsmoothmenu.css"/>
   <link rel="stylesheet" href="css/elastislide.css"/>
   <link rel="stylesheet" href="css/home_flexslider.css"/>
   <link rel="stylesheet" href="css/light_box.css"/>
   <link href="../../../html5shiv.googlecode.com/svn/trunk/html5.js">
   <!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
   <!--[if lt IE 9]>
   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<body>
   <div class="mainContainer sixteen container">
   <!--Header Block-->
   <div class="header-wrapper">
	  <header class="container">
		 <div class="head-right">
			<ul class="top-nav">
			   <li class=""><a href="404_error.html" title="My Account">My Account</a></li>
			   <li class="my-wishlist"><a href="404_error.html" title="My Wishlist">My Wishlist</a></li>
			   <li class="contact-us"><a href="contact_us.html" title="Contact Us">Contact Us</a></li>
			   <li class="checkout"><a href="404_error.html" title="Checkout">Checkout</a></li>
			   <li class="log-in"><a href="account_login.html" title="Log In">Log In</a></li>
			</ul>
			<section class="header-bottom">
			   <div class="cart-block">
				  <ul>
					 <li>(2)</li>
					 <li><a href="cart.html" title="Cart"><img title="Item" alt="Item" src="images/item_icon.png" /></a></li>
					 <li>Item</li>
				  </ul>
				  <div id="minicart" class="remain_cart" style="display: none;">
					 <p class="empty">You have 2 items in your shopping cart.</p>
					 <ol>
						<li>
						   <div class="img-block"><img src="images/small_img.png" title="" alt="" /></div>
						   <div class="detail-block">
							  <h4><a href="#" title="Htc Mobile 1120">Htc Mobile 1120</a></h4>
							  <p>
								 <strong>1</strong> x $900.00
							  </p>
							  <a href="#" title="Details">Details</a>
						   </div>
						   <div class="edit-delete-block">
							  <a href="#" title="Edit"><img src="images/edit_icon.png" alt="Edit" title="Edit" /></a>
							  <a href="#" title="Remove"><img src="images/delete_item_btn.png" alt="Remove" title="Remove" /></a>
						   </div>
						</li>
						<li>
						   <div class="img-block"><img src="images/small_img.png" title="" alt="" /></div>
						   <div class="detail-block">
							  <h4><a href="#" title="Htc Mobile 1120">Htc Mobile 1120</a></h4>
							  <p>
								 <strong>1</strong> x $900.00
							  </p>
							  <a href="#" title="Details">Details</a>
						   </div>
						   <div class="edit-delete-block">
							  <a href="#" title="Edit"><img src="images/edit_icon.png" alt="Edit" title="Edit" /></a>
							  <a href="#" title="Remove"><img src="images/delete_item_btn.png" alt="Remove" title="Remove" /></a>
						   </div>
						</li>
						<li>
						   <div class="total-block">Total:<span>$1,900.00</span></div>
						   <a href="cart.html" title="Checkout" class="colors-btn">Checkout</a>
						   <div class="clear"></div>
						</li>
					 </ol>
				  </div>
			   </div>
			   <div class="search-block">
				  <input type="text" value="Search" />
				  <input type="submit" value="Search" title="Search" />
			   </div>
			</section>
		 </div>
		 <h1 class="logo"><a href="index-2.html" title="Logo">
			<img title="Logo" alt="Logo" src="images/logo.png" />
			</a>
		 </h1>
		 <nav id="smoothmenu1" class="ddsmoothmenu mainMenu">
			<ul id="nav">
			   <li class="active"><a href="index-2.html" title="Home">Home</a></li>
			   <li class="">
				  <a href="category.html" title="Shop by">Shop by</a>
				  <ul>
					 <li><a href="category.html">Woman Collection</a></li>
					 <li><a href="category.html">Men Collection</a></li>
					 <li><a href="category.html">Accessories</a></li>
					 <li>
						<a href="category.html">Mobile</a>
						<ul>
						   <li><a href="category.html">Second level</a></li>
						   <li><a href="category.html">Second level</a></li>
						   <li><a href="category.html">Second level</a></li>
						   <li><a href="category.html">Second level</a></li>
						   <li><a href="category.html">Second level</a></li>
						   <li><a href="category.html">Second level</a></li>
						</ul>
					 </li>
					 <li><a href="category.html">Shoes</a></li>
					 <li><a href="category.html">Others</a></li>
				  </ul>
			   </li>
			   <li class=""><a href="blog.html" title="Blog">Blog</a></li>
			   <li class=""><a href="faq.html" title="Faq">Faq</a></li>
			   <li class=""><a href="about_us.html" title="About us">About us</a></li>
			   <li class=""><a href="404_error.html" title="Pages">Pages</a></li>
			   <li class=""><a href="contact_us.html" title="Footwear">Contact us</a></li>
			</ul>
		 </nav>
		 <div class="mobMenu">
			<h1>
			   <span>Menu</span>
			   <a class="menuBox highlight" href="javascript:void(0);">ccc</a>
			   <span class="clearfix"></span>
			</h1>
			<div id="menuInnner" style="display:none;">
			   <ul class="accordion">
				  <li class="active"><a href="index-2.html" title="Home">Home</a></li>
				  <li class="parent">
					 <a href="category.html" title="Shop by">Shop by</a>
					 <ul>
						<li><a href="category.html">Woman Collection</a></li>
						<li><a href="category.html">Men Collection</a></li>
						<li><a href="category.html">Accessories</a></li>
						<li>
						   <a href="category.html">Mobile</a>
						   <ul>
							  <li><a href="category.html">Second level</a></li>
							  <li><a href="category.html">Second level</a></li>
							  <li><a href="category.html">Second level</a></li>
							  <li><a href="category.html">Second level</a></li>
							  <li><a href="category.html">Second level</a></li>
							  <li><a href="category.html">Second level</a></li>
						   </ul>
						</li>
						<li><a href="category.html">Shoes</a></li>
						<li><a href="category.html">Others</a></li>
					 </ul>
				  </li>
				  <li class=""><a href="blog.html" title="Blog">Blog</a></li>
				  <li class=""><a href="faq.html" title="Faq">Faq</a></li>
				  <li class=""><a href="about_us.html" title="About us">About us</a></li>
				  <li class=""><a href="404_error.html" title="Pages">Pages</a></li>
				  <li class=""><a href="contact_us.html" title="Footwear">Contact us</a></li>
				  <span class="clearfix"></span>
			   </ul>
			</div>
		 </div>
	  </header>
   </div>
   <!--Banner Block-->
   <section class="banner-wrapper">
	  <div class="banner-block container">
		 <div class="flexslider">
			<ul class="slides">
			   <li><img title="Banner" alt="Banner" src="images/banner1.jpg" /></li>
			   <li><img title="Banner" alt="Banner" src="images/banner2.jpg" /></li>
			   <li><img title="Banner" alt="Banner" src="images/banner3.jpg" /></li>
			   <li><img title="Banner" alt="Banner" src="images/banner4.jpg" /></li>
			</ul>
		 </div>
		 <ul class="banner-add">
			<li class="add1"><a href="#" title=""><img title="add1" alt="add1" src="images/static1.jpg" /></a></li>
			<li class="add2"><a href="#" title=""><img title="add2" alt="add2" src="images/static2.jpg" /></a></li>
		 </ul>
	  </div>
   </section>