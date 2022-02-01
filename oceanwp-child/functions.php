<?php
/* enqueue script for parent theme stylesheeet */
function childtheme_parent_styles() {
 
 // enqueue style
 wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'childtheme_parent_styles');

/*
* On utilise une fonction pour créer notre custom post type 'Séries TV'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Compétence', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Compétences', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Compétences'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'toutes les Compétences'),
		'view_item'           => __( 'Voir les Compétences'),
		'add_new_item'        => __( 'Ajouter une nouvelle Compétence'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la Compétence'),
		'update_item'         => __( 'Modifier la Compétence'),
		'search_items'        => __( 'Rechercher une Compétence'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Compétences'),
		'description'         => __( 'Compétences'),
		'labels'              => $labels,
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'Compétences'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'Compétences', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );