<!--Content Block-->
<section class="content-wrapper">
    <div class="content-container container">
        <div class="col-1-layout">
            <ul class="shopping-cart-table" id="items">

            </ul>
            <div class="update-shopping-cart">
                <button class="colors-btn">Winkelwagen bijwerken</button>
            </div>
            <div class="shopping-cart-totals">
                <div class="subtotal-row notax">
                    <div class="left">Prijs</div>
                    <div class="right">&euro;0,00</div>
                </div>
                <div class="subtotal-row tax">
                    <div class="left">Btw</div>
                    <div class="right">&euro;0,00</div>
                </div>
                <div class="grand-row">
                    <div class="left">Totaal prijs</div>
                    <div class="right">&euro;0,00</div>
                </div>
                <ul class="checkout-types">
                    <li>
                        <button class="colors-btn" title="Afrekenen">Afrekenen</button>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
</section>
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
                    totalprice = totalprice + (parseInt(this['qty']) * parseInt(this['price']));

                    items += '<li>' +
                    '<div class="img-box">' +
                    '<img src="/images//small_img.png" width="70px" height="70px" title="" alt=""/>' +
                    '</div>' +
                    '<div class="remove-item-btn">' +
                    '<a href="#" title="Remove">' +
                    '<img src="/images/delete_item_btn.png" title="Remove" alt="Remove"/>' +
                    '</a>' +
                    '</div>' +
                    '<div class="pro-name">' + this["name"] + '</div>' +
                    '<div class="pro-description">' + this["description"] + '</div>' +
                    '<div class="pro-qty">' +
                    '<input type="text" value="' + this["qty"] + '"/>' +
                    '</div>' +
                    '<div class="pro-price">&euro;' + (parseInt(this['qty']) * parseInt(this['price'])).formatMoney(2) + '</div>' +
                    '</li>'
                });

                $('.shopping-cart-totals > .notax > .right').html('&euro;' + (totalprice * 0.79).formatMoney(2));
                $('.shopping-cart-totals > .tax > .right').html('&euro;' + (totalprice * 0.21).formatMoney(2));
                $('.shopping-cart-totals > .grand-row > .right').html('&euro;' + totalprice.formatMoney(2));
                $('#items').html(items);
            }
        });
    }
    updatecart();
</script>