<?php
/**
 * Plugin Name: Prodotti
 * Plugin URI: http://www.rswstudio.it/wordpress/plugin-prodotti-per-wordpress/
 * Description: gestione prodotti per wordpress
 * Version: 1.0.0
 * Author: RSW Studio
 * Author URI: http://www.rswstudio.it
 * License: GPL2
 */
 
  defined('ABSPATH') or die("No script kiddies please!");
	define( 'Prodotti_Version', '1.0.0' );
	define( 'Prodotti_Directory', dirname( plugin_basename( __FILE__ ) ) );
	define( 'Prodotti_Path', plugin_dir_path( __FILE__ ) );
	define( 'Prodotti_URL', plugin_dir_url( __FILE__ ) );

  include 'prodotti_metabox.php';
  include 'prodotti_pluginaggiuntivi.php';
  include 'prodotti_opzioni.php';
  include 'prodotti_tassonomie.php';
  include 'prodotti_widget.php';
  include 'prodotti_shortcode.php';
  
  load_plugin_textdomain('prodotti', false, basename( dirname( __FILE__ ) ) . '/lang' );

	function prodotti_print(){
		//echo rwmb_meta('prodotti_arredato');
	}
	
	function prodotti_init() {
	  $labels = array(
	    'name' => 'Prodotti',
	    'singular_name' => 'Prodotto',
	    'add_new' => 'Aggiungi Prodotto',
	    'add_new_item' => 'Aggiungi Prodotto',
	    'edit_item' => 'Modifica',
	    'new_item' => 'Nuovo Prodotto',
	    'all_items' => 'Tutti i Prodotti',
	    'view_item' => 'Vedi la pagina',
	    'search_items' => 'Cerca',
	    'not_found' =>  'Nessun Prodotto trovato',
	    'not_found_in_trash' => 'Nessun Prodotto trovato nel cestino', 
	    'parent_item_colon' => '',
	    'menu_name' => 'Prodotti'
	  );
	
	  $args = array(
	    'labels' => $labels,
	    'public' => true, //se è visibile nel pannello admin
	    'publicly_queryable' => true,
	    'show_ui' => true, //should we display an admin panel for this custom post type
	    'show_in_menu' => true, 
	    'query_var' => true,
			'menu_icon' => Prodotti_URL . '/img/prodotti.png', //parte dalla cartella dove si trova function
			'rewrite' => array( 'slug' => 'prodotti' ), //modifica il permalink con il nome della sezione (es: servizi) //'rewrite' => true,  // 
	    'capability_type' => 'post', //wordpress deve sapere come comportarsi per leggere, editare e cancellare il post - a livello di permessi
	    'has_archive' => true, 
	    'hierarchical' => false, //gerarchico come le pagine
	    'menu_position' => null, //oppure un numero
	    'supports' => array( 'title', 'excerpt', 'editor', 'thumbnail','page-attributes','custom-fields' ) // quali item sono supportati ed inseriti nella pagina add/edit del pannello wp-admin - 'editor', 'author', 'comments' 
	  ); 
	  register_post_type( 'product', $args );
	}
	
	function prodotti_updated_messages( $messages ) {
		$post             = get_post();
		$post_type        = get_post_type( $post );
		$post_type_object = get_post_type_object( $post_type );
		$messages['prodotti'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Prodotto aggiornato.', 'prodotti' ),
			2  => __( 'Custom field updated.', 'prodotti' ),
			3  => __( 'Custom field deleted.', 'prodotti' ),
			4  => __( 'Prodotto updated.', 'prodotti' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Prodotto ripristinato alla revisione %s', 'prodotti' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Prodotto pubblicato.', 'prodotti' ),
			7  => __( 'Prodotto salvato.', 'prodotti' ),
			8  => __( 'Prodotto inviato.', 'prodotti' ),
			9  => sprintf(
				__( 'Prodotto schedulato per: <strong>%1$s</strong>.', 'prodotti' ),
				date_i18n( __( 'M j, Y @ G:i', 'prodotti' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Bozza prodotto aggiornata.', 'prodotti' )
		);
	
		if ( $post_type_object->publicly_queryable ) {
			$permalink = get_permalink( $post->ID );
			$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'Visualizza prodotto', 'prodotti' ) );
			$messages[ $post_type ][1] .= $view_link;
			$messages[ $post_type ][6] .= $view_link;
			$messages[ $post_type ][9] .= $view_link;
	
			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Anteprima prodotto', 'prodotti' ) );
			$messages[ $post_type ][8]  .= $preview_link;
			$messages[ $post_type ][10] .= $preview_link;
		}
		return $messages;
	}
	
	function prodotti_add_help_text( $contextual_help, $screen_id, $screen ) {
	  if ( 'prodotti' == $screen->id ) {
	    $contextual_help =
	      '<p>' . __('Cose da ricordare in modifica di un prodotto:', 'prodotti') . '</p>' .
	      '<ul>' .
	      '<li>' . __('Specifica dettagliatamente in che categorie può essere inserito.', 'prodotti') . '</li>' .
	      '<li>' . __('Speicifica nel titolo la tipologia.', 'prodotti') . '</li>' .
	      '</ul>' .
	      '<p>' . __('Se vuoi schedulare che un annuncio sia pubblicato nel futuro:', 'prodotti') . '</p>' .
	      '<ul>' .
	      '<li>' . __('Sotto il modulo di Pubblica, fare clic sul link Modifica accanto a Pubblica.', 'prodotti') . '</li>' .
	      '<li>' . __('Modificare la data di pubblicazione con una data nel futuro, quindi fare clic su Ok.', 'prodotti') . '</li>' .
	      '</ul>' .
	      '<p><strong>' . __('Per maggiori informazioni:', 'prodotti') . '</strong></p>' .
	      '<p>' . __('http://www.gestionalesoftware.com/prodotti/worpress/plugin-prodotti-per-wordpress/', 'prodotti') . '</p>' .
	      '<p>' . __('https://wordpress.org/plugins/prodotti/', 'prodotti') . '</p>' ;
	  } elseif ( 'edit-prodotti' == $screen->id ) {
	    $contextual_help =
	      '<p>' . __('Elenco prodotti inseriti con dettaglio di categoria e visualizzazioni.', 'prodotti') . '</p>' ;
	  }
	  return $contextual_help;
	}
	
	function prodotti_aggiungiattributialcontenuto($content){
    
		$prodotto_listagalleria=rwmb_meta('prodotti_galleria', 'type=image' );
		if (count($prodotto_listagalleria)>1){
			$prodotto_galleria="<ul class=\"clearing-thumbs\" data-clearing>";
			foreach ( $prodotto_listagalleria as $image ){
				$prodotto_galleria.="<li><a href='{$image['full_url']}' title='{$image['title']}'><img src='{$image['url']}' class=\"th\" data-caption='{$image['title']}' alt='{$image['title']}' /></a></li>\n";
			}
			$prodotto_galleria.="</ul>";
		}else{
			$prodotto_galleria="";
		}

		$prodotto_listaallegati=rwmb_meta('prodotti_allegati','type=file');
		if (count($prodotto_listaallegati)>1){
	    $prodotto_allegati="<ul class=\"inline-list\">";
			foreach ( $prodotto_listaallegati as $allegato ){
			  $prodotto_allegati.="<li><a href='{$allegato['url']}' title='{$allegato['title']}' role='button' target='_blank'><i class=\"fa fa-file-pdf-o fa-lg fa-fw\" style=\"color:#CF1312\"></i>{$allegato['title']}</a><li>";
			}
			$prodotto_allegati.="</ul>";
		}else{
			$prodotto_allegati="";
		}

		$prodotto_tabellacaratteristiche="<table cellpadding=\"5\" cellspacing=\"5\" width=\"100%\">";
		$prodotto_tabellacaratteristiche.="</table>";
		
		$content.=" ".$prodotto_galleria.$prodotto_allegati.$prodotto_tabellacaratteristiche;
		return $content;
	}

	add_action('init', 'prodotti_init' );
	add_action('contextual_help', 'prodotti_add_help_text', 10, 3 );		
	add_filter('post_updated_messages', 'prodotti_updated_messages' );
 	
	//add_filter('the_content', 'prodotti_aggiungiattributialcontenuto');
