<?php
//wp_die("ça marche");

// ajout d'un contanu avant les produits  (le chiffre indique un ordre de priorité)
function woocom2_nouveau_contenu_avant_produit(){
	echo '<div>Mon texte</div>'; 
	the_title('<h1>', '</h1>');
}
add_action('woocommerce_before_shop_loop_item_title', 'woocom2_nouveau_contenu_avant_produit', 5);

// Changement de place pour "ajouter au panier"
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 4);
// Changement de place pour "prix"; il faut changer la priorité car si on laisse 10 il affiche d'abord l'image qui est programée par woocommerce
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 3 );