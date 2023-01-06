<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();?>

	<div class="single-container">
		<div class="first-box-container">
			<?php
				$id = get_the_ID();
			?>
			<div class="text-container">
				<h2 class="title-img"><?php echo get_the_title($id);?></h2>

				<div class="paragraphe-info">
					<p>Référence : <?php the_field('Reference'); ?> </p> 
					<p class="styling-tax">Catégorie : <?php the_terms(get_the_ID(), 'categorie');?></p>
					<p class="styling-tax">Format : <?php the_terms(get_the_ID(), 'format');?> </p>
					<p>Type : <?php the_field('Type'); ?></p>
					<p>Année : <?php the_field('Date'); ?></p>
				</div>
			</div>
		</div>

		<div class="second-box-container">
			<div id="second-show-image">
				<?php if(have_posts()){
					while(have_posts()){
						the_post();
						the_content();
					}
				}?>

				<?php
				$post_content = get_the_content();
                $regex = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
                preg_match( $regex, $post_content, $matches );
                $image_url = $matches[1];
				?>

				<a href="<?php echo $image_url; ?>" class="lightbox-button-single"><img src="<?php echo get_template_directory_uri() . '/assets/images/fullscreen.png'; ?>" id="fullscreen-big-image"/></a>
			</div>
		</div>

	</div>

	<div class="third-box-container">
		<div class="short-lign"></div>
		<div class="box-for-height">
			<div class="container-btn-text">
				<p class="text-interest"> Cette photo vous intéresse ? </p>
				<div id="outer">
					<div class="button_slide slide_right myBtnP" id="hop"><span id="text">Contact</span></div>
				<br /> <br /><br />
				</div>
				<div class="container-pop">
					<div class="show-block-container">
						<?php

							// Récupération du post
							$post = get_posts(array(
							'p' => (get_the_ID() + 2), // ID du post
							'post_type' => 'Photo' // Type de post (article)
							));

							// Configuration du contexte d'affichage du post
							setup_postdata($post[0]);

							// Affichage du contenu du post
							echo '<div class="img-after">' . get_the_content() . '</div>';

							// Réinitialisation du contexte d'affichage du post
							wp_reset_postdata();

						?>
						<?php

							// Récupération du post
							$post = get_posts(array(
							'p' => (get_the_ID() - 2), // ID du post
							'post_type' => 'Photo' // Type de post (article)
							));

							// Configuration du contexte d'affichage du post
							setup_postdata($post[0]);

							// Affichage du titre et du contenu du post
							echo '<div class="img-before">' . get_the_content() . '</div>';

							// Réinitialisation du contexte d'affichage du post
							wp_reset_postdata();

						?>
						
					</div>
					<div class="img-container">
						<a href="<?php echo get_permalink(get_the_ID() - 2); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/left-arrow.png'; ?>" id ="left-arrow"/></a>
						<a href="<?php echo get_permalink(get_the_ID() + 2); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/right-arrow.png'; ?>" id ="right-arrow"/></a>
					</div>
				</div>
			</div>
		</div>
		<div class="long-lign"></div>
	</div>
	

	<div class="fourth-box-container">

		<h2 class="styling-small-header">Vous aimerez aussi</h2>
		<div class="second-fourth-box-container">
			<?php get_template_part('template-parts/photo_block'); ?>
		</div>	
	</div>

	<div id="box-photo">
				<a href="<?php echo home_url();?>" class="button-all-gallery"><div class="button_slide slide_right every-photos" id="hop"><span id="text">Toutes les photos</span></div></a>
			<br /> <br /><br />
			</div>

	<script>
	
		$(document).ready(function(){
			$(".form-photo").val('<?php the_field('Reference'); ?>');
		});

	</script>

<?php get_footer();
