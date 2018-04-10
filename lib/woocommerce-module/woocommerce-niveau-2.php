<?php
//wp_die("ça marche");

// ajout d'un contanu avant les produits  (le chiffre indique un ordre de priorité)
function woocom2_nouveau_contenu_avant_produit(){
	echo '<div>Mon texte</div>'; 
	the_title('<h1>', '</h1>');
}
add_action('woocommerce_before_shop_loop_item_title', 'woocom2_nouveau_contenu_avant_produit', 5);

// Changement de place pour "ajouter au panier"
//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 4);
// enlevé car enlève le lien

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
	// affiche en front des infos qu'on a pas là
	//var_dump($compo_textile); exit;

	//print_r($compo_textile); exit;
}
add_action('woocommerce_product_meta_end', 'woocom2_composition_textile', 5);


//Retirer les notes sur le produit
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
// création fonction avec une boucle et ajout add_action au bon moment sinon ça ne marche pas

add_action ('wp_head', 'woocom2_option_titre');
function woocom2_option_titre(){
if(get_field('woocom2_masquer_les_avis')){

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

	}
}