<?php the_title( '<h1 class="text-24 leading-24 font-titel">', '</h1>' ); ?>
<?php global $product;?>
<p class="text-28 leading-28 pb-3 price text-roze font-titel font-black mt-1"><?php echo $product->get_price_html(); ?></p>
