<?php get_header()?>

    <?php
        // Récupération des posts personnalisés du site
        $posts = get_posts(array(
            'numberposts' => 16,
            'post_type' => 'Photo', // Type de post personnalisé
        ));

        // Création du tableau pour stocker les IDs de post
        $post_ids = array();

        // Boucle sur les posts
        foreach ($posts as $post) {
        // Ajout de l'ID du post au tableau
        $post_ids[] = $post->ID;
        }

        // Affichage du tableau des IDs de post

        $total = count($post_ids);

        $random = rand(0, $total);
    ?>

    <div class="header-menu">
        <?php

        // Récupération du post
        $post = get_posts(array(
        'p' => $post_ids[$random], // ID du post
        'post_type' => 'Photo' // Type de post (article)
        ));

        // Configuration du contexte d'affichage du post
        setup_postdata($post[0]);

        // Affichage du titre et du contenu du post
        echo get_the_content();

        // Réinitialisation du contexte d'affichage du post
        wp_reset_postdata();
        ?>
        <div>
            <h2 class="title">Photographe Event</h2>
        </div>
    </div>

    <div class="all">

        <div class="navbar">

            <div class="title-filter">
                <p class="first-title-filter">Catégories</p>
                <p class="second-title-filter">Formats</p>
                <p class="third-title-filter">Trier par</p>
            </div>

            <div class="dropdown-1">
                <button class="dropbtn-1" id="buttonOneForJs" onclick="myFunction()">All</button>
                <i class="fa fa-caret-down arrow-1"></i>
                <div class="dropdown-content-1" id="myDropdown-1">
                    <a class="click" onclick="changeTextOne('All')">All</a>
                    <?php
                    $categories = get_categories(array('taxonomy' => 'categorie'));
                    foreach($categories as $category) {
                        $category_name = $category->name;
                        echo '<a class="click" onclick="changeTextOne(\''.$category_name.'\')">'.$category_name.'</a>';
                    }
                    ?>
                </div>
            </div>

            <div class="dropdown-2">
                <button class="dropbtn-2" id="buttonTwoForJs" onclick="myFunctionTwo()">All</button>
                <i class="fa fa-caret-down arrow-2"></i>
                <div class="dropdown-content-2" id="myDropdown-2">
                    <a class="click" onclick="changeTextTwo('All')">All</a>
                    <?php
                    $formats = get_categories(array('taxonomy' => 'format'));
                    foreach($formats as $format) {
                        $format_name = $format->name;
                        echo '<a class="click" onclick="changeTextTwo(\''.$format_name.'\')">'.$format_name.'</a>';
                    }
                    ?>
                </div>
            </div>



            <div class="dropdown-3">
                <button class="dropbtn-3" id="buttonThreeForJs" onclick="myFunctionThree()">Nouveautés</button>
                <i class="fa fa-caret-down arrow-3"></i>
                <div class="dropdown-content-3" id="myDropdown-3">
                <a class="click" onclick="changeTextThree('Nouveautés')">Nouveautés</a>
                <a class="click" onclick="changeTextThree('Les plus populaires')">Les plus populaires</a>
                <a class="click" onclick="changeTextThree('Plus anciens')">Plus anciens</a>
                </div>
            </div>
        </div>

        <div class="js-filter hideOne selectOne" id="overflowww">
        <?php 

        // Récupère le tableau d'objets de termes associés à l'article avec l'ID 96
        $terms = get_the_terms( 96, 'format' );

        // Vérifie que le tableau de termes n'est pas vide
        if ( $terms && ! is_wp_error( $terms ) ) {
        // Initialise la chaîne de texte
        $text = '';

        // Parcoure le tableau d'objets de termes
        foreach ( $terms as $term ) {
            // Ajoute le nom du terme à la chaîne de texte
            $text .= $term->name . ' ';
        }

        // Enlève toutes les balises HTML du texte
        $text = wp_strip_all_tags( $text );
        }

        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $query = new WP_Query($args);

        $fullscreenimg = get_template_directory_uri() . '/assets/images/fullscreen.png';
        $eyeimg = get_template_directory_uri() . '/assets/images/eye.png';

        if($query->have_posts()):
            while($query->have_posts()) : $query->the_post();

            //##################### FORMAT #########################

                // Récupère le tableau d'objets de termes associés à l'article avec l'ID 96
                $termsForFormat = get_the_terms( get_the_ID(), 'format' );

                // Vérifie que le tableau de termes n'est pas vide
                if ( $termsForFormat && ! is_wp_error( $termsForFormat ) ) {
                // Initialise la chaîne de texte
                $textFormat = '';

                // Parcoure le tableau d'objets de termes
                foreach ( $termsForFormat as $term1 ) {
                    // Ajoute le nom du terme à la chaîne de textFormate
                    $textFormat .= $term1->name . ' ';
                }

                // Enlève toutes les balises HTML du textFormate
                $textFormat = wp_strip_all_tags( $textFormat );
                }

                //##################### CATEGORIES #########################

                // Récupère le tableau d'objets de termes associés à l'article avec l'ID 96
                $termsForCategorie = get_the_terms( get_the_ID(), 'categorie' );

                // Vérifie que le tableau de termes n'est pas vide
                if ( $termsForCategorie && ! is_wp_error( $termsForCategorie ) ) {
                // Initialise la chaîne de texte
                $textCategorie = '';

                // Parcoure le tableau d'objets de termes
                foreach ( $termsForCategorie as $term2 ) {
                    // Ajoute le nom du terme à la chaîne de textFormate
                    $textCategorie .= $term2->name . ' ';
                }

                // Enlève toutes les balises HTML du textCategoriee
                $textCategorie = wp_strip_all_tags( $textCategorie );
                }

             //##################### RECUPERATION DU L'URL DE L'IMAGE #########################


                $post_content = get_the_content();
                $regex = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
                preg_match( $regex, $post_content, $matches );
                $image_url = $matches[1];


                echo '<div class="home-img all-img ' . $textFormat . ' '. $textCategorie . '">
                        <a href="' . get_permalink() . '">'. get_the_content() . '</a>
                        <a href="'. $image_url .'" class="lightbox-button-show"><img src="' . $fullscreenimg .'" class="fullscreen-home"/></a>
                        <img src="' . $eyeimg .'" class="eye-home"/>
                        <p class="title-pic-home">' . get_the_title(get_the_ID()) . '</p>
                        <span class="cat-home">' . get_the_term_list( get_the_ID(), 'categorie', '', ', ', '' ) . '</span>
                    </div>';

                   


            endwhile;
        endif;
        wp_reset_postdata();?>
        </div>

        <div class="js-filter hideTwo selectTwo" id="overflowww">
            <?php 

            // Récupère le tableau d'objets de termes associés à l'article avec l'ID 96
            $terms = get_the_terms( 96, 'format' );

            // Vérifie que le tableau de termes n'est pas vide
            if ( $terms && ! is_wp_error( $terms ) ) {
            // Initialise la chaîne de texte
            $text = '';

            // Parcoure le tableau d'objets de termes
            foreach ( $terms as $term ) {
                // Ajoute le nom du terme à la chaîne de texte
                $text .= $term->name . ' ';
            }

            // Enlève toutes les balises HTML du texte
            $text = wp_strip_all_tags( $text );
            }

            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC'
            );

            $query = new WP_Query($args);

            $fullscreenimg = get_template_directory_uri() . '/assets/images/fullscreen.png';
            $eyeimg = get_template_directory_uri() . '/assets/images/eye.png';

            if($query->have_posts()):
                while($query->have_posts()) : $query->the_post();

                //##################### FORMAT #########################

                    // Récupère le tableau d'objets de termes associés à l'article avec l'ID 96
                    $termsForFormat = get_the_terms( get_the_ID(), 'format' );

                    // Vérifie que le tableau de termes n'est pas vide
                    if ( $termsForFormat && ! is_wp_error( $termsForFormat ) ) {
                    // Initialise la chaîne de texte
                    $textFormat = '';

                    // Parcoure le tableau d'objets de termes
                    foreach ( $termsForFormat as $term1 ) {
                        // Ajoute le nom du terme à la chaîne de textFormate
                        $textFormat .= $term1->name . ' ';
                    }

                    // Enlève toutes les balises HTML du textFormate
                    $textFormat = wp_strip_all_tags( $textFormat );
                    }

                    //##################### CATEGORIES #########################

                    // Récupère le tableau d'objets de termes associés à l'article avec l'ID 96
                    $termsForCategorie = get_the_terms( get_the_ID(), 'categorie' );

                    // Vérifie que le tableau de termes n'est pas vide
                    if ( $termsForCategorie && ! is_wp_error( $termsForCategorie ) ) {
                    // Initialise la chaîne de texte
                    $textCategorie = '';

                    // Parcoure le tableau d'objets de termes
                    foreach ( $termsForCategorie as $term2 ) {
                        // Ajoute le nom du terme à la chaîne de textFormate
                        $textCategorie .= $term2->name . ' ';
                    }

                    // Enlève toutes les balises HTML du textCategoriee
                    $textCategorie = wp_strip_all_tags( $textCategorie );
                    }

                //##################### RECUPERATION DU L'URL DE L'IMAGE #########################


                    $post_content = get_the_content();
                    $regex = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
                    preg_match( $regex, $post_content, $matches );
                    $image_url = $matches[1];


                    echo '<div class="home-img all-img ' . $textFormat . ' '. $textCategorie . '">
                            <a href="' . get_permalink() . '">'. get_the_content() . '</a>
                            <a href="'. $image_url .'" class="lightbox-button-show"><img src="' . $fullscreenimg .'" class="fullscreen-home"/></a>
                            <img src="' . $eyeimg .'" class="eye-home"/>
                            <p class="title-pic-home">' . get_the_title(get_the_ID()) . '</p>
                            <span class="cat-home">' . get_the_term_list( get_the_ID(), 'categorie', '', ', ', '' ) . '</span>
                        </div>';

                endwhile;
            endif;
            wp_reset_postdata();?>
            </div>
    </div>        



    <div class="button-container-more">
        <div class="more-content" id="button-content">
            <span class="more-content-description">Charger plus</span>
            <span class="camera"><img src="<?php echo get_template_directory_uri() . '/assets/images/camera.png'; ?>"/></span>
        </div>
    </div>

    


<?php get_footer() ?>