<!-- 
<div id="footer">
	<div id="bottom-menu"><?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?></div>
	<div id="copyright">
		Please leave this line intact
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">theme design by Daniel Lerman © <?php the_time('Y'); ?></a>
	</div>
</div>
 -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/mycustomscript.js"></script>
<?php wp_footer(); ?>
</body>
</html>