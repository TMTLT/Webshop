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
    <title><?= (isset($title) ? $title : 'Geen titel') ?> | Mo's webshop</title>
    <!-- JS -->
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script src="/js/common.js"></script>
    <script src="/js/jquery.easing.1.3.js"></script>
    <script src="/js/ddsmoothmenu.js"></script>
    <script src="/js/jquery.flexslider.js"></script>
    <script src="/js/jquery.elastislide.js"></script>
    <script src="/js/jquery.jcarousel.min.js"></script>
    <script src="/js/jquery.accordion.js"></script>
    <script src="/js/light_box.js"></script>
    <script src="/js/jquery.color.js"></script>
    <script src="/js/jquery.Jcrop.min.js"></script>
    <script type="text/javascript">$(document).ready(function () {
            $(".inline").colorbox({inline: true, width: "50%"});
        });</script>
    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/colors.css">
    <link rel="stylesheet" href="/css/skeleton.css">
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/ddsmoothmenu.css"/>
    <link rel="stylesheet" href="/css/elastislide.css"/>
    <link rel="stylesheet" href="/css/home_flexslider.css"/>
    <link rel="stylesheet" href="/css/light_box.css"/>
    <link rel="stylesheet" href="/css/jquery.Jcrop.min.css"/>
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
                    <?php if ($loggedin) { ?>
                        <li class=""><a href="/account/" title="Mijn account">Mijn account</a></li>
                    <?php } ?>
                    <li class="contact-us"><a href="/contact/" title="Contact">Neem contact op</a></li>
                    <li class="checkout"><a href="/store/checkout" title="Afrekenen">Afrekenen</a></li>
                    <?php if (isset($admin) && $admin) { ?>
                        <li class="log-in"><a href="/settings/addproduct" title="Admin paneel">Admin paneel</a></li>
                    <?php } if (!$loggedin) { ?>
                        <li class="log-in"><a href="/account/login" title="Log In">Log In</a></li>
                    <?php } else { ?>
                        <li class="log-in"><a href="/account/signout" title="Uitloggen">Uitloggen</a></li>
                    <?php } ?>
                </ul>
                <section class="header-bottom">
                    <div class="cart-block">
                        <ul>
                            <li id="cartamount">(0)</li>
                            <li><a href="/store/checkout" title="Cart"><img title="Item" alt="Item"
                                                                        src="/images/item_icon.png"/></a></li>
                            <li>Item</li>
                        </ul>
                        <div id="minicart" class="remain_cart" style="display: none;">
                            <ol id="cartitems">
                                <li>
                                    <div class="total-block">Totaal:<span id="carttotal">&euro;0,00</span></div>
                                    <a href="/store/checkout" title="Checkout" class="colors-btn">Afrekenen</a>

                                    <div class="clear"></div>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <script type="text/javascript">
                        Number.prototype.formatMoney = function (c, d, t) {
                            var n = this,
                                c = isNaN(c = Math.abs(c)) ? 2 : c,
                                d = d == undefined ? "," : d,
                                t = t == undefined ? "." : t,
                                s = n < 0 ? "-" : "",
                                i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
                                j = (j = i.length) > 3 ? j % 3 : 0;
                            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
                        };

                        function updatecart() {
                            $.ajax({
                                url: '<?php echo base_url(); ?>store/cartcontent/',
                                success: function (resp) {
                                    var data = $.parseJSON(resp);
                                    var items = '';
                                    var qty = 0, totalprice = 0;

                                    $.each(data, function () {
                                        items += '<li class="item">' +
                                        '<div class="img-block">' +
                                        '<img src="/database/' +  this["image"] + '" width="77px" height=77px title="" alt="" />' +
                                        '</div>' +
                                        '<div class="detail-block">' +
                                        '<h4><a href="/#" title="' + this["name"] + '">' + this["name"] + '</a></h4>' +
                                        '<p>' +
                                        '<strong>' + this["qty"] + '</strong> x ' + this["price"] +
                                        '</p>' +
                                        '</div>' +
                                        '</li>';

                                        qty = qty + parseFloat(this['qty']);
                                        totalprice = totalprice + (parseFloat(this['qty']) * parseFloat(this['price']));
                                    });

                                    $('#cartamount').html('(' + qty + ')');
                                    $('#carttotal').html(' &euro;' + totalprice.formatMoney(2));
                                    $('#cartitems > .item').remove();
                                    $('#cartitems').prepend(items);

                                }
                            });
                        }
                        updatecart();
                    </script>

                    <div class="search-block">
                        <input type="text" value="Search"/>
                        <input type="submit" value="Search" title="Search"/>
                    </div>
                </section>
            </div>
            <h1 class="logo"><a href="/home" title="Logo">
                    <img title="Logo" alt="Logo" src="/images/logo.png"/>
                </a>
            </h1>
            <nav id="smoothmenu1" class="ddsmoothmenu mainMenu">
                <ul id="nav">
                    <li class=""><a href="/home" title="Home">Home</a></li>
                    <li class="">
                        <a href="/store" title="Winkel">Winkel</a>
                        <ul>
                            <?php
                                foreach($categories as $category)
                                    print('<li><a href="/store/category/' . $category->titel . '">' . $category->titel . '</a></li>');
                            ?>
                        </ul>
                    <li class=""><a href="/about/blog" title="Blog">Blog</a></li>
                    <li class=""><a href="/about/faq" title="Faq">FAQ</a></li>
                    <li class=""><a href="/about" title="About us">Over ons</a></li>
                    <li class=""><a href="/contact" title="Contact">Neem contact op</a></li>
                </ul>
            </nav>
            <div class="mobMenu">
                <h1>
                    <span>Menu</span>
                    <a class="menuBox highlight" href="/javascript:void(0);">ccc</a>
                    <span class="clearfix"></span>
                </h1>

                <div id="menuInnner" style="display:none;">
                    <ul class="accordion">
                        <li class="active"><a href="/home" title="Home">Home</a></li>
                        <li class="parent">
                            <a href="/store" title="Winkel">Winkel</a>
                            <ul>
                                <li><a href="/category.html">Woman Collection</a></li>
                                <li><a href="/category.html">Men Collection</a></li>
                                <li><a href="/category.html">Accessories</a></li>
                                <li>
                                    <a href="/category.html">Mobile</a>
                                    <ul>
                                        <li><a href="/category.html">Second level</a></li>
                                        <li><a href="/category.html">Second level</a></li>
                                        <li><a href="/category.html">Second level</a></li>
                                        <li><a href="/category.html">Second level</a></li>
                                        <li><a href="/category.html">Second level</a></li>
                                        <li><a href="/category.html">Second level</a></li>
                                    </ul>
                                </li>
                                <li><a href="/category.html">Shoes</a></li>
                                <li><a href="/category.html">Others</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="/about/blog" title="Blog">Blog</a></li>
                        <li class=""><a href="/about/faq" title="Faq">FAQ</a></li>
                        <li class=""><a href="/about" title="About us">Over ons</a></li>
                        <li class=""><a href="/contact" title="Contact">Neem contact op</a></li>
                        <span class="clearfix"></span>
                    </ul>
                </div>
            </div>
        </header>
    </div>
</div>