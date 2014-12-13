<!--Content Block-->
<section class="content-wrapper">
    <div class="content-container container">
        <div class="col-left">
            <div class="block man-block">
                <div class="block-title">Opties</div>
                <ul>
                    <li><a href="/settings/admin" title="">Producten toevogen</a></li>
                </ul>
            </div>
        </div>
        <div class="col-main">

            <h1 class="page-title">Product toevoegen</h1>

            <div class="contact-form-container">
                <?php
                    $data = array(
                        'id' => 'addProductsForm'
                    );
                    echo form_open('', $data);
                ?>
                <div class="form-title">
                    <div class="error">test</div>
                </div>
                <ul class="form-fields">
                    <li class="left">
                        <label for='name'>Product naam</label>

                        <p>
                            <input type='text' name='name' id="name">
                        </p>
                    </li>
                    <li class="left">
                        <label for='price'>Prijs</label>

                        <P>
                            <input type='text' name='price' id="price">
                        </p>
                    </li>
                    <li class="left">
                        <label for='category'>Categorie</label>

                        <P>
                            <input type='text' name='category' id="category">
                        </p>
                    </li>
                    <li class="full-row">
                        <p>
                            <label for='description'>Beschrijving</label>

                        <p>
                            <textarea name='description' id="description"></textarea>
                        </p>
                    </li>
                    <div class="button-set">
                        <input type='submit' name='submit' value='Toevoegen' class="form-button"/>
                    </div>
                </ul>
                </form>

            </div>
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

    $("#addProductsForm").submit(function (event) {
        event.preventDefault();

        $(".error").html("");

        var name = checkEmpty('name');
        var priceval = checkEmpty('price');
        var category = checkEmpty('category');
        var description = checkEmpty('description');
        var price = validatePrice();

        if (!name || !priceval || !category || !description || !price) {
            if (!name) {
                $(".error").append("U hebt geen product naam ingevuld <br />");
            }
            if (!priceval) {
                $(".error").append("U hebt geen prijs ingevuld <br />");
            }
            if (priceval && !price) {
                $(".error").append("U hebt geen geldige prijs ingevuld <br />");
            }
            if (!category) {
                $(".error").append("U hebt geen categorie geselecteerd <br />");
            }
            if (!description) {
                $(".error").append("U hebt geen beschrijving ingevuld <br />");
            }
            $(".error").show(300);
        } else {
            var email = $("#email_address").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>settings/addproduct',
                data: {
                    name: $("#name").val(),
                    price: $("#price").val(),
                    category: $("#category").val(),
                    description: $("#description").val()
                },
                success: function (resp) {
                    console.log(resp);
                }
            });
        }
    });
</script>