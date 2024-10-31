<?php
add_filter( 'rwmb_meta_boxes', 'prodotti_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function prodotti_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	$prefix = 'prodotti_';

	$meta_boxes[] = array(
		'id' => 'prodotto',
		'title' => __( 'Prodotto', 'meta-box' ),
		'pages' => array( 'product' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				'type' => 'heading',
				'name' => __( 'Dati dell\'prodotto', 'meta-box' ),
				'id'   => 'datiheading', // Not used but needed for plugin
			),
			array(
				// Field name - Will be used as label
				'name'  => __( 'codice', 'meta-box' ),
				'id'    => "{$prefix}codice",
				'type'  => 'text',
				'std'   => __( '', 'meta-box' ),
				'clone' => false
			),
			array(
				'name' => __( 'In vetrina', 'meta-box' ),
				'id'   => "{$prefix}vetrina",
				'type' => 'checkbox',
				'std'  => 0,
			),
			array(
				'type' => 'heading',
				'name' => __( 'Gallery', 'meta-box' ),
				'desc' => __( 'Selezione multipla della galleria delle foto del prodotto', '{$prefix}' ),
				'id'   => 'galleryheading', // Not used but needed for plugin
			),
			array(
				'name'             => __( 'Galleria immagini', 'meta-box' ),
				'id'               => "{$prefix}galleria",
				'type'             => 'image_advanced',
			),
			array(
				'type' => 'heading',
				'name' => __( 'Allegati (solo PDF)', 'meta-box' ),
				'desc' => __( 'Allegati quali schede tecniche, manuali, certificazioni', '{$prefix}' ),
				'id'   => 'allegatiheading', // Not used but needed for plugin
			),
			array(
				'name'             => __( 'File PDF da allegare', 'meta-box' ),
				'id'               => "{$prefix}allegati",
				'type'             => 'file_advanced',
				'max_file_uploads' => 5,
			),
			array(
				'type' => 'heading',
				'name' => __( 'Video', 'meta-box' ),
				'desc' => __( 'Seleziona il video dopo averlo caricato su YouTube', '{$prefix}' ),
				'id'   => 'videoheading', // Not used but needed for plugin
			),
			array(
				'name'  => __( 'Video YouTube', 'meta-box' ),
				'id'    => "{$prefix}video",
				'type'  => 'oembed',
			),
		)
	);
	return $meta_boxes;
}