<!--Content Block-->
<section class="content-wrapper">
    <div class="content-container container">
        <div class="main">
            <h1 class="page-title">Login or maak een account</h1>

            <div class="account-login">
                <div class="col-1 new-users">
                    <div class="content">
                        <h2>Nieuwe gebruikers</h2>

                        <p>Met een account kunt u gebruik maken van onze webshop, gemaakte bestellingen inzien en volgen
                            en tal van andere voordelen genieten.</p>
                    </div>
                    <div class="buttons-set">
                        <a class="colors-btn" title="Create an Account" href="/account/create"><span><span>Maak een account</span></span></a>

                        <div class="clear"></div>
                    </div>
                </div>
                <div class="col-2 registered-users">
                    <div class="content">
                        <?php
                            $data = array(
                                'id' => 'loginForm'
                            );
                            echo form_open('', $data);
                        ?>
                        <h2>Bestaande gebruikers</h2>

                        <p>Als u al een account heeft kunt u hier inloggen.</p>

                        <div class="error">test</div>
                        <ul class="form-list">
                            <li>
                                <label class="required" for="email">Email Adres<em>*</em></label>

                                <div class="input-box">
                                    <input type="text" title="Email Adres" id="email_address" name="email_address"
                                           class="input-text required-entry validate-email" value=""/>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li>
                                <label class="required" for="pass">Wachtwoord<em>*</em></label>

                                <div class="input-box">
                                    <input type="password" title="Password" id="password" name="password"
                                           class="input-text required-entry validate-password"/>
                                </div>
                                <div class="clear"></div>
                            </li>
                        </ul>
                        <p class="required">* Vereiste velden</p>
                    </div>
                    <div class="buttons-set">
                        <a class="f-left" href="#">Wachtwoord vergeten?</a>
                        <button type="submit" class="colors-btn">Login</button>
                        <div class="clear"></div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>
</div>

<script>
    function validateEmail() {
        var email = $("#email_address").val();
        var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return regex.test(email);
    }

    function checkEmpty(field) {
        var fieldVal = $("#" + field).val();
        if (fieldVal == null || fieldVal == "") {
            return false;
        }
        return true;
    }

    $("#loginForm").submit(function (event) {
        event.preventDefault();

        $(".error").html("");

        var email = validateEmail();
        var passwordEmpty = $("#password").val();
        var password = checkEmpty('password');

        if (!email || !password) {
            if (!email) {
                $(".error").append("U hebt geen geldig email adres ingevuld <br />");
            }
            if (!password) {
                $(".error").append("U hebt geen wachtwoord ingevuld <br />");
            }
            $(".error").show(300);
        } else {
            var email = $("#email_address").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>account/loginSubmit',
                data: {
                    email: $("#email_address").val(),
                    password: $("#password").val()
                },
                success: function (resp) {
                    console.log(resp);
                    if (resp == 0) {
                        $(".error").html("Sorry, verkeerde inloggegevens!");
                        $(".error").show(300);
                    } else if (resp == 1) {
                        window.location.replace("/home/index");
                    } else if (resp == 2) {
                        $(".error").html("Uw account is nog niet actief, u hebt een email van ons ontvangen om uw account te activeren!");
                        $(".error").show(300);
                    }
                }
            });
        }
    });
</script>