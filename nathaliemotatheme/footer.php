
<?php get_template_part('template-parts/modal-template'); ?>

<div id="footer-menu">  
    <?php
        if ( has_nav_menu( 'footer-menu' ) ) : ?>
    <?php 
        wp_nav_menu ( array (
        'theme_location' => 'footer-menu' ,
        'menu_class' => 'my-footer-menu', // classe CSS pour customiser mon menu
        ) ); 
    ?>
    <?php endif;
   ?>
</div>

<?php wp_footer()?>
</body>
</html>