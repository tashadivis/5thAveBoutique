<?php

/* Template Name: Left Sidebar */

include("header.php");?>

<div class="container">
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