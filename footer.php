<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Thema
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div id = "footer-content">
			<div id="footer-widget-1" class = "footer-widget-area">
				<?php
				if(is_active_sidebar('footer-widget-1')){
				dynamic_sidebar('footer-widget-1');
				}
				?>
			</div>
			<div id="footer-widget-2" class = "footer-widget-area">
				<?php
				if(is_active_sidebar('footer-widget-2')){
				dynamic_sidebar('footer-widget-2');
				}
				?>
			</div>
			<div id="footer-widget-3" class = "footer-widget-area">
				<?php
				if(is_active_sidebar('footer-widget-3')){
				dynamic_sidebar('footer-widget-3');
				}
				?>
			</div>
		</div>



		<div class="site-info">

			<h2><a href="http://thema.cymru/" rel="designer">Thema.</a></h2>

		</div><!-- .site-info -->
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
