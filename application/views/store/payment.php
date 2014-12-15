<!--Content Block-->
    <section class="content-wrapper">
        <div class="content-container container">
            <div class="col-1-layout" style="padding-bottom:20px;">
                    <table style="width:100%;">
                    <?php
                    foreach($orderDetails['products'] as $product){
                        //print_r($product);
                        print('<tr><td class="pro-name" style=padding:10px;>'.$product['titel'].'</td>
                            <td style="padding:10px; text-align:right;">Hoeveelheid : '.$product['quantity'].'</td>
                            <td style=padding:10px; text-align:right;">Prijs : '.$product['price'].'</td>
                            <td style=padding:10px; text-align:right;">Totaal : '.($product['price'] * $product['quantity']).'</td></tr>');
                    }
                    ?>
                    </table>
                <div class="shopping-cart-collaterals">
                    <div class="cart-box">
                        <div class="box-title">Discount Codes</div>
                        <div class="box-content"><p>Enter your coupon code if you have one.</p></div>
                        <button class="colors-btn" title="Apply Coupon">Apply Coupon</button>
                    </div>
                    <div class="cart-box">
                        <div class="box-title">Betalingswijze</div>
                        <div class="box-content">
                            <p>Selecteer hieronder uw bank</p>
                            <ul>
                                <li>
                                    <label>Bank<em>*</em></label>
                                    <select>
                                        <option>United States</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <button class="colors-btn" title="Get a Quote">Get a Quote</button>
                    </div>
                </div>
                <div class="shopping-cart-totals">
                    <div class="subtotal-row">
                        <div class="left">Subtotal</div>
                        <div class="right">$1,000,00</div>
                    </div>
                    <div class="grand-row">
                        <div class="left">Grand Total</div>
                        <div class="right">$1,000.00</div>
                    </div>
                    <ul class="checkout-types">
                        <li>
                            <button class="colors-btn" title="Proceed to Checkout">Proceed to Checkout</button>
                        </li>
                    </ul>
                </div>     
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
</div>