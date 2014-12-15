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
                            <td style=padding:10px; text-align:right;">Prijs : &euro;'.number_format($product['price'], 2, '.', '.').'</td>
                            <td style=padding:10px; text-align:right;">Totaal : &euro;'.number_format(($product['price'] * $product['quantity']), 2, '.', '.').'</td></tr>');
                    }
                    ?>
                    </table>
                <div class="shopping-cart-collaterals">
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
                    <div class="subtotal-row notax">
                        <div class="left">Prijs</div>
                        <div class="right">&euro;<?=number_format(($orderDetails['total'] * 0.79), 2, '.', '.')?></div>
                    </div>
                    <div class="subtotal-row tax">
                        <div class="left">Btw</div>
                        <div class="right">&euro;<?=number_format(($orderDetails['total'] * 0.21), 2, '.', '.')?></div>
                    </div>
                    <div class="grand-row">
                        <div class="left">Totaal prijs</div>
                        <div class="right">&euro;<?=number_format($orderDetails['total'], 2, '.', '.')?></div>
                    </div>
                    <ul class="checkout-types">
                        <li>
                            <button class="colors-btn" title="Afrekenen" type="submit">Afrekenen</button>
                        </li>
                    </ul>
                </div>
            </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </section>
</div>