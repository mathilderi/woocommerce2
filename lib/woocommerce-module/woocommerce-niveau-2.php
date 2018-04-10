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


// fiche produit, nouveau contenu  : ajout d'un contenu après le produit  (le chiffre indique un ordre de priorité)


function woocom2_composition_textile(){
	// champ ACF
	$compo_textile = get_field('woocom2_composition_textile');
	if($compo_textile){
		echo "<p class='compo-textile'>{$compo_textile}</p>"; 
		// si on met pas le else, rien ne s'affichera à la place
	}else{
		echo "<p class='compo-textile'>Aucune composition disponible</p>"; 
	}
	
	
}
add_action('woocommerce_product_meta_end', 'woocom2_composition_textile', 5);
