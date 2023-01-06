
			<?php $idOfPost = get_the_ID(); ?>

			<?php
				$tax =  get_the_terms(get_the_ID(), 'categorie');
				$firstTaxSlug = $tax[0]->slug;
				
				$taxonomy = 'categorie'; 
				$term = $firstTaxSlug; 

				$args = array(
				  'numberposts' => 16,
				  'post_type' => 'Photo', 
				  'tax_query' => array(
					array(
					  'taxonomy' => $taxonomy,
					  'field'    => 'slug',
					  'terms'    => $firstTaxSlug,
					),
				  ),
				);
				$posts = get_posts( $args );	
				
				$post_ids = array(); // tableau vide pour stocker les IDs des articles
				
				foreach ( $posts as $post ) {
				  // ajout de l'ID de chaque article au tableau
				  $post_ids[] = $post->ID;
				}
				
				$filtered_post_ids = array_diff($post_ids, [$idOfPost]);

				$total = count($filtered_post_ids);

				$random_one = rand(0, $total);
				$random_two = rand(0, $total);

				while ($filtered_post_ids[$random_one] == $filtered_post_ids[$random_two]){
					$random_one = rand(0, $total);
					$random_two = rand(0, $total);
				};


			
				$url1 = get_permalink($filtered_post_ids[$random_one]);

				$url2 = get_permalink($filtered_post_ids[$random_two]);

			?>



			<div id="mini-block-container">
				<a href="<?php echo $url1; ?>">
				<?php
				// Récupération du post
				$post = get_posts(array(
				'p' => $filtered_post_ids[$random_one], // ID du post
				'post_type' => 'Photo' // Type de post (article)
				));

				// Configuration du contexte d'affichage du post
				setup_postdata($post[0]);

				// Affichage du titre et du contenu du post
				echo get_the_content();

				// Réinitialisation du contexte d'affichage du post
				wp_reset_postdata();


				?></a>

				<?php
				$post_id = $filtered_post_ids[$random_one]; // remplacez 123 par l'ID du post souhaité
				$post_content = get_post_field( 'post_content', $post_id );
                $regex = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
                preg_match( $regex, $post_content, $matches );
                $image_url = $matches[1];?>

				<p id="title-pic"><?php echo get_the_title($filtered_post_ids[$random_one]);?></p>
				<span id="cat"><?php the_terms($filtered_post_ids[$random_one], 'categorie');?></span>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/eye.png'; ?>" id="eye"/>
				<a href="<?php echo $image_url; ?>" class="fullscreen-lightbox-one"><img src="<?php echo get_template_directory_uri() . '/assets/images/fullscreen.png'; ?>" id="fullscreen"/><a>
	
				
			</div>


			<div id="mini-block-container-2">
				<a href="<?php echo $url2; ?>">
				<?php

				// Récupération du post
				$post = get_posts(array(
				'p' => $filtered_post_ids[$random_two], // ID du post
				'post_type' => 'Photo' // Type de post (article)
				));

				// Configuration du contexte d'affichage du post
				setup_postdata($post[0]);

				// Affichage du titre et du contenu du post
				echo get_the_content();

				// Réinitialisation du contexte d'affichage du post
				wp_reset_postdata();

				?></a>

				<?php
				$post_id = $filtered_post_ids[$random_two]; // remplacez 123 par l'ID du post souhaité
				$post_content = get_post_field( 'post_content', $post_id );
                $regex = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
                preg_match( $regex, $post_content, $matches );
                $image_url = $matches[1];?>

				<p id="title-pic-2"><?php echo get_the_title($filtered_post_ids[$random_two]);?></p>
				<span id="cat-2"><?php the_terms($filtered_post_ids[$random_two], 'categorie');?></span>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/eye.png'; ?>" id="eye-2"/>
				<a href="<?php echo $image_url; ?>" class="fullscreen-lightbox-two"><img src="<?php echo get_template_directory_uri() . '/assets/images/fullscreen.png'; ?>" id="fullscreen-2"/></a>
	
				
			</div>

			