<?php
class Prodotti_Widget extends WP_Widget {

	function __construct() {
		parent::__construct('prodotti_widget', __('Prodotti Widget', 'prodotti_domain'), array( 'description' => __( 'Widget per form di ricerca prodotti del Plugin Prodotti', 'prodotti_domain' ), ) );
	}

	function form($instance) {
		if( $instance) {
		  $title = esc_attr($instance['title']);
		} else {
		  $title = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titolo ricerca', 'prodotti_domain'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>		
		<?php
		echo __( '<p>');
		echo __( 'Widget per form di ricerca prodotti del Plugin Prodotti', 'prodotti_domain' );
		echo __( '</p>');
	}
	
	function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
	  return $instance;
	}

	function widget($args, $instance) {
	   extract( $args );
	   $title = apply_filters('widget_title', $instance['title']);
	   echo $before_widget;
	   echo '<div class="widget-text wp_widget_plugin_box">';
	   ?>
     <form method="get" name="cercaprodotti" class="formcercaprodotti" action="<?php echo get_site_url(); ?>/prodotti/">
		 	<h5>
			   <?php
				 if ( $title ) {
			      echo $before_title . $title . $after_title;
			   }else{
			      echo $before_title . 'Ricerca Prodotti' . $after_title;
				 }?>
			 </h5>
      <label for="categoria">
	      <select name="categoria" id="categoria">
	      <option value="">Scegli una categoria</option>
					 <?php
					 $terms = get_terms("categoria");
					 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
				     foreach ( $terms as $term ) {
				       echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
				        
				     }
					 }
	         ?>
	      </select>
      </label>
	    <div class="row">
	    	<div class="large-12 medium-12 small-12 columns">
      			<button type="submit" class="button round ricerca expand"><i class="fa fa-search fa-fw" style="margin:0;"></i>Cerca</button>
				</div>
			</div>
		 </form>
     <?php
	   echo '</div>';
	   echo $after_widget;
	}
}

add_action('widgets_init', create_function('', 'return register_widget("prodotti_widget");'));
