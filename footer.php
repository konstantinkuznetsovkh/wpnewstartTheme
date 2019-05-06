<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpnewstart
 */

?>

	</div><!--#content -->

	<!-- <footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php //echo esc_url( __( 'https://wordpress.org/', 'wpnewstart' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				//printf( esc_html__( 'Proudly powered by %s', 'wpnewstart' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				//printf( esc_html__( 'Theme: %1$s by %2$s.', 'wpnewstart' ), 'wpnewstart', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!.site-info -->
	<!-- </footer>#colophon -->

	<footer>   
		<section class="widget well3">	
		<div class="container">
			<div class="row">
				<div class="grid_4">

					<?php 					
					//рекомендуется проверять -->если у нас в сидебар сущ виджеты выводм
					if ( is_active_sidebar('footer-left') ):
						//эту функцию
					dynamic_sidebar('footer-left');
					endif;
					?>
				</div>
				<div class="grid_4">
				<?php 					
					//рекомендуется проверять -->если у нас в сидебар сущ виджеты выводм
					if ( is_active_sidebar('footer-center') ):
						//эту функцию
					dynamic_sidebar('footer-center');
					endif;
					?>
				</div>
				<div class="grid_4">
				<?php 					
					//рекомендуется проверять -->если у нас в сидебар сущ виджеты выводм
					if ( is_active_sidebar('footer-right') ):
						//эту функцию
					dynamic_sidebar('footer-right');
					endif;
					?>
				</div>
			</div>
		</div>
		</section>   
      <section>
        <div class="container">
          <div class="copyright">
		<?php
		if (ot_get_option('copyright_footer') ){?>
		
	<?php echo ot_get_option('copyright_footer');
	} else { ?> 
		Все права защищены.
	<?php }?> ©
		  <span id="copyright-year"></span>. 
          </div>
        </div>
      </section>
    </footer>



</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
