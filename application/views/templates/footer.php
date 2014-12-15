<script type="application/javascript">
    (function($) {
        $.fn.invisible = function() {
            return this.each(function() {
                $(this).css("visibility", "hidden");
            });
        };
        $.fn.visible = function() {
            return this.each(function() {
                $(this).css("visibility", "visible");
            });
        };
    }(jQuery));

    $.get('<?php echo base_url(); ?>store/onsale/', function(resp) {
        console.log(resp);
        var data = $.parseJSON(resp);
        console.log(data);
        $.each(data, function () {
                console.log(this['id']);
                console.log(this['productid']);
                console.log(this['prijs']);

            $('.pro-line.' + this['productid']).show();
            $('.pro-price.' + this['productid'] + '.second').html('&euro; ' + parseFloat(this['prijs']).formatMoney(2));
            $('.pro-price.' + this['productid'] + '.second').visible();


        });
    });
</script>

<!--Footer Block-->
<section class="footer-wrapper">
    <footer class="container">
        <div class="link-block">
            <ul>
                <li class="link-title"><a href="/about/" title="ABOUT US">OVER ONS</a></li>
                <li><a href="/about/" title="Over ons">Over ons</a></li>
                <li><a href="#" title="Klantenservice">Klantenservice</a></li>
                <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
            </ul>
            <ul>
                <li class="link-title"><a href="#" title="CUSTOMER SERVICES">KLANTENSERVICE</a></li>
                <li><a href="#" title="Verzending & retour sturen">Verzending & retour sturen</a></li>
                <li><a href="#" title="Veilig winkelen">Veilig winkelen</a></li>
                <li><a href="/contact/" title="Neem contact op">Neem contact op</a></li>
            </ul>
            <ul>
                <li class="link-title"><a href="#" title="ALGEMENE VOORWAARDEN">ALGEMENE VOORWAARDEN</a></li>
                <li><a href="#" title="Pers">Pers</a></li>
                <li><a href="#" title="Hulp">Hulp</a></li>
                <li><a href="#" title="Algemene voorwaarden">Algemene voorwaarden</a></li>
            </ul>
            <ul>
                <li class="link-title"><a href="#" title="ABOUTUS">OVER ONS</a></li>
                <li class="aboutus-block">Thema opdracht webshop van Owain, Mies en Sek<br/><a href="/about/"
                                                                                               title="read more">Lees
                        meer</a></li>
            </ul>
            <ul class="stay-connected-blcok">
                <li class="link-title"><a href="#" title="VOLG ONS :">VOLG ONS : </a></li>
                <li>
                    <ul class="social-links">
                        <li><a data-tooltip="Like us on facebook" href="#"><img alt="facebook"
                                                                                src="/images/facebook.png"></a></li>
                        <li><a data-tooltip="Follow us on twitter" href="#"><img alt="twitter"
                                                                                 src="/images/twitter.png"></a></li>
                    </ul>
                    <div class="payment-block"><img src="/images/payment.png" alt="payment"></div>
                </li>
            </ul>
        </div>
        <div class="footer-bottom-block">
            <ul class="bottom-links">
                <li><a href="/index-2.html" title="Home">HOME</a></li>
                <li><a href="#" title="Paginas">PAGINAS</a></li>
                <li><a href="/about/" title="Over ons">OVER ONS</a></li>
                <li><a href="/contact/" title="Contact">CONTACT</a></li>
            </ul>
            <p class="copyright-block">&copy; 2014 MO's Webshop, All Rights Reserved.</p>
        </div>
    </footer>
</section>
</body>
</html>