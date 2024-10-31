<?php
  /* categorie*/
	function prodotti_tassonomia_categoria() {
		$labels = array(
			'name'              => __( 'Categorie', 'taxonomy general name' ),
			'singular_name'     => __( 'Categorie', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca categoria' ),
			'all_items'         => __( 'Tutte le categorie' ),
			'parent_item'       => __( 'Categoria padre' ),
			'parent_item_colon' => __( 'Categoria padre:' ),
			'edit_item'         => __( 'Modifica categoria' ), 
			'update_item'       => __( 'Aggiorna categoria' ),
			'add_new_item'      => __( 'Aggiungi nuova categoria' ),
			'new_item_name'     => __( 'Nome della nuova categoria' ),
			'menu_name'         => __( 'Categorie' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'product_cat', 'product', $args );
	}
	add_action( 'init', 'prodotti_tassonomia_categoria', 0 );
	
	function prodotti_tassonomia_tag() {
		$labels = array(
			'name'              => __( 'Tag', 'taxonomy general name' ),
			'singular_name'     => __( 'Tag', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca tag' ),
			'all_items'         => __( 'Tutte i tag' ),
			'parent_item'       => __( 'Tag padre' ),
			'parent_item_colon' => __( 'Tag padre:' ),
			'edit_item'         => __( 'Modifica tag' ), 
			'update_item'       => __( 'Aggiorna tag' ),
			'add_new_item'      => __( 'Aggiungi nuovo tag' ),
			'new_item_name'     => __( 'Nome del tag' ),
			'menu_name'         => __( 'Tag' ),
			'not_found'         => __( 'Nessun Tag Prodotto trovato' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'product_tag', 'product', $args );
	}
	add_action( 'init', 'prodotti_tassonomia_tag', 0 );
	
	function prodotti_tassonomia_colore() {
		$labels = array(
			'name'              => __( 'Colore', 'taxonomy general name' ),
			'singular_name'     => __( 'Colore', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca colore' ),
			'all_items'         => __( 'Tutte i colori' ),
			'parent_item'       => __( 'Colore padre' ),
			'parent_item_colon' => __( 'Colore padre:' ),
			'edit_item'         => __( 'Modifica colore' ), 
			'update_item'       => __( 'Aggiorna colore' ),
			'add_new_item'      => __( 'Aggiungi nuova colore' ),
			'new_item_name'     => __( 'Nome del nuovo colore' ),
			'menu_name'         => __( 'Colore' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'colore', 'product', $args );
	}
	add_action( 'init', 'prodotti_tassonomia_colore', 0 );	
	
	function prodotti_tassonomia_tecnologia() {
		$labels = array(
			'name'              => __( 'Tecnologia', 'taxonomy general name' ),
			'singular_name'     => __( 'Tecnologia', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca tecnologia' ),
			'all_items'         => __( 'Tutte le tecnologie' ),
			'parent_item'       => __( 'Tecnologia tecnologia' ),
			'parent_item_colon' => __( 'Tecnologia tecnologia:' ),
			'edit_item'         => __( 'Modifica colore' ), 
			'update_item'       => __( 'Aggiorna colore' ),
			'add_new_item'      => __( 'Aggiungi nuova tecnologia' ),
			'new_item_name'     => __( 'Nome del nuovo tecnologia' ),
			'menu_name'         => __( 'Tecnologia' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'tecnologia', 'product', $args );
	}
	add_action( 'init', 'prodotti_tassonomia_tecnologia', 0 );	

	function prodotti_tassonomia_caratteristica() {
		$labels = array(
			'name'              => __( 'Caratteristica', 'taxonomy general name' ),
			'singular_name'     => __( 'Caratteristica', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca caratteristiche' ),
			'all_items'         => __( 'Tutte le caratteristiche' ),
			'parent_item'       => __( 'Caratteristica padre' ),
			'parent_item_colon' => __( 'Caratteristica padre:' ),
			'edit_item'         => __( 'Modifica caratteristica' ), 
			'update_item'       => __( 'Aggiorna caratteristica' ),
			'add_new_item'      => __( 'Aggiungi nuova caratteristica' ),
			'new_item_name'     => __( 'Nome della caratteristica' ),
			'menu_name'         => __( 'Caratteristica' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'caratteristica', 'product', $args );
	}
	add_action( 'init', 'prodotti_tassonomia_caratteristica', 0 );	
	
	function prodotti_tassonomia_taglia() {
		$labels = array(
			'name'              => __( 'Taglia', 'taxonomy general name' ),
			'singular_name'     => __( 'Taglia', 'taxonomy singular name' ),
			'search_items'      => __( 'Cerca taglia' ),
			'all_items'         => __( 'Tutte le taglie' ),
			'parent_item'       => __( 'Taglia padre' ),
			'parent_item_colon' => __( 'Taglia padre:' ),
			'edit_item'         => __( 'Modifica taglia' ), 
			'update_item'       => __( 'Aggiorna taglia' ),
			'add_new_item'      => __( 'Aggiungi nuova taglia' ),
			'new_item_name'     => __( 'Nome della taglia' ),
			'menu_name'         => __( 'Taglia' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'show_in_nav_menus'     => true,
		);
		register_taxonomy( 'taglia', 'product', $args );
	}
	add_action( 'init', 'prodotti_tassonomia_taglia', 0 );	