<!--Content Block-->
<section class="content-wrapper">
    <div class="content-container container">
        <div class="col-left">
            <div class="block man-block">
                <div class="block-title">Categories</div>
                <ul>
                    <?php
                        foreach($categories as $category)
                            print('<li><a href="/store/category/' . $category->titel . '">' . $category->titel . '</a></li>');
                    ?>
                </ul>
            </div>
            <div class="paypal-block">
                <a href="#" title="Paypal"><img src="/images/paypal_img.png" title="Paypal" alt="Paypal"/></a>
            </div>
        </div>
        <div class="col-main">
            <div class="category-banner"><img src="/images/sunglass.jpg" title="Banner" alt="Banner"/></div>
            <div class="pager-container">
                <div class="pager">
                    <div class="show-items">6 Item(s)</div>
                    <div class="show-per-page"><label>Show</label> <select>
                            <option>09</option>
                        </select></div>
                </div>
                <div class="view-by-block">
                    <ul class="view-by">
                        <li>View as:</li>
                        <li><a href="#" title="Grid" class="grid">Grid</a></li>
                        <li><a href="#" title="List" class="list">List</a></li>
                    </ul>
                    <div class="short-by">
                        <label>Sort By</label><select>
                            <option>Position</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="new-product-block">
                <?php
                    $products = array_values($products);

                    $counter = 0;
                    print('<ul class="product-grid">');
                    foreach($products as $product) {
                        if(null != $product) {
                            print('<li class="' . $product['categorie'] . '">
									<div class="pro-img">
										<img title="Freature Product" alt="Freature Product" src="/images/default_img.png" />
									</div>
									<div class="pro-content"><p>' . $product['titel'] . '</p></div>
									<div class="pro-price">&euro; ' . str_replace(".", ",", $product['prijs']) . '</div>
									<div class="pro-btn-block">
										<a class="add-cart left" title="Add to Cart" onclick="addToCart(' . $product['id'] . ');return false;">Toevoegen aan winkelmand</a>
										<a class="add-cart right quickCart inline" href="#quick-view-container" onclick="quickView(' . $product['id'] . ');return false;" title="Details">Details</a>
									</div>
									<div class="clearfix"></div></li>');
                            $counter += 1;
                        }

                        if($counter > 2) {
                            print('</ul>');
                            print('<ul class="product-grid">');
                            $counter = 0;
                        }
                    }
                    print('</ul>');
                ?>
                </ul>

                <script type="text/javascript">
                    function addToCart(id) {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url(); ?>store/addtocart/',
                            data: {
                                id: id,
                                qty: 1
                            },
                            success: function () {
                                updatecart();
                            }
                        });
                    }
                </script>

                <div class="clearfix"></div>
                <div class="news-letter-container">
                    <div class="free-shipping-block">
                        <h1>ENJOY FREE SHIPPING</h1>

                        <p>on all orders as our holiday gift for you!</p>
                    </div>
                    <div class="news-letter-block">
                        <h2>SIGN UP FOR OUR NEWSLETTER</h2>
                        <input type="text" value="Enter email address" title=""/>
                        <input type="submit" value="Submit" title="Submit"/>
                    </div>
                </div>
            </div>
</section>
</div>
<article style="display:none;">
    <section id="quick-view-container" class="quick-view-wrapper">
        <div class="quick-view-container">
            <div class="quick-view-left">
                <h2 id="quick-view-title"></h2>

                <div class="product-img-box">
                    <p class="product-image">
                        <img src="/images/default_img.png" title="Image" alt="Image" height="170px" width="170px" style="margin-left: 17px" />
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
                $('#qty').val(1);
                $('#addtocartdetails').bind('click', function() {
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

    $("#qty-down").click(function() {
        var value = parseInt($('#qty').val());
        if (value > 1) {
            $('#qty').val(value - 1);
        }

        return false;
    });

    $("#qty-up").click(function() {
        var value = parseInt($('#qty').val());
        $('#qty').val(value + 1);

        return false;
    });

    $("#qty").keyup(function() {
        var value = $('#qty').val();

        if (value < 1) {
            $('#qty').val(1);
        }
    });
</script>