<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">
        <?php
		//wp_head must be included in your header
		wp_head(); ?>
		<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<?php $pagename = get_query_var('pagename'); ?>
		<style type="text/css">
			html { margin: 0px !important;}
		</style>
	</head>
	<body>
	
	<?php
	$args = array(
			'posts_per_page'	=> 1,
			'post_type'		=> 'broadcast',
			'meta_query' => array(
			'relation' => 'AND',
				array(
					'key'     => 'active',
					'value'   => 'yes'
				),
			)
		);
	// query
	$banner_query = new WP_Query( $args );  ?>

	
	<div class="container-fluid">
		<!--<div class="header container">	
			<nav class="nav">
				/*<?php
					$defaults = array(
						'theme_location'  => 'primary',
						'menu'            => '',
						'container'       => 'nav',
						'container_class' => ''
					);?>
				<?php wp_nav_menu($defaults); ?>*/
			</nav>
		</div>-->
		 
	<nav class="navbar navbar-default <?php if($banner_query->post_count > 0) { echo "banner-active"; }?>">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo get_page_link(344); ?>">&nbsp;<span class="glyphicon glyphicon-leaf"></span> <span class="cursive"><?php $blog_title = get_bloginfo('name'); echo $blog_title; ?></span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo get_page_link(344); ?>">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="<?php echo get_page_link(162); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo get_page_link(165); ?>">Women's Apparel</a></li>
            <li><a href="<?php echo get_page_link(167); ?>">Men's Apparel</a></li>
            <li><a href="<?php echo get_page_link(169); ?>"><span class="emph red">SALE</span></a></li>
          </ul>
        </li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
		<li role="presentation" class="divider"></li>
        <li><a href="<?php echo get_page_link(181); ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
		<li><a href="<?php echo get_page_link(156); ?>">Contact Us</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!---------------- B A N N E R --------------->
	<div class="banner navbar-fixed-top">
		<div class="container">
		<?php
			if ($banner_query->have_posts()) {
			//I have some posts so loop through the posts
				while ($banner_query->have_posts()){ 
				//get the post, the title, the content
					$banner_query->the_post();
				//echo get_post_meta(get_the_ID(), 'broadcast_text', true); exit; 
				?>
					<h4 class="broadcast"><?php the_title(); /*if (get_field('broadcast_text')) { echo get_field('broadcast_text'); }*/
					 ?></h4>
					
				<?php }
			}
			wp_reset_postdata();
?>
		</div>
	</div>

