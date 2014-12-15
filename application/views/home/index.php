<!--Banner Block
<section class="banner-wrapper">
    <div class="banner-block container">
        <div class="flexslider">
            <ul class="slides">
                <li><img title="Banner" alt="Banner" src="/images/banner1.jpg"/></li>
                <li><img title="Banner" alt="Banner" src="/images/banner2.jpg"/></li>
                <li><img title="Banner" alt="Banner" src="/images/banner3.jpg"/></li>
                <li><img title="Banner" alt="Banner" src="/images/banner4.jpg"/></li>
            </ul>
        </div>
        <ul class="banner-add">
            <li class="add1"><a href="#" title=""><img title="add1" alt="add1" src="/images/static1.jpg"/></a></li>
            <li class="add2"><a href="#" title=""><img title="add2" alt="add2" src="/images/static2.jpg"/></a></li>
        </ul>
    </div>
</section>-->
<!--Content Block-->
<section class="content-wrapper">
    <div class="content-container container">
        <div class="heading-block">
            <h1>In de spotlight</h1>
            <!--<ul class="pagination">
                <li class="grid"><a href="#" title="Grid">Grid</a></li>
            </ul>-->
        </div>
        <div class="feature-block">
            <ul id="mix" class="product-grid" style="margin-left: 7px">
                <?php
                    $products = array_values($featuredproducts);
                    $count    = 0;
                    foreach($products as $product) {
                        if(null != $product) {
                            $count++;
                            print('<li class="' . $product['categorie'] . '">
									<div class="pro-img">
										<img title=" Product" alt="Product" src="/database/' . $product['image'] . '" width="170px" height=170px />
									</div>
									<div class="pro-hover-block">
                                        <h4 class="pro-name">' . $product['titel'] . '</h4>

                                        <div class="link-block">
                                            <a href="#quick-view-container" class="quickllook inline" title="Quick View" onclick="quickView(' . $product['id'] . ');return false;">Details</a>
                                        <div class="pro-price ' . $product['id'] . ' featured">&euro; ' . str_replace(".", ",", $product['prijs']) . '</div>
                                    </div></li>');
                        }
                        if($count == 4)
                            break;
                    }
                ?>
            </ul>
        </div>
        <div class="heading-block">
            <h1>In de aanbieding</h1>
        </div>
        <div class="new-product-block">
            <?php
                $products = array_values($saleproducts);
                print('<ul class="product-grid">');
                foreach($products as $product) {
                    if(null != $product) {
                        print('<li class="' . $product['categorie'] . '">
									<div class="pro-img">
										<img title=" Product" alt="Product" src="/database/' . $product['image'] . '" width="170px" height=170px />
									</div>
									<div class="pro-content"><p>' . $product['titel'] . '</p></div>
									<div class="pro-price">&euro; ' . str_replace(".", ",", $product['prijs']) . '</div>
									<div class="pro-line ' . $product['id'] . '" style="width: 43px; height: 47px; margin-top: -95px; margin-left: 95px; border-bottom: 2px solid red; -webkit-transform: translateY(20px) translateX(5px) rotate(-15deg); position: absolute; display: none"></div>
									<div class="pro-price ' . $product['id'] . ' second" style="margin-top: -25px; visibility: hidden">&euro;</div>
									<div class="pro-btn-block">
										<a class="add-cart left" title="Add to Cart" onclick="addToCart(' . $product['id'] . ');return false;">Toevoegen aan winkelmand</a>
										<a class="add-cart right quickCart inline" href="#quick-view-container" onclick="quickView(' . $product['id'] . ');return false;" title="Details">Details</a>
									</div>
									<div class="clearfix"></div></li>');
                    }
                }
                print('</ul>');
            ?>
            </ul>
        </div>
        <div class="heading-block">
            <h1>Nieuwe Producten</h1>
        </div>
        <div class="new-product-block">
            <?php
                $products = array_values($newestproducts);
                print('<ul class="product-grid">');
                foreach($products as $product) {
                    if(null != $product) {
                        print('<li class="' . $product['categorie'] . '">
									<div class="pro-img">
										<img title=" Product" alt="Product" src="/database/' . $product['image'] . '" width="170px" height=170px />
									</div>
									<div class="pro-content"><p>' . $product['titel'] . '</p></div>
									<div class="pro-price">&euro; ' . str_replace(".", ",", $product['prijs']) . '</div>
									<div class="pro-line ' . $product['id'] . '" style="width: 43px; height: 47px; margin-top: -95px; margin-left: 95px; border-bottom: 2px solid red; -webkit-transform: translateY(20px) translateX(5px) rotate(-15deg); position: absolute; display: none"></div>
									<div class="pro-price ' . $product['id'] . ' second" style="margin-top: -25px; visibility: hidden">&euro;</div>
									<div class="pro-btn-block">
										<a class="add-cart left" title="Add to Cart" onclick="addToCart(' . $product['id'] . ');return false;">Toevoegen aan winkelmand</a>
										<a class="add-cart right quickCart inline" href="#quick-view-container" onclick="quickView(' . $product['id'] . ');return false;" title="Details">Details</a>
									</div>
									<div class="clearfix"></div></li>');
                    }
                }
                print('</ul>');
            ?>
            </ul>
        </div>
    </div>
</section>
</div>
<!--Quick view Block-->
<script type="text/javascript">
    jQuery(function () {
        var tabContainers = jQuery('div.tabs > div');
        tabContainers.hide().filter(':first').show();
        jQuery('div.tabs ul.tabNavigation a').click(function () {
            tabContainers.hide();
            tabContainers.filter(this.hash).show();
            jQuery('div.tabs ul.tabNavigation a').removeClass('selected');
            jQuery(this).addClass('selected');
            return false;
        }).filter(':first').click();
    });
</script>
<article style="display:none;">
    <section id="quick-view-container" class="quick-view-wrapper">
        <div class="quick-view-container">
            <div class="quick-view-left">
                <h2 id="quick-view-title"></h2>

                <div class="product-img-box">
                    <p class="product-image">
                        <img src="/images/default_img.png" title="Image" alt="Image" height="170px" width="170px"
                             style="margin-left: 17px"/>
                    </p>
                </div>
            </div>
            <div class="quick-view-right tabs">
                <ul class="tab-block tabNavigation">
                    <li>
                        <a class="selected" title="Overview" href="#tabDetail">Overzicht</a>
                    </li>
                    <li>
                        <a title="Description" href="#tabDes">Beschrijving</a>
                    </li>
                </ul>
                <div id="tabDetail" class="tabDetail">
                    <div class="price-box">
                        <span class="price">&euro;0,00</span></div>
                    <div class="availability"></div>
                    <div class="add-to-cart-box">
                        <span class="qty-box">
                        <label for="qty">Aantal:</label>
                            <a class="prev" href="#" title="" id="qty-down">
                                <img alt="" title="" src="/images/qty_prev.png">
                            </a>
                            <input type="text" name="qty" class="input-text qty" id="qty" maxlength="12" value="1">
                            <a class="next" href="#" title="" id="qty-up">
                                <img alt="" title="" src="/images/qty_next.png">
                            </a>
                        </span>
                        <button title="Toevoegen aan winkelmand" class="form-button" style="font-size: 10px">
                            <span id="addtocartdetails">Toevoegen aan winkelmand</span>
                        </button>
                    </div>
                </div>
                <div id="tabDes" class="tabDes">
                    <p id="quick-view-description">

                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
</article>

<!--Quick view Block-->
<script type="text/javascript">
    jQuery(function () {
        var tabContainers = jQuery('div.tabs > div');
        tabContainers.hide().filter(':first').show();
        jQuery('div.tabs ul.tabNavigation a').click(function () {
            tabContainers.hide();
            tabContainers.filter(this.hash).show();
            jQuery('div.tabs ul.tabNavigation a').removeClass('selected');
            jQuery(this).addClass('selected');
            return false;
        }).filter(':first').click();
    });

    function quickView(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>store/itemdetails/',
            data: {
                id: id
            },
            success: function (resp) {
                var data = $.parseJSON(resp);

                $('#quick-view-description').html(data['beschrijving']);
                $('#quick-view-title').html(data['titel']);
                $('#tabDetail > .price-box > .price').html('&euro;' + parseFloat(data['prijs']).formatMoney(2));
                $('.product-image > img').attr("src", '/database/' + data['image']);
                $('#qty').val(1);
                $('#addtocartdetails').bind('click', function () {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>store/addtocart/',
                        data: {
                            id: data['id'],
                            qty: $('#qty').val()
                        },
                        success: function () {
                            updatecart();
                            $('#cboxClose').click();
                        }
                    });
                });

                if (parseInt(data['aantal']) > 0) {
                    $('#tabDetail > .availability').css('color', '#73B334');
                    $('#tabDetail > .availability').html("Nog <span id='qty-stock'>" + data['aantal'] + "</span> op vooraad.");
                } else {
                    $('#tabDetail > .availability').css('color', '#FA0234');
                    $('#tabDetail > .availability').html("Niet op vooraad.");
                }
            }
        });
    }

    $("#qty-down").click(function () {
        var value = parseInt($('#qty').val());
        if (value > 1) {
            $('#qty').val(value - 1);
        }

        return false;
    });

    $("#qty-up").click(function () {
        var value = parseInt($('#qty').val());
        $('#qty').val(value + 1);

        return false;
    });

    $("#qty").keyup(function () {
        var value = $('#qty').val();

        if (value < 1) {
            $('#qty').val(1);
        }
    });
</script>