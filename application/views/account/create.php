
<!--Content Block-->
<section class="content-wrapper">
	<div class="content-container container">
		<div class="main">
			<h1 class="page-title">Maak een account</h1>
			<div class="fieldset">
				<div class="error"></div>
			</div>
			<div class="fieldset">
	            <h2 class="legend">Gegevens</h2>
	            <?php 
				$data = array(
				              'id' => 'createForm'
				            );
	            echo form_open('account/createSubmit', $data);
	            ?>
				<ul class="form-list">
					<li class="fields">
						<div class="customer-name">
							<div class="input-box">
								<label for="firstname">Voornaam<em>*</em></label>
								<input type="text" class="required-entry input-text" title="Voornaam" value="" name="firstname" id="firstname">
							</div>
							<div class="input-box">
								<label for="affix">Tussenvoegsel</label>
								<input type="text" class="input-text" title="Tussenvoegsel" value="" name="affix" id="affix">
							</div>
							<div class="input-box">
								<label for="lastname">Achternaam<em>*</em></label>
								<input type="text" class="required-entry input-text" title="Achternaam" value="" name="lastname" id="lastname">
							</div>
							<div class="clear"></div>
						</div>
					</li>
					<li>
						<div class="input-box">
							<label class="required" for="zip_code">Postcode<em>*</em></label>
							<input type="text" class="input-text required-entry" title="Postcode" value="" id="zip_code" name="zip_code">
						</div>
						<div class="input-box">
							<label class="required" for="house_number">Huisnummer<em>*</em></label>
							<input type="text" class="input-text required-entry" title="Huisnummer" value="" id="house_number" name="house_number">
						</div>
						<div class="clear"></div>
					</li>
					<li>
						<div class="input-box">
							<label class="required" for="email_address">Email adres<em>*</em></label>
							<input type="email" class="input-text validate-email required-entry" title="Email Adres" value="" id="email_address" name="email">
						</div>
						<div class="clear"></div>
					</li>
				</ul>
				<h2 class="legend">Login informatie</h2>
				<ul class="form-list">
					<li class="fields">
						<div class="customer-name">
							<div class="input-box">
								<label for="firstname">Wachtwoord<em>*</em></label>
								<input type="password" class="required-entry input-text" title="Password" value="" name="password" id="password">
							</div>
							<div class="input-box">
								<label for="lastname">Bevestig wachtwoord<em>*</em></label>
								<input type="password" class="required-entry input-text" title="Password" value="" name="password2" id="password2">
							</div>
							<div class="clear"></div>
						</div>
					</li>
				</ul>
				<div class="buttons-set">
					<p class="required">* Vereiste velden</p>
					<a href="/account/index" title="Back" class="f-left">&laquo; Terug</a>
					<button type="submit" class="colors-btn">Registreren</button>
					<div class="clear"></div>
				</div>
			<?php echo form_close();?>
        </div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
</div>

<script>
	function validatePasswords() {
		var password = $("#password").val();
		var password2 = $("#password2").val();
		if ((password != "") && (password === password2)) {
			console.log(true);
			return true;
		} else {
			console.log(false);
			return false;
		}
	}

	function validateZipCode() {
		var str = $("#zip_code").val();
		str = str.replace(/\s+/g, '').toUpperCase();
		str = str.replace(/(^\s*)|(\s*$)/g, "");
		if(str.match(/^[1-9][0-9]{3}[A-Z]{2}$/i)) {
			console.log(true);
			return true;
		} else {
			console.log(false);
			return false;
		}
	}

	function validateEmail() {
		var email = $("#email_address").val();
    	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		console.log(regex.test(email));
    	return regex.test(email);
	} 

	$("#password").keyup(function() {
	  validatePasswords();
	});

	$("#password2").keyup(function() {
	  validatePasswords();
	});

	$("#zip_code").keyup(function() {
	  validateZipCode();
	});

	$("#email_address").keyup(function() {
	  validateEmail();
	});

	$("#createForm").submit(function(event) {
		var email = validateEmail();
		var passwords = validatePasswords();
		var zip = validateZipCode();

		if (!email || !passwords || !zip) {
			if (!email) {
				$(".error").html("Het ingevulde email adres is niet geldig <br />");
			}
			if (!passwords) {
				$(".error").append("De ingevulde wachtwoorden komen niet overeen <br />");
			}
			if (!zip) {
				$(".error").append("De ingevulde postcode is niet geldig");
			}
			$(".error").show(299);
			event.preventDefault();
		}
	});
</script>