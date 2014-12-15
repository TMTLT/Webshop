<!--Content Block-->
<section class="content-wrapper">
    <div class="content-container container">
        <div class="col-left">
            <div class="block man-block">
                <div class="block-title">Opties</div>
                <ul>
                    <li><a href="/settings/addproduct" title="">Producten toevoegen</a></li>
                    <li><a href="/settings/addcategory" title="">Categorie toevoegen</a></li>
                    <li><a href="/settings/addsale" title="">Aanbieding toevoegen</a></li>
                </ul>
            </div>
        </div>
        <div class="col-main">

            <h1 class="page-title">Aanbieding toevoegen</h1>

            <div class="contact-form-container">
                <?php
                    $data = array(
                        'id' => 'addSaleForm'
                    );
                    echo form_open('', $data);
                ?>
                <div class="form-title">
                    <div class="error">test</div>
                    <div class="success">De aanbieding is toegevoegd!
                    </div>
                </div>
                <ul class="form-fields">
                    <li class="left">
                        <label for='description'>Selecteer product</label>

                        <p>
                            <select style="width: 270px;height: 35px;float: left;border: 1px solid #B4B4B4;padding: 8px 6px 7px;font-size: 11px;color: #5F5F5F;">
                                <?php
                                    foreach($products as $product)
                                        print('<option value="' . $product['id'] .  '">' . $product['titel'] .  ' (&euro;' . str_replace(".", ",", $product['prijs']) . ')</option>');
                                ?>
                            </select>
                        </p>
                    </li>
                    <li class="left">
                        <label for='name'>Nieuwe prijs</label>

                        <p>
                            <input type='text' name='price' id="price">
                        </p>
                    </li>
                    <div class="button-set">
                        <input type='submit' name='submit' value='Toevoegen' class="form-button"/>
                    </div>
                </ul>
                </form>

            </div>
            <div class="clearfix"></div>
        </div>
</section>
</div>

<script>
    function validatePrice() {
        var email = $("#price").val();
        var regex = /^([1-9][0-9]*|0)(\,[0-9]{2})?$/;

        return regex.test(email);
    }

    function checkEmpty(field) {
        var fieldVal = $("#" + field).val();
        if (fieldVal == null || fieldVal == "") {
            return false;
        }
        return true;
    }

    $("#addSaleForm").submit(function (event) {
        event.preventDefault();

        $(".error").html("");

        var priceval = checkEmpty('price');
        var price = validatePrice();

        if (!priceval || !price) {
            if (priceval && !price) {
                $(".error").append("U hebt geen geldige prijs ingevuld <br />");
            }
            $(".error").show(300);
        } else {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>settings/addsalepost',
                data: {
                    id: $('select').val(),
                    price: $("#price").val()
                },
                success: function (resp) {
                    if (resp == 1) {
                        document.getElementById("addSaleForm").reset();
                        $('.success').show(300);
                    }
                }
            });
        }
    });
</script>