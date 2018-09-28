<?php
/*
Plugin Name: Custom Widget Manually
Description: Create your own Custom widget.
Plugin URI:
Author:   Tanveer Kaur   
Version:     1.0.0
License:      Free to use
*/



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}
// widget: Custom Widget Manually
class Custom_Widget_Manually extends WP_Widget {

	public function __construct() {

		$id = 'custom_widget_manually';

		$title = esc_html__('Custom Widget Manually', 'custom-widget');

		$options = array(
			'classname' => 'custom-widget-manually',
			'description' => esc_html__('Adds Custom Widget Manually that is not modified by WordPress.', 'custom-widget')
		);

		parent::__construct( $id, $title, $options );

	}

	public function widget( $args, $instance ) {

		//extract( $args );

		$markup = '';

		if ( isset( $instance['markup'] ) ) {

			echo wp_kses_post( $instance['markup'] );

		}

	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		if ( isset( $new_instance['markup'] ) && ! empty( $new_instance['markup'] ) ) {

			$instance['markup'] = $new_instance['markup'];
                        //$instance['classes'] = $new_instance['classes'];
		}

		return $instance;

	}

	public function form( $instance ) {

		$id = $this->get_field_id( 'markup' );

		$for = $this->get_field_id( 'markup' );

		$name = $this->get_field_name( 'markup' );

		$label = __( 'Markup/text:', 'custom-widget' );

		$markup = '<p>'. __( 'Custom Widget Manually .', 'custom-widget' ) .'</p>';

		if ( isset( $instance['markup'] ) && ! empty( $instance['markup'] ) ) {

			$markup = $instance['markup'];

		}

		?>

		<p>
			<label for="<?php echo esc_attr( $for ); ?>"><?php echo esc_html( $label ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $name ); ?>"><?php echo esc_textarea( $markup ); ?></textarea>
		</p>

<?php }

}

// register widget
function tanuplugin_register_widgets() {

	register_widget( 'Custom_Widget_Manually' );

}
add_action( 'widgets_init', 'tanuplugin_register_widgets' );


