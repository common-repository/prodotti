<?php
  add_shortcode('prodotti_ultimiinseriti', 'prodotti_ultimiinseriti' );
  
  function prodotti_ultimiinseriti(){
		$prodotti_strReturn="<h2>Ultimi prodotti inseriti</h2>";
		$prodotti_args = array('posts_per_page' =>10,'post_type' => 'prodotti');
		$prodotti_ultimiprodottiinseriti = get_posts($prodotti_args);
		foreach( $prodotti_ultimiprodottiinseriti as $prodotto ){
			$prodotti_strReturn.="<p>".get_the_date('j F Y',$prodotto["ID"])."</p>";
			$prodotti_strReturn.="<a href=\"".get_permalink($prodotto["ID"])."\">".$prodotto["post_title"]."</a><hr>";
		}
	
		return $strReturn;
	}
