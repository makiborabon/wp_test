<?php 

// Styles
wp_enqueue_style( 'style', get_stylesheet_uri() );
wp_enqueue_style( 'navbar', get_template_directory_uri() . '/assets/css/navbar.css', false,'1.1','all');




// Scripts
wp_enqueue_script( 'navbar', get_template_directory_uri() . '/assets/js/navbar.js', array ( 'jquery' ), 1.1, true);

wp_enqueue_script( 'sample', get_template_directory_uri() . '/assets/js/sample.js', array ( 'jquery' ), 1.1, true);



function bagong_theme_register_sidebars() {
    register_sidebar( array(
        'name' => 'Berting',
        'id' => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );


}
add_action( 'widgets_init', 'bagong_theme_register_sidebars' );


function bagong_theme_sidebar_2_register_sidebars() {
    register_sidebar(
        array_merge(
            array( 'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),),
            array(
                'name'        => __( 'Footer #2', 'twentytwenty' ),
                'id'          => 'sidebar-2',
            )
        )
    );
}
add_action( 'widgets_init', 'bagong_theme_sidebar_2_register_sidebars' );




