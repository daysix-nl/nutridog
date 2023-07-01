<?php 
/**
 * The template for displaying the header
 * 
 * @package Day Six theme
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Montserrat:wght@600;900&display=swap" rel="stylesheet">
    <title><?php bloginfo( 'name' ); ?> | <?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>


<body <?php body_class( 'page-block xxl' ); ?>>
   
<header>
    <div class="fixed z-50 top-0">
        <!-- MOBILE NAVBAR -->
         <div class="bg-three w-screen block md:hidden">
            <div class="flex justify-between items-center py-1 container">
                <div class="col-span-1 flex items-center">
                    <a href="#" class="relative mr-[15px]">
                       <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                    </a>
                    <a href="/" class="text-30 font-titel text-white">dogcarexxl.nl</a>
                </div>
                <div class="col-span-1"></div>
                <div class="col-span-1 flex justify-end mr-[7px]">
                    <div class="flex">
                        <a href="/dashboard" class="relative mr-[15px]">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                        </a>
                        <a href="/checkout" class="relative">
                            <span class="absolute top-[-7px] right-[-7px] h-[15px] w-[15px] bg-geel rounded-full flex justify-center items-center"><p class="text-white text-10 leading-10"><?php echo WC()->cart->get_cart_contents_count(); ?></p></span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#000000}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- DESKTOP TOP NAVBAR -->
        <div class="bg-white w-screen py-[7px] hidden md:block">
            <div class="grid grid-cols-3 container">
                <div class="cols-span-1 flex">
                    <svg width="13px" height="auto" class="mr-1" viewBox="0 0 20 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <polygon id="path-1" points="0 0 20 0 20 18 0 18"></polygon>
                        </defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="S" transform="translate(-779.000000, -422.000000)">
                                <g id="Vinkje" transform="translate(779.000000, 422.000000)">
                                    <mask id="mask-2" fill="white">
                                        <use xlink:href="#path-1"></use>
                                    </mask>
                                    <g id="Clip-2"></g>
                                    <path d="M19.2050185,0.324182442 C18.3426623,-0.226975121 17.1298084,-0.0570889073 16.5002354,0.69507906 L6.71143335,12.4094467 L3.45511249,8.80811838 C2.79115105,8.07540303 1.57432929,7.95220311 0.735780378,8.5292975 C-0.104091166,9.10639189 -0.245612828,10.1710986 0.417025981,10.8999234 L6.83576079,18.0001297 L19.6282609,2.68443365 C20.2578339,1.929672 20.0686975,0.874043163 19.2050185,0.324182442" id="Fill-1" fill="#F4C650" mask="url(#mask-2)"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <p class="text-left text-12 text-grijs">Gratis verzending vanaf 50 euro</p>
                </div>
                <div class="cols-span-1 flex mx-auto">
                    <svg width="13px" height="auto" class="mr-1" viewBox="0 0 20 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <polygon id="path-1" points="0 0 20 0 20 18 0 18"></polygon>
                        </defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="S" transform="translate(-779.000000, -422.000000)">
                                <g id="Vinkje" transform="translate(779.000000, 422.000000)">
                                    <mask id="mask-2" fill="white">
                                        <use xlink:href="#path-1"></use>
                                    </mask>
                                    <g id="Clip-2"></g>
                                    <path d="M19.2050185,0.324182442 C18.3426623,-0.226975121 17.1298084,-0.0570889073 16.5002354,0.69507906 L6.71143335,12.4094467 L3.45511249,8.80811838 C2.79115105,8.07540303 1.57432929,7.95220311 0.735780378,8.5292975 C-0.104091166,9.10639189 -0.245612828,10.1710986 0.417025981,10.8999234 L6.83576079,18.0001297 L19.6282609,2.68443365 C20.2578339,1.929672 20.0686975,0.874043163 19.2050185,0.324182442" id="Fill-1" fill="#F4C650" mask="url(#mask-2)"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <p class="text-center text-12 text-grijs">Voor 15:00 besteld de volgende werkdag in huis</p>
                </div>
                <div class="cols-span-1 flex justify-end">
                    <p class="text-right text-12 text-grijs mr-3">Klantenservice</p>
                    <p class="text-right text-12 text-grijs">Inloggen</p>
                </div>
            </div>    
        </div>
        <!-- DESKTOP NAVBAR -->
        <div class="bg-roze w-screen">
            <div class="flex justify-between items-center pb-2 md:pb-0 h-5 md:h-8 container">
                <div class="col-span-1 hidden md:block">
                    <a href="/" class="text-30 font-titel text-white relative">dogcarexxl.nl</a>
                </div>
                <div class="col-span-1 w-full md:w-[50%]">
                    <?php aws_get_search_form( true ); ?>
                </div>
                <div class="col-span-1 hidden md:flex justify-end">
                    <div class="flex">
                        <a href="/producten" class="mr-3 text-white">Categorieën</a>
                        <a href="/checkout" class="relative">
                            <span class="absolute top-[-7px] right-[-7px] h-[15px] w-[15px] bg-geel rounded-full flex justify-center items-center"><p class="text-white text-10 leading-10"><?php echo WC()->cart->get_cart_contents_count(); ?></p></span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#fff}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
     
        
    </div>

</header>

<main>