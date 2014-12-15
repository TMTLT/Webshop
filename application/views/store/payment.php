<!--Content Block-->
    <section class="content-wrapper">
        <div class="content-container container">
            <form method="post">
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
                                    <select name="bank">
                                    <?php 
                                    foreach($payme['banklist'] as $bankid=>$bankname)
                                        print('<option value="'.$bankid.'">'.$bankname.'</option>');
                                    ?>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shopping-cart-totals">
                    <div class="grand-row">
                        <div class="left">Totaal</div>
                        <div class="right"><?=$orderDetails['total']?></div>
                    </div>
                    <ul class="checkout-types">
                        <li>
                            <button class="colors-btn" title="Proceed to Checkout" type="submit">Proceed to Checkout</button>
                        </li>
                    </ul>
                </div>     
            </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </section>
</div>