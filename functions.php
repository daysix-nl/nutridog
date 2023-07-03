<?php



/**

 * Day Six theme functions and definitions

 * 

 * @package Day Six theme

 */


/*
|--------------------------------------------------------------------------
| Front-end styles en scripts
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function add_theme_scripts() {
    wp_enqueue_style( 'swiper',  'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', array(), '1.1', 'all');
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/script/parallax.js', array(), 1.1, true);
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/script/swiper.js', array(), 1.1, true);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/script/index.js', array(), 1.1, true);
  }
  add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


/*
|--------------------------------------------------------------------------
| Menu
|--------------------------------------------------------------------------
|
| 
| 
|
*/

function day_six_config(){
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'preview', 100, 100, array( 'center', 'center' ) );
}

add_action( 'after_setup_theme', 'day_six_config', 0 );



/*
|--------------------------------------------------------------------------
| WOOCOMMERCE SETUP
|--------------------------------------------------------------------------
|
| 
| 
|
*/



function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );




/*
|--------------------------------------------------------------------------
| FILTER SIDEBAR
|--------------------------------------------------------------------------
|
| 
| 
|
*/

register_sidebar( array(
  'name' => __( 'Filter sidebar', 'rmccollin' ),
  'id' => 'filter-sidebar',
  'description' => __( 'A widget area located to the left filter sidebar.', 'rmccollin' ),
  'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
  'after_widget' => '</div></div>',
  'before_title' => '<p class="large fbody regular fcd">',
  'after_title' => '</p>',
) );


// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );
 
// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter( 'use_widgets_block_editor', '__return_false' );



/*
|--------------------------------------------------------------------------
| ACF json files
|--------------------------------------------------------------------------
|
| 
| 
|
*/

/**
 * Save the ACF fields as JSON in the specified folder.
 * 
 * @param string $path
 * @returns string
 */
add_filter('acf/settings/save_json', function ($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});
/**
 * Load the ACF fields as JSON in the specified folder.
 *
 * @param array $paths
 * @returns array
 */
add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});




/*
|--------------------------------------------------------------------------
| header
|--------------------------------------------------------------------------
|
| 
| 
|
*/

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'header',
        'menu_title'    => 'Header',
        'menu_slug'     => 'header',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));    
}

/*
|--------------------------------------------------------------------------
| footer
|--------------------------------------------------------------------------
|
| 
| 
|
*/

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'footer',
        'menu_title'    => 'Footer',
        'menu_slug'     => 'footer',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));    
}

/*
|--------------------------------------------------------------------------
| categorien
|--------------------------------------------------------------------------
|
| 
| 
|
*/

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Categoriën',
        'menu_title'    => 'Categoriën',
        'menu_slug'     => 'catprod',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));    
}


 
// Voeg de onderstaande code toe aan het functions.php bestand van je thema

// Verwijder de kolommen 'Categorieën' en 'Uitgelicht' uit het WooCommerce productoverzicht
add_filter('manage_edit-product_columns', 'remove_product_columns');
function remove_product_columns($columns) {
    unset($columns['featured']); // Verwijder 'Categorieën'
    unset($columns['product_tag']); // Verwijder 'Uitgelicht'
    return $columns;
}

// Voeg de onderstaande code toe aan het functions.php bestand van je thema

// Voeg een nieuwe kolom toe voor de attributen onder de slug "filter"
add_filter('manage_edit-product_columns', 'add_filter_attributes_product_column');
function add_filter_attributes_product_column($columns) {
    $columns['product_filter_attributes'] = 'Filter Attributes'; // Voeg de kolom "Filter Attributes" toe aan het productoverzicht
    return $columns;
}

// Vul de nieuwe kolom met gegevens voor de attributen onder de slug "filter"
add_action('manage_product_posts_custom_column', 'fill_filter_attributes_product_column', 10, 2);
function fill_filter_attributes_product_column($column, $post_id) {
    if ($column === 'product_filter_attributes') {
        // Hier moet je de code plaatsen om de attributen onder de slug "filter" op te halen en weer te geven
        $product_attributes = wc_get_product($post_id)->get_attributes();
        if ($product_attributes) {
            foreach ($product_attributes as $attribute) {
                if ($attribute->get_name() === 'filter') {
                    // Haal de waarde van het "filter" attribuut op voor het product
                    $attribute_value = $attribute->get_options(); // Geeft een array van de attribuutopties terug
                    $attribute_value = implode(', ', $attribute_value); // Optionele stap: Als je meerdere opties hebt, kun je ze samenvoegen met een komma en spatie
                    echo $attribute_value;
                }
            }
        }
    }
}











