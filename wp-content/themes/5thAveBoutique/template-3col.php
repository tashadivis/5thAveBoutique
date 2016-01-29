<?php

/* Template Name: Apparel Page - 3 Column */

include("header.php");?>

<?php $args = array(
	'post_type'  => 'product',
	'category_name' => $pagename
);

$apparel_query = new WP_Query( $args );
?>



<h1 class="page-title"><?php the_title();?></h1>
	
		<?php 
	if ($apparel_query->have_posts()) {
		//I have some posts so loop through the posts
		while($apparel_query->have_posts()){ 
		//get the post, the title, the content
			$apparel_query->the_post();
			if(has_post_thumbnail()) { ?>
				<div class="product col-lg-4 col-md-4 col-sm-4 col-xs-4">
				
					<a class="thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?>
					<span class="product-title"><?php the_title();?></span></a>
					<?php $price = (get_field('price'));
						  $discount = (get_field('discount'));
						if(get_field('discount')) {
							$price = $price - $discount;
						} ?>
						<span class="price"><?php echo '$'; echo $price; ?></span>
						<?php if(get_field('discount')) {
							?><br/><span class="sale"><?php echo 'SALE: $'; echo $discount; echo ' OFF!' ?></span>
						<?php } ?>
					
				</div>
			 <?php }
			else {
				echo "No thumbnail found.";
			}
		}//endloop
	wp_reset_postdata();
	}
	//no posts exist
	else {
		echo "No content found.";
	}

	?>
	
<?php include("footer.php"); ?>