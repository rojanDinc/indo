<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
</div><!-- #main .wrapper -->
<footer class="footer">
	<div class="container">
		<div class="columns">
			<div class="column is-one-third is-one-half-mobile ">
				<h2 class="subtitle is-2 has-text-white m-b-5">KONTAKTA OSS</h2>
				<h5 class="is-5 has-text-white has-text-weight-bold">Indo AB</h5>
				<span class="has-text-white">Bollargatan 2</span>
				<br />
				<span class="has-text-white">345 67 UPPSALA</span>
				<br />
				<br />
				<span class="has-text-white">0894 - 88 33 22</span>
				<br />
				<span class="has-text-white">info@indo.se</span>
			</div>
			<div class="column is-one-third is-one-half-mobile m-r-6">
				<h2 class="subtitle is-2 has-text-white">OM INDO</h2>
				<p class="has-text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada
					fermentum lacus non luctus. Nullam vel placerat metus. Vestibulum aliquam tortor id lacus semper
					auctor. Donec sapien enim, feugiat quis urna eu.</p>
			</div>
			<div class="column is-one-third is-one-half-mobile ">
				<h2 class="subtitle is-2 has-text-white">LÄNKAR</h2>
				<?php
				wp_nav_menu(array(
					'theme_location'	=> 'primary',
					'menu_class'        => "footer-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
					'container_class'   => "", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
					'container_id'      => "", // (string) The ID that is applied to the container.
					//'items_wrap'        => "", // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
				) );
				?>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>