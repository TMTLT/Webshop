<section class="content-wrapper">
	<div class="content-container container">	
		<div class="col-left">
			<div class="block compare-block">
				<div class="block-title">COMPARE PRODUCTS</div>
				<ul>
					<li>You have no items to compare</li>
				</ul>
			</div>
			<div class="block community-block">
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:300px;width:220px;"><div id="gmap_canvas" style="height:300px;width:220px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">www.trivoo.net</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(51.9276297,4.478093100000024),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(51.9276297, 4.478093100000024)});infowindow = new google.maps.InfoWindow({content:"<b>Mo's webshop</b><br/>Heer bokelweg 255<br/>3032AD Rotterdam" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			</div>
		</div>
		<div  class="col-main">
		
			<h1 class="page-title">Neem contact op</h1>
			<div class="contact-form-container">
				<div  class="form-title">Contact Formulier</div>
				<ul class="form-fields">
					<?= validation_errors(); ?>
					<?= form_open('contact/create') ?>
					<p>
					<label for='title'>Naam</label>
					<p>
					<input type='text' name='naam'>
					</p>
					<label for='title'>Email</label>
					<P>
					<input type='text' name='email'>
					</p>
					<p>
					<label for='text'>Bericht</label>
					<p>
					<textarea name='bericht'></textarea>
					</p>
					<p>
					<input type='submit' name='submit' value='Verzend' />
					</p>
					</form>
				</ul>
			
		</div>
		<div class="clearfix"></div>
		<div class="news-letter-container">
			<div class="free-shipping-block">
				<h1>ENJOY FREE SHIPPING</h1>
				<p>on all orders as our holiday gift for you!</p>
			</div>
			<div class="news-letter-block">
				<h2>Schrijf je in voor nieuwsbrieven!</h2>
				<input type="text" value="Enter email address" title="" />
				<input class="submit-btn" type="submit" value="Submit" title="Submit" />
			</div>
		</div>	
	</div>
</section>
</div>