<?php
	//wp_footer must be included in your footer
	wp_footer(); 
?>
</div><!--end container-->
	<footer class="footer">
		<p>&copy; <?php echo date('Y'); ?> <strong><?php $blog_title = get_bloginfo('name'); echo $blog_title; ?></strong> All Rights Reserved</p>
	</footer>

</body>
</html>