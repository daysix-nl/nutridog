<?php while ( have_posts() ) : ?>
<?php the_post(); ?>
<?php
do_action( 'woocommerce_before_single_product' );
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
} ?>



<section class="pt-2">
    <div class="container grid md:grid-cols-2">
        <p class="flex flex-row items-center text-green text-12"><a href="">Home</a>  <span class="w-[4px] h-[4px] rounded-full bg-green block mx-1"></span> <a href="/producten">Producten</a> <span class="w-[4px] h-[4px] rounded-full bg-green block mx-1"></span> <a href=""><?php the_title(); ?></a></p>
        <p class="flex flex-row items-center text-green text-[14.56px] justify-end"><a href="javascript:history.go(-1)" class="back-button">Stap terug</a> </p>
    </div>
</section>
    <!-- Swiper -->
        <?php 
        defined( 'ABSPATH' ) || exit;
        // Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
        if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
            return;
        }
        global $product;
        ?>
        <section class="mt-2 md:mt-4 mb-10">
            <div class="container grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="col-span-1">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2 shadow-block h-[50vw] md:h-auto">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide overflow-hidden aspect-square flex justify-center items-center py-3 cursor-grabbing bg-one">
                                    <img class="h-full" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />
                                </div>                                  
                            <?php $attachment_ids = $product->get_gallery_image_ids();
                                foreach( $attachment_ids as $attachment_id ) 
                                { ?>
                                <div class="swiper-slide overflow-hidden aspect-square flex justify-center items-center py-3 cursor-grabbing bg-one">
                                    <img class="h-full" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />
                                </div>    
                            <?php } ?>
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper mt-2 md:mt-3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide overflow-hidden aspect-square flex justify-center items-center py-1 cursor-pointer bg-one">
                                    <img class="h-full" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />
                                </div>    
                            <?php $attachment_ids = $product->get_gallery_image_ids();
                                foreach( $attachment_ids as $attachment_id ) 
                                { ?>
                                <div class="swiper-slide rounded-3xl overflow-hidden w-full cursor-pointer bg-one">
                                    <img class="aspect-square object-cover h-full w-full" src="<?php echo $Original_image_url = wp_get_attachment_url( $attachment_id ); ?>" />
                                </div>   
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-1 md:pt-3">
                        <div class="text-ellipsis overflow-hidden">
                            <?php
                        do_action( 'woocommerce_single_product_summary' );
                        ?>
                        </div>
                    </div>

                     <div class="shadow-block md:hidden bg-white my-3 p-3">
                             
                            <?php

                            // Check rows existexists.
                            if( have_rows('repeater_usps') ):

                                // Loop through rows.
                                while( have_rows('repeater_usps') ) : the_row(); ?>

                                    <div class="flex">
                                        <div class="w-fit mr-2"><?php include get_template_directory() . '/img/icons/vinkje.php'; ?></div>
                                        <div class="text-18 leading-28 text-grijs"><?php the_sub_field('repeater_usps_item');?></div>
                                    </div>
                                <?php
                                // End loop.
                                endwhile;

                            // No value.
                            else :
                                // Do something...
                            endif; ?>

                        </div>
                    

                    <div class="md:col-span-2 grid md:mt-6 gap-y-4 gap-x-2.5 md:mr-4 items-start">
                        <div class="contentfield text-grijs items-start">
                            <h2 class="text-28 leading-28 mb-1 text-black font-titel">Product informatie</h2>
                            <?php the_content();?>
                        </div>
                    </div>
                </div>

                <div class="col-span-1 hidden md:block">
                    <div class="grid">
                        <div class="shadow-block bg-white p-3">
                             
                            <?php

                            // Check rows existexists.
                            if( have_rows('repeater_usps') ):

                                // Loop through rows.
                                while( have_rows('repeater_usps') ) : the_row(); ?>

                                    <div class="flex">
                                        <div class="w-fit mr-2"><?php include get_template_directory() . '/img/icons/vinkje.php'; ?></div>
                                        <div class="text-18 leading-28 text-grijs"><?php the_sub_field('repeater_usps_item');?></div>
                                    </div>
                                <?php
                                // End loop.
                                endwhile;

                            // No value.
                            else :
                                // Do something...
                            endif; ?>

                        </div>
                           <div class="col-span-1 pt-6 pb-2">
                            <p class="font-titel">Bekijk ook deze eens:</p>
                        </div>
                        <div class="col-span-1 grid grid-cols-2 gap-2 h-full">
                                
                <?php   global $post;
                $terms = get_the_terms( $post->ID, 'product_cat' );
                $nterms = get_the_terms( $post->ID, 'product_tag'  );
                foreach ($terms  as $term  ) {
                    $product_cat_id = $term->term_id;
                    $product_cat_name = $term->name;
                    break;
                }
                ?>
                        <?php                     
                        $loop = new WP_Query( array(
                            'post_type' => 'product',
                            'posts_per_page' => 6,
                            'orderby' => 'RAND',
							'product_cat' => $product_cat_name
                        ));
                        ?>

                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <div class="col-span-1 relative bg-one shadow-block">
                            <div class="relative bg-one pb-6">
                                <a class="bg-half aspect-square flex justify-center items-center py-2" href="<?php the_permalink(); ?>">
                                    <img class="h-full" src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="">
                                </a>
                                <div class="bg-one px-[15px] pb-2 text-ellipsis overflow-hidden">
                                    <a class="text-12 leading-12 font-titel" href="<?php the_permalink(); ?>"><?php echo $loop->post->post_title; ?></a>
                                    <p class="text-12 leading-16 pt-1 text-grijs"><?php echo $loop->post->post_excerpt; ?></p>
                                </div>
                                <?php 
                                if ( $product->is_on_sale() ) {
                                    $regular_price = $product->get_regular_price();
                                    $sale_price = $product->get_sale_price();

                                    if ( $regular_price && $sale_price ) {
                                        $discount_percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
                                        echo '<span class="absolute top-1 left-1 bg-geel px-1 py-[5px] text-white text-12">' . $discount_percentage . '% korting</span>';
                                    }
                                }
                                ?>
                            </div>
                             <div class="absolute bottom-0 left-0 right-0">
                                <div class="px-[15px] pb-2">
                                    <p class="text-16 leading-16 pt-2 price text-roze font-titel font-black"><?php if ( $price_html = $product->get_price_html() ) : ?><?php echo $price_html; ?><?php endif; ?></p>
                                </div>
                                  <div class="grid grid-cols-1">
                                    <a class="col-span-1 bg-three px-2 py-[7px] hover:opacity-80 duration-300" href="<?php the_permalink(); ?>">
                                        <p class="text-14 text-center text-white">Bekijk product</p>
                                    </a>
                                </div>
                            </div>
                        </div>  
                        <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>


        </section>
       








<?php do_action( 'woocommerce_after_single_product' ); ?>
<?php endwhile; // end of the loop. ?>


   <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 6,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 0,
  effect: 'fade',
        thumbs: {
        swiper: swiper,
        },
    });
    </script>

<script>
setTimeout(function() {
    jQuery('.woocommerce-message').slideUp()
}, 3000);
</script>