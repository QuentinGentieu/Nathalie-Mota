<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>

    <div class="container">
        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?>" class ="logo-img"/></a>
        <div id="header-menu">  
                <?php
                if ( has_nav_menu( 'header-menu' ) ) : ?>
                <?php 
                wp_nav_menu ( array (
                'theme_location' => 'header-menu' ,
                'menu_class' => 'my-header-menu', // classe CSS pour customiser mon menu
                ) ); 
                ?>
                <?php endif;
                ?>
        </div>
        <a><img src="<?php echo get_template_directory_uri() . '/assets/images/menu.svg'; ?>" class ="menu-img-mobile"/></a>
        <a><img src="<?php echo get_template_directory_uri() . '/assets/images/closeMenu.svg'; ?>" class ="menuClose-img-mobile"/></a>
        <div class="navbar-mobile">
            <?php
                if ( has_nav_menu( 'header-menu' ) ) : ?>
                <?php 
                wp_nav_menu ( array (
                'theme_location' => 'header-menu' ,
                'menu_class' => 'my-header-menu-mobile', // classe CSS pour customiser mon menu
                ) ); 
                ?>
                <?php endif;
            ?>
        </div>
    </div>

    <?php wp_head() ?>
</head>
<body>
    
