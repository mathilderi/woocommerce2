<?php
//wp_die("ça marche");

// ajout d'un contanu avant les produits  (le chiffre indique un ordre de priorité)
function woocom2_nouveau_contenu_avant_produit(){
	echo '<div>Mon texte</div>'; 
	the_title('<h1>', '</h1>');
}
add_action('woocommerce_before_shop_loop_item_title', 'woocom2_nouveau_contenu_avant_produit', 5);