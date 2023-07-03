<?php $currentUrl = $_SERVER['REQUEST_URI']; ?>
<section class="relative overflow-hidden">
    <section class="container mt-2">
        <div class="grid grid-cols-2">
        <p class="flex flex-row items-center text-black text-12 mb-4"><a href="/">Home</a> <span class="w-[4px] h-[4px] rounded-full bg-white block mx-1"></span> <a href="/producten">Producten</a></p>
        <div class="flex justify-end">
            <?php
            /**
             * Hook: woocommerce_archive_description.
             *
             * @hooked woocommerce_taxonomy_archive_description - 10
             * @hooked woocommerce_product_archive_description - 10
             */
            do_action( 'woocommerce_archive_description' );
            ?>
        </div>
        </div>
        

    </section>
</section>




<section class="mt-0 mb-12">
    <div class="container grid grid-cols-4 relative ">
        <div class="hidden md:block col-span-1 h-full pr-[12.5px]">
            <div class="sticky top-[150px] input-block">
                <?php   if ( is_active_sidebar( 'filter-sidebar' ) ) { ?>
           
                        <?php dynamic_sidebar( 'filter-sidebar' ); ?>
                  
                <?php } ?>
          
        </div>
        
        <div class="card-container col-span-4 md:col-span-3 grid grid-cols-1 gap-3 relative h-auto">
            <div class="col-span-1">

                <?php
                if( have_rows('cpt_categorien', 'option') ): ?>
                    <?php while( have_rows('cpt_categorien', 'option') ): the_row(); ?>
                        <?php if( get_row_layout() == 'cpt_categorien_repeater'): ?>

                        
                            <?php
                                    $showcategorie = get_sub_field('slug', 'option');
                                        if (strpos($currentUrl, $showcategorie) !== false) { ?>
                                            <h1 class="text-22 leading-28 md:text-28 md:leading-32 font-titel"><?php the_sub_field('titel', 'option'); ?></h1>
                                            <p class="text-16 leading-22 text-grijs pt-2 max-w-[800px]"><?php the_sub_field('eerste_alinea', 'option');?></p>
                                            <hr class="hadow-block max-w-[800px] mt-4 mb-1">
                                            <?php
                                        } else {
                                        }
                                    ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <div class="col-span-1 grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">                          
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,

                        );
                    $loop = new WP_Query( $args );
                    if ( $loop->have_posts() ) {
                        while ( $loop->have_posts() ) : $loop->the_post(); 
                        $product = wc_get_product( get_the_ID() );
                        $active_price  = $product->get_price();
                        $regular_price = $product->get_regular_price();?>

                        <div class="col-span-1 h-full relative pb-[95px] bg-one shadow-block md:hover:scale-105 duration-300">
                            <div class="relative bg-one ">
                                <a class="bg-half aspect-square flex justify-center items-center py-3" href="<?php the_permalink(); ?>">
                                    <img class="h-full" src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="">
                                </a>
                                <div class="bg-one px-[15px] md:px-3 pb-3 text-ellipsis overflow-hidden">
                                    <a class="text-16 leading-20 font-titel" href="<?php the_permalink(); ?>"><?php echo $loop->post->post_title; ?></a>
                                    <p class="text-14 leading-20 pt-2 text-grijs"><?php echo $loop->post->post_excerpt; ?></p>
                                </div>
                               <?php 
                                if ( $product->is_on_sale() ) {
                                    $regular_price = $product->get_regular_price();
                                    $sale_price = $product->get_sale_price();

                                    if ( $regular_price && $sale_price ) {
                                        $discount_percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
                                        echo '<span class="absolute top-1 left-1 bg-geel px-1 py-[5px] text-white text-13">' . $discount_percentage . '% korting</span>';
                                    }
                                }
                                ?>
                            </div>
                             <div class="absolute bottom-0 left-0 right-0">
                                <div class="px-[15px] md:px-3 pb-3">
                                    <p class="text-20 leading-20 pt-4 text-roze font-titel font-black price"><?php if ( $price_html = $product->get_price_html() ) : ?><?php echo $price_html; ?><?php endif; ?></p>
                                </div>
                                <?php
                                // Controleer of het product een simple product is
                                if ( 'simple' === get_post_type() ) { ?>
                                <div class="grid grid-cols-1 lg:grid-cols-2">
                                    <a class="hidden lg:block col-span-1 bg-one px-2 py-[8px] hover:opacity-80 duration-300" href="#">
                                         <p class="text-13 leading-13 text-center">In winkelwagen</p>
                                    </a>
                                    <a class="col-span-1 bg-roze px-2 py-[7px] hover:opacity-80 duration-300" href="<?php the_permalink(); ?>">
                                        <p class="text-13 leading-13 text-center text-white">Bekijk product</p>
                                    </a>
                                </div>
                                    <?php
                                } 
                                // Controleer of het product een variable product is
                                elseif ( 'product' === get_post_type() && function_exists( 'wc_get_product' ) ) {
                                    $product = wc_get_product( get_the_ID() );
                                    // Controleer of het variable product variaties heeft
                                    if ( $product->is_type( 'variable' ) && $product->has_child() ) { ?>
                                    <div class="grid grid-cols-1">
                                        <a class="col-span-1 bg-roze px-2 py-[8px] hover:opacity-80 duration-300" href="<?php the_permalink(); ?>">
                                            <p class="text-13 leading-13 text-center text-white">Bekijk product</p>
                                        </a>
                                    </div>
                                    <?php
                                    } else { ?>
                                    <div class="grid grid-cols-1 lg:grid-cols-2">
                                         <a class="hidden lg:block col-span-1 bg-one px-2 py-[8px] hover:opacity-80 duration-300" href="#">
                                            <p class="text-13 leading-13 text-center">In winkelwagen</p>
                                        </a>
                                        <a class="col-span-1 bg-roze px-2 py-[7px] hover:opacity-80 duration-300" href="<?php the_permalink(); ?>">
                                            <p class="text-13 leading-13 text-center text-white">Bekijk product</p>
                                        </a>
                                    </div>
                                        <?php
                                    }
                                }
                                ?>
                               
                            </div>
                        </div>  


                       
                 
                        
                        <?php
                            endwhile;
                    } else {
                        echo __( 'Geen producten gevonden.' );
                    }
                    wp_reset_postdata();
                ?>
                

                </div>  
                <div class="col-span-1">
                     <div class="">
                         <?php
                        if( have_rows('cpt_categorien', 'option') ): ?>
                            <?php while( have_rows('cpt_categorien', 'option') ): the_row(); ?>
                                <?php if( get_row_layout() == 'cpt_categorien_repeater'): ?>

                                
                                    <?php
                                            $showcategorie = get_sub_field('slug', 'option');
                                                if (strpos($currentUrl, $showcategorie) !== false) { ?>
                                                    <div class="contentfield mt-6">
                                                        <?php the_sub_field('overige_teksten', 'option');?>
                                                    </div>
                                                    <?php
                                                } else {
                                                }
                                            ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
             
                    </div>
                </div>
        </div>
       
    </div>
</section>

<div class="section">
    <div class="container">
      
    </div>
</div>

<!-- <script>
    try {
  var mArea = document.querySelector("body");

  // 1. Set the function and variables
  function parallaxIt(e, target, movement = 0.05) {
    var boundingRect = mArea.getBoundingClientRect();
    var relX = e.pageX - boundingRect.left;
    var relY = e.pageY - boundingRect.top;
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    gsap.to(target, {
      x: (relX - boundingRect.width / 2) * movement,
      y: (relY - boundingRect.height / 2 - scrollTop) * movement,
      ease: "power1",
      duration: 0.6,
    });
  }

  // 2. Call the function
  function callParallax(e) {
    parallaxIt(e, ".image-floating");
  }

  mArea.addEventListener("mousemove", function (e) {
    callParallax(e);
  });
} catch (error) {}
</script> -->


<?php get_footer(); ?>