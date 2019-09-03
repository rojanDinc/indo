<?php
/**
 * Intentionally Blank Theme functions
 *
 * @package WordPress
 * @subpackage intentionally-blank
 */
require_once('navwalker.php');
if ( ! function_exists( 'blank_setup' ) ) :
	/**
	 * Sets up theme defaults and registers the various WordPress features that
	 * this theme supports.
	 */
	
	function blank_setup() {
		register_nav_menus(array(
			'primary' => __('Primary Meny', 'theme_menu')
		));
		load_theme_textdomain( 'intentionally-blank' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		wp_enqueue_style('style', get_stylesheet_uri());

		// This theme allows users to set a custom background.
		add_theme_support( 'custom-background', apply_filters( 'intentionally_blank_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );

		add_theme_support( 'custom-logo' );
		add_theme_support( 'custom-logo', array(
			'height'      => 256,
			'width'       => 256,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		/**
		 * Sets up theme defaults and registers the various WordPress features that
		 * this theme supports.
		 */
		function blank_custom_logo() {
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			}
		}
		function add_menu_link_class( $atts, $item, $args ) {
			if (property_exists($args, 'link_class')) {
			  $atts['class'] = $args->link_class;
			}
			return $atts;
		  }
		  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

		
	}
endif; // end function_exists blank_setup.
add_action( 'after_setup_theme', 'blank_setup' );

add_action( 'customize_register', function( $wp_customize ) {
	$wp_customize->remove_section( 'static_front_page' );
} );

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'textimg_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class textimg_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct( 
			// Base ID of your widget
			'textimg_box', 

			// Widget name will appear in UI
			__('Image with text box', 'textimg_domain'), 
			
			// Widget description
			array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'textimg_domain' ), ) 
		);
	}
 			
	// Widget Backend 
	public function form( $instance ) {
		$category_title = 	isset($instance[ 'category_title' ]) ? $instance[ 'category_title' ] : __( 'Category title', 'textimg_domain' );
		$title = 			isset($instance[ 'title' ]) ? $instance[ 'title' ] : __( 'Title', 'textimg_domain' );
		$image = 			isset($instance[ 'image' ]) ? $instance[ 'image' ] : __( 'Image', 'textimg_domain' );
		$image_pos = 		isset($instance[ 'image_pos' ]) ? $instance[ 'image_pos' ] : __( 'Image Positon', 'textimg_domain' );
		$text = 			isset($instance[ 'text' ]) ? $instance[ 'text' ] : __( 'Text', 'textimg_domain' );
		?>

		<!-- Category title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'category_title' ); ?>"><?php _e( 'Category title:' ); ?></label> 
			<input class="widefat" 
				id="<?php echo $this->get_field_id( 'category_title' ); ?>" 
				name="<?php echo $this->get_field_name( 'category_title' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $category_title ); ?>" />
		</p>
		<!-- Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" 
				id="<?php echo $this->get_field_id( 'title' ); ?>" 
				name="<?php echo $this->get_field_name( 'title' ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<!-- Image -->
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:' ); ?></label> 
			<input class="widefat" 
				id="<?php echo $this->get_field_id( 'image' ); ?>" 
				name="<?php echo $this->get_field_name( 'image' ); ?>" 
				type="file" 
				value="<?php echo esc_attr( $image ); ?>" />
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image position:' ); ?></label>
		</p>
		<!-- Image position -->
		<p>
			<select
				class="widefat"
				id="<?php echo $this->get_field_id( 'image_pos' ); ?>" 
				name="<?php echo $this->get_field_name( 'image_pos' ); ?>" 
			>
				<option value="left" <?php echo $image_pos == 'left' ? 'selected' : ''; ?>>Left</option>
				<option value="right" <?php echo $image_pos == 'right' ? 'selected' : ''; ?>>Right</option>
			</select>
		</p>
		<!-- Text body -->
		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:' ); ?></label> 
			<textarea
				class="widefat"
				id="<?php echo $this->get_field_id( 'text' ); ?>" 
				name="<?php echo $this->get_field_name( 'text' ); ?>" 
				type="text" 
			>
				<?php echo esc_html( $text ); ?>
			</textarea>
		</p>
	<?php 
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		$title = 			apply_filters( 'widget_title', $instance['title'] );
		$category_title = 	apply_filters( 'widget_category_title', $instance['category_title'] );
		$image = 			apply_filters( 'widget_image', $instance['image'] );
		$image_pos = 		apply_filters( 'widget_image_pos', $instance['image_pos'] );
		$text = 			apply_filters( 'widget_text', $instance['text'] );
	
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		?>
			<style>
				#image-container {
					overflow: hidden;
					height: 100%;
				}
				#container{
					min-height: 200px;
					overflow: hidden;
				}
				#image{
					width: 100%;
					height: 100%;
					background-image: url('https://via.placeholder.com/640x480');
					background-position: center;
					background-size: cover;
					transition: all .4s;
				}
				#container:hover #image, #container:focus #image{
					transform: scale(1.2);
				}
				.content-box {
					height: 100%;
					transition: background-color ease-in-out 100ms; 
				}
				#container:hover .content-box {
					background-color: #02596e;
				}
				.lighter {
					background-color: #66aabb
				}
				.light{
					background-color: #338da4;
				}
				@media (max-width: 1600px) {
					.textimg_text {
						display: none;
					}
				}
			</style>
			<a>
				<div id="container" class="columns <?= $image_pos == 'left' ? 'flex-row-reverse' : '' ?>">
					<div class="column is-paddingless">
						<div class="content-box has-text-white light p-t-6 p-b-6 p-l-6 p-r-6">
							<h1 class="is-1 has-text-weight-bold">
								<?= $category_title ?>
							</h1>
							<br />
							<h2 class="title is-2 has-text-white">
								<?= $title ?>
							</h2>
							<p class="textimg_text"><?= $text ?></p>
						</div>
					</div>
					<div class="column is-6 is-paddingless is-hidden-mobile is-hidden-tablet-only">
						<div id="image-container">
							<div id="image"></div>
						</div>
					</div>
				</div>
			</a>
		<?php
		//echo $args['before_title'] . $title . $args['after_title'];
		// This is where you run the code and display the output
		echo $args['after_widget'];
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['category_title'] = ( ! empty( $new_instance['category_title'] ) ) ? strip_tags( $new_instance['category_title'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		$instance['image_pos'] = ( ! empty( $new_instance['image_pos'] ) ) ? strip_tags( $new_instance['image_pos'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here