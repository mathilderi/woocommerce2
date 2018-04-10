<?php
// Ajouter du texte avec détail commande
 
add_action( 'woocommerce_email_before_order_table', 'gn_ajouter_coupon', 20 );
function gn_ajouter_coupon() {
 echo '<h2 id="h2thanks">Avoir une réduction de 20%</h2><p id="pthanks">Merci pour cet achat. Vous pouvez utiliser le code <strong>reviensstp</strong> pour avoir 20% sur le prochain achat.</p>';
}

/**
 * Hook pour retirer du texte 
 * @author Grégoire Noyelle
 * @note bien mettre le paramètre et la référence à la classe.
 */
add_action('woocommerce_email', 'woocom2_custom_wcom_email');
function woocom2_custom_wcom_email($email_class) {
	
	// Suppression des coordonnées du client
	remove_action( 'woocommerce_email_customer_details', array( $email_class, 'email_addresses' ), 20, 3 );
}


/**
 * @snippet       Add CSS to WooCommerce Emails
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=20648
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.6.2
 */
 
add_action( 'woocommerce_email_header', 'bbloomer_add_css_to_emails' );
  
function bbloomer_add_css_to_emails() {
?>
<style type="text/css">
h2 {
    color: red;
}
h3 {
    font-family: Courier;
}
table thead th {
    background: yellow;
}
</style>
<?php
}