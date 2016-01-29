<?php
/* Template Name: Home */
include("header.php"); ?>

	
	
<?php $args = array(
	'posts_per_page'	=> 3,
	'post_type'		=> 'feature',
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key'     => 'featured',
			'value'   => 'yes'
		),
	
));
// query
$feat_query = new WP_Query( $args );
?>


	<?php echo do_shortcode('[image-carousel]'); ?>
	
	
			
		<div class="features row row-center text-center col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-2">
			<?php if( $feat_query->have_posts()) {?>
				<?php while( $feat_query->have_posts()) {?>
					<div class="feature col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<?php $feat_query->the_post(); ?>
						<p class="feat-title"><?php the_title();?></p>
						<?php if(has_post_thumbnail()) {?>
						<a class="feat bw" href="<?php if(get_field('link')) { echo get_field('link'); }?>">
							<?php the_post_thumbnail('thumbnail'); ?>
						<br /></a><?php }
						if(get_field('feature_description'))
						{?>
						<p class="feature_description"><?php echo get_field('feature_description');?></p>
						<?php }
						 ?>
					</div>
				<?php }
			}
	//wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
					
		</div>

<?php include("footer.php"); ?>

