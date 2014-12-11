<!--Content Block-->
<section class="content-wrapper">
	<div class="content-container container">
		<div class="col-left">
			<div class="block man-block">
				<div class="block-title">Categories</div>
				<ul>
					<?php 
						foreach($categories as $category)
							print('<li><a href="/store/category/' . $category->titel . '">' . $category->titel . '</a></li>');
					?>
				</ul>
			</div>
			<div class="paypal-block">
				<a href="#" title="Paypal"><img src="/images/paypal_img.png" title="Paypal" alt="Paypal" /></a>
			</div>
		</div>
		<div class="col-main">
			<div class="category-banner"><img src="/images/sunglass.jpg" title="Banner" alt="Banner" /></div>
			<div class="pager-container">
				<div class="pager">
					<div class="show-items">6 Item(s)</div>
					<div class="show-per-page"><label>Show</label> <select><option>09</option></select></div>
				</div>
				<div class="view-by-block">
					<ul class="view-by">
						<li>View as:</li>
						<li><a href="#" title="Grid" class="grid">Grid</a></li>
						<li><a href="#" title="List" class="list">List</a></li>
					</ul>
					<div class="short-by">
						<label>Sort By</label><select><option>Position</option></select>
					</div>
				</div>
			</div>
			<div class="new-product-block">
					<?php 
						$products = array_values($products);

						$counter = 0;
						print('<ul class="product-grid">');
						foreach($products as $product) {

							if(null != $product) {
								print('<li>
									<div class="pro-img">
										<img title="Freature Product" alt="Freature Product" src="/images/default_img.png" />
									</div>
									<div class="pro-content"><p>' . $product['titel'] . '</p></div>
									<div class="pro-price">E ' . $product['prijs'] . '</div>
									<div class="pro-btn-block">
										<a class="add-cart left" href="#" title="Add to Cart">Add to Cart</a>
										<a class="add-cart right quickCart inline" href="#quick-view-container" title="Quick View">Quick View</a>
									</div>
									<div class="clearfix"></div></li>');
								$counter += 1;
							}
							
							if($counter > 2){
								print('</ul>');
								print('<ul class="product-grid">');
								$counter = 0;
							}
						}
						print('</ul>');
					?>
				</ul>
		<div class="clearfix"></div>
		<div class="news-letter-container">
			<div class="free-shipping-block">
				<h1>ENJOY FREE SHIPPING</h1>
				<p>on all orders as our holiday gift for you!</p>
			</div>
			<div class="news-letter-block">
				<h2>SIGN UP FOR OUR NEWSLETTER</h2>
				<input type="text" value="Enter email address" title="" />
				<input type="submit" value="Submit" title="Submit" />
			</div>
		</div>	
	</div>
</section>
</div>
		<!--Quick view Block-->
<script type="text/javascript">
jQuery (function(){
	var tabContainers=jQuery('div.tabs > div');
	tabContainers.hide().filter(':first').show();
	jQuery('div.tabs ul.tabNavigation a').click(function(){
		tabContainers.hide();
		tabContainers.filter(this.hash).show();
		jQuery('div.tabs ul.tabNavigation a').removeClass('selected');
		jQuery(this).addClass('selected');
		return false;
		}).filter(':first').click();
	});
</script>
<article style="display:none;">
	<section id="quick-view-container" class="quick-view-wrapper">
	<div class="quick-view-container">
		<div class="quick-view-left">
			<h2>Sunglass RB3184</h2>
			<div class="product-img-box">
				<p class="product-image">
					<img src="/images/sale_icon_img.png" title="Sale" alt="Sale" class="sale-img" />
					<a href="view.html" title="Image"><img src="/images/quick_view_img.png" title="Image" alt="Image" /></a>			 </p>
				<ul class="thum-img">
					<li><img	src="/images/quick_thum_img.png" title="" alt="" /></li>
					<li><img	src="/images/quick_thum_img.png" title="" alt="" /></li>
				</ul>
			</div>
		</div>
		<div class="quick-view-right tabs">
			<ul class="tab-block tabNavigation">
				<li><a class="selected" title="Overview" href="#tabDetail">Overview</a></li>
				<li><a title="Description" href="#tabDes">Description</a></li>
			</ul>
			<div id="tabDetail" class="tabDetail">
							<div class="first-review">Be the first to review this product</div>
			<div class="price-box">
				<span class="price">$600.00</span>			</div>
			<div class="availability">In stock</div>
			<div class="color-size-block">
				<div class="label-row">
					<label><em>*</em> color</label>
					<span class="required">* Required Fields</span>			 </div>
				<div class="select-row">
					<select><option>-- Please Select --</option></select>
				</div>
				<div class="label-row">
					<label><em>*</em> size</label>
				</div>
				<div class="select-row">
					<select><option>-- Please Select --</option></select>
				</div>
			</div>
			<div class="add-to-cart-box">
				<span class="qty-box">
					<label for="qty">Qty:</label>
					<a class="prev" title="" href="#"><img alt="" title="" src="/images/qty_prev.png"></a>
					<input type="text" name="qty" class="input-text qty" id="qty" maxlength="12" value="1">
					<a class="next" title="" href="#"><img alt="" title="" src="/images/qty_next.png"></a>			 </span>
				<button title="Add to Cart" class="form-button"><span>Add to Cart</span></button>
			</div>
						</div>
						<div id="tabDes" class="tabDes">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas erat odio, suscipit eu porta et, ultricies id sapien. Quisque posuere odio eget lectus suscipit sodales. Sed consequat, leo ut varius scelerisque, augue massa tincidunt est, et tincidunt enim tortor a metus. In sit amet diam in tellus tincidunt mollis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi hendrerit eleifend tortor, a dapibus tellus suscipit porta. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In mollis adipiscing mi et volutpat. Aliquam vitae dui nunc. Nulla ac ante eu massa dictum volutpat. Sed mauris sem, posuere sit amet pretium consectetur, ullamcorper vel orci. Aenean feugiat luctus lectus ac hendrerit. Fusce pulvinar, mauris eget sodales suscipit, diam neque condimentum lectus, id imperdiet felis turpis egestas neque. In aliquet orci eget nisl sollicitudin sed gravida tortor commodo</p>
						</div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
</article>