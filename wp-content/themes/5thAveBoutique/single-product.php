<?php

include("header.php");?>
	<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">

		<?php 
		
		$price = (get_field('price'));
		$discount = (get_field('discount'));
			if(get_field('discount')) {
				$price = $price - $discount;
			}
		$title = get_the_title();
		
		if(have_posts()){
			//I have some posts so loop through the posts
			while(have_posts()){ 
			//get the post, the title, the content
				the_post();
				echo '<h2 class="content-header">'.get_the_title().'</h1>';?>
				
				<div class="single-content">
					<div class="thumb col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php the_post_thumbnail('medium');?></div>
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<h4 class="price"><?php 
						if(get_field('discount')) { ?>
							<span class="sale"><?php echo "SALE! "; ?></span><span class="price"><?php echo "Price: $"; echo $price; ?></span>
						<?php }
						else { ?>
							<span class="price"><?php echo "Price: $"; echo $price; ?></span>
						<?php }
						?></h4>
						<?php the_content();?>
					</div>
					<div class="cart-button"><?php echo do_shortcode('[wp_cart_button name="'.$title.'" price="'.$price.'"]'); ?></div>
					<?php $cart_total = wpspc_get_total_cart_qty(); ?>
						<?php if ($cart_total > 1) { ?>
							<span class="cart-total"><?php echo $cart_total; ?> items in cart.</span>
						<?php }
						else if ($cart_total == 1) {?>
							<span class="cart-total"><?php echo $cart_total." item in cart.";?></span>
						<?php }
						else {?><span class="cart-total"><?php echo ""; } ?></span>
					<div class="after-info col-lg-12 col-md-12 col-sm-12">
						<h3><span class="glyphicon glyphicon-arrow-left"></span> <a href="javascript:javascript:history.go(-1)">GO BACK.</a></h3>
					</div>
				</div><?php
			}//endloop
		}
		//no posts exist
		else{
			echo "You do not have any content";
		} ?>
	</div>
<?php include("footer.php"); ?>