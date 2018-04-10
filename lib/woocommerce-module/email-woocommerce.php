<?php
// Ajouter du texte avec détail commande
 
add_action( 'woocommerce_email_before_order_table', 'gn_ajouter_coupon', 20 );
function gn_ajouter_coupon() {
 echo '<h2 id="h2thanks">Avoir une réduction de 20%</h2><p id="pthanks">Merci pour cet achat. Vous pouvez utiliser le code <strong>reviensstp</strong> pour avoir 20% sur le prochain achat.</p>';
}