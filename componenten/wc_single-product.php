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
                    <div class="md:col-span-1 md:pt-3 pl-5">
                        <div class="text-ellipsis overflow-hidden">
                            <?php
                        do_action( 'woocommerce_single_product_summary' );
                        ?>
                        </div>
                    </div>

                   
                    

                    <div class="md:col-span-2 grid md:mt-6 gap-y-4 gap-x-2.5 md:mr-4 items-start">
                        <div class="contentfield text-grijs items-start">
                            <h2 class="text-28 leading-28 mb-1 text-black font-titel">Product informatie</h2>
                            <?php the_content();?>
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