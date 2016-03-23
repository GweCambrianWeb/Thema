<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package thema
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'thema' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Barod i gyhoeddi eich cofnod gyntaf? <a href="%1$s">Cychwynwch Yma</a>.', 'thema' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( "Sori, ni ffeindiwyd dim a oedd yn cydweddu a'r termau chwilio. Ceisiwch eto gyda termau gwahanol os gwelwch yn dda.", 'thema' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'Yn anffodus, dyden ni ddim yn gallu canfod beth yr ydych yn chwilio amdanynt. Efallai bydd chwilio yn helpu.', 'thema' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
