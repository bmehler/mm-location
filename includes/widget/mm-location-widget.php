<?php

namespace MM\Location;

add_action( 'widgets_init', function(){
	register_widget( 'MM\Location\Foo_Widget' );
});

class Foo_Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__('Location Widget', 'mm-location'), // Name
			array( 'description' => esc_html__('Creates Company Locations', 'mm-location'),) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance) {
		global $post;

		echo $args['before_widget'];
		if (!empty( $instance['p'])) {
			//echo $args['before_title'];
			
			$args = array (
				'post_type'		=> 	array( 'location'),
				'post_status'	=> 	array( 'publish'),
				'p'            	=>	$instance['p'],
			);

			$query = new \WP_Query($args);

			if($query->have_posts() ) :
				while ($query->have_posts()) : $query->the_post(); 
					$country 	= get_post_meta( $post->ID, 'country', true );
					$company 	= get_post_meta( $post->ID, 'company', true );
					$phone 		= get_post_meta( $post->ID, 'phone', true );
					$street		= get_post_meta( $post->ID, 'street', true );
					$city 		= get_post_meta( $post->ID, 'city', true );
					$country 	= get_post_meta( $post->ID, 'country', true );
					$email 		= get_post_meta( $post->ID, 'email', true );
					$maps 		= get_post_meta( $post->ID, 'maps', true );
					$info 		= get_post_meta( $post->ID, 'info', true );
				endwhile;
			endif;
			
			include(plugin_dir_path( __DIR__ ) . 'widget/templates/mm-location-widget-template.php');
			
			//echo $args['after_title'];
		}
		//echo esc_html__( 'Hello, World!', 'mm-location' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$p = !empty($instance['p']) ? $instance['p'] : esc_html__('Post-ID', 'mm-location');
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('p')); ?>"><?php esc_attr_e('Location Post ID', 'mm-location'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('p')); ?>" name="<?php echo esc_attr($this->get_field_name('p')); ?>" type="text" value="<?php echo esc_attr($p); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['p'] = (!empty( $new_instance['p'])) ? sanitize_text_field($new_instance['p']) : '';

		return $instance;
	}

} // class Foo_Widget