<?php

/* Template Name: Full Width */

include("header.php");?>
	<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
		<?php
			if (have_posts()) {
				//I have some posts so loop through the posts
				while (have_posts()){ 
				//get the post, the title, the content
					the_post();
				}
			}
			//no posts exist
			else {
				echo "No content found.";
			}
		?>
	</div>

<?php include("footer.php"); ?>