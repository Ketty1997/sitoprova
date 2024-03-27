<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
	$parenthandle = 'chaplin-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);
	wp_enqueue_style( 'chaplin-child',
		get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);
}

/*
function wpspecial_script_header_pagina() {
	if (is_page('394')) { // Inserisci l'ID della pagina
	
		?>
		<script>
			
			

		
		</script>
		<?php
	}
}
add_action('wp_head', 'wpspecial_script_header_pagina');
*/


function wpspecial_script_footer() {
	?>
		<script>
			


			//funzione che cicla i titoli dell'indice servizi e aggiunge la classe col colre diverso
			let titoli = document.querySelectorAll(".titles");
			for(let i =0; i<titoli.length; i++) {

				titoli[i].addEventListener("click", function() {
					console.log("titolino")
					for(let y =0; y<titoli.length; y++) {
						titoli[y].classList.remove("attivo");
						
					}
					this.classList.add("attivo");
				});
			}



			//jquery
				//-------------------------------------------------
				jQuery( document ).ready( function($) {
					
					//toggle in amministr.trasp-> sezione che si estende al click
					$( ".item__title" ).on("click", function() {
						
						$(".item__content").toggleClass("item__content--open");

					})
					//toggle in amministr.trasp-> sezione che si estende al click
					$( ".item__title2" ).on("click", function() {
						
						$(".item__content2").toggleClass("item__content--open");

					})

				});
				//_--------------------



		</script>
	<?php
}
add_action('wp_footer', 'wpspecial_script_footer');



//funzione che importa jqery -------------------
function my_theme_scripts() {
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );
