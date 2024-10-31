<?php
	function prodotti_menu() {
		add_options_page('Prodotti pagina', 'Prodotti', 'manage_options', 'prodotti', 'prodotti_opzioni');
	}
	
	function prodotti_opzioni_validate() {
		return true;
	}

  function prodotti_registraopzioni() { // whitelist options
	  register_setting( 'prodotti_opzioni', 'prodotti_facebook' );
	  register_setting( 'prodotti_opzioni', 'prodotti_youtube' );
	  register_setting( 'prodotti_opzioni', 'prodotti_twitter' );
	  register_setting( 'prodotti_opzioni', 'prodotti_agoogleplus' );
	  register_setting( 'prodotti_opzioni', 'prodotti_smtphost' );
	  register_setting( 'prodotti_opzioni', 'prodotti_smtpuser' );
	  register_setting( 'prodotti_opzioni', 'prodotti_smtppassword' );
	}
	
	function prodotti_opzioni() {
		global $prodotti_opzioni;
		?>
		<div class="wrap">
		<div class="icon32" id="icon-tools"><br /></div>
		<h2>Opzioni plugin prodotti</h2>
		<p>Inserisci i dati dell'agenzia prodotti o dell'impresa edile.</p>
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields('prodotti_opzioni'); ?>
			<?php do_settings_sections('prodotti'); ?>
			<table class="optiontable form-table">
			<tr valign="top">
				<th scope="row" colspan="2"><hr><strong>Configurazioni plugin</strong></th>
			</tr>
			<tr valign="top">
				<th scope="row" colspan="2"><hr><div id="icon-link-manager" class="icon32"></div><strong>Social</strong></th>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="prodotti_facebook">Indirizzo Facebook</label></th>
				<td><input name="prodotti_facebook" type="text" id="prodotti_facebook" value="<?php print(get_option('prodotti_facebook')); ?>" size="40" class="regular-text" />
				<span class="description">Indirizzo del profilo o della pagina FB</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="prodotti_youtube">Indirizzo YouTube</label></th>
				<td><input name="prodotti_youtube" type="text" id="prodotti_youtube" value="<?php print(get_option('prodotti_youtube')); ?>" size="40" class="regular-text" />
				<span class="description">Indirizzo canale YouTube</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="prodotti_twitter">Indirizzo Twitter</label></th>
				<td><input name="prodotti_twitter" type="text" id="prodotti_twitter" value="<?php print(get_option('prodotti_twitter')); ?>" size="40" class="regular-text" />
				<span class="description">Indirizzo del profilo Twitter</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="prodotti_googleplus">Indirizzo Google+</label></th>
				<td><input name="prodotti_googleplus" type="text" id="prodotti_googleplus" value="<?php print(get_option('prodotti_googleplus')); ?>" size="40" class="regular-text" />
				<span class="description">Indirizzo del profilo o della pagina Google+</span></td>
			</tr>
			<tr valign="top">
				<th scope="row" colspan="2"><hr><strong>Configurazioni di invio email</strong></th>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="prodotti_smtphost">host SMTP</label></th>
				<td><input name="prodotti_smtphost" type="text" id="prodotti_smtphost" value="<?php print(get_option('prodotti_smtphost')); ?>" size="40" class="regular-text" />
				<span class="description">Server della posta in uscita</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="prodotti_smtpuser">user SMTP</label></th>
				<td><input name="prodotti_smtpuser" type="text" id="prodotti_smtpuser" value="<?php print(get_option('prodotti_smtpuser')); ?>" size="40" class="regular-text" />
				<span class="description">Nome utente per invio posta SMTP</span></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="prodotti_smtppassword">password SMTP</label></th>
				<td><input name="prodotti_smtppassword" type="text" id="prodotti_smtppassword" value="<?php print(get_option('prodotti_smtppassword')); ?>" size="40" class="regular-text" />
				<span class="description">Password per invio posta SMTP</span></td>
			</tr>
			</table>
			<?php submit_button(); ?>
		</form>
		</div>
		<?php
	}

	if ( is_admin() ){ // admin actions
  	add_action( 'admin_menu', 'prodotti_menu' );
	  add_action( 'admin_init', 'prodotti_registraopzioni' );
	}