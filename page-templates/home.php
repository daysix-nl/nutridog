<?php
/**
 * Template name: Homepage
 */


 get_header(); ?>
 

<div class="bg-geel flex items-center w-screen h-[calc(85vh-98px)] md:h-[calc(100vh-112px)] relative overflow-hidden bg-cover bg-center" style="background-image: url('');">
    <video class="w-full h-full object-cover absolute top-0 right-0" autoplay="" loop="" muted="" playsinline="">
        <source src="/wp-content/themes/nutridog/img/local/test3.mp4">
    </video>
    <div class="absolute top-0 left-0 right-0 bottom-0" style="box-shadow: rgb(0 0 0 / 10%) 0 0 0 100vw inset;"></div>
    <div class="container z-10">
        <div class="flex flex-col md:justify-center items-center mb-5">
            <h1 class="text-25 leading-25 md:text-40 md:leading-60 mb-3 text-one font-titel">Alles voor een gezonde hond</h1>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-[15px] w-full">
                <a href="/producten" class="col-span-1 flex items-center justify-center py-1 text-15 bg-white text-grijs hover:opacity-[.8] duration-300">Mondverzorging</a>
                <a href="/producten" class="col-span-1 flex items-center justify-center py-1 text-15 bg-white text-grijs hover:opacity-[.8] duration-300">Oorverzorging</a>
                <a href="/producten" class="col-span-1 flex items-center justify-center py-1 text-15 bg-white text-grijs hover:opacity-[.8] duration-300">Oogverzorging</a>
                <a href="/producten" class="col-span-1 flex items-center justify-center py-1 text-15 bg-white text-grijs hover:opacity-[.8] duration-300">Vachtverzorging</a>
                <a href="/producten" class="col-span-2 md:col-span-1 flex items-center justify-center py-1 text-15 bg-white text-grijs hover:opacity-[.8] duration-300">Voeding & supplementen</a>
            </div>
        </div>
    </div>
    <div class="bg-one absolute bottom-2 left-2 right-2 h-8 w-[calc(100vw-40px)]">
        <div class="grid grid-cols-3 md:grid-cols-6 gap-2 h-8">
            <div class="col-span-1 flex items-center justify-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 duration-300"><img class="h-6" src="/wp-content/themes/nutridog/img/local/hery.png" alt=""></div>
            <div class="col-span-1 flex items-center justify-center grayscale opacity-40 hover:grayscale-0 hover:opacity-100 duration-300"><img class="h-6" src="/wp-content/themes/nutridog/img/local/renske.png" alt=""></div>
            <div class="col-span-1 flex items-center justify-center grayscale opacity-100 hover:grayscale-0 hover:opacity-100 duration-300"><img class="h-6" src="/wp-content/themes/nutridog/img/local/edgard.png" alt=""></div>
            <div class="col-span-1 hidden md:flex items-center justify-center grayscale opacity-40 hover:grayscale-0 hover:opacity-100 duration-300"><img class="h-6" src="/wp-content/themes/nutridog/img/local/pawr.png" alt=""></div>
            <div class="col-span-1 hidden md:flex items-center justify-center grayscale opacity-40 hover:grayscale-0 hover:opacity-100 duration-300"><img class="h-6" src="/wp-content/themes/nutridog/img/local/trixie.png" alt=""></div>
            <div class="col-span-1 hidden md:flex items-center justify-center grayscale opacity-40 hover:grayscale-0 hover:opacity-100 duration-300"><img class="h-6" src="/wp-content/themes/nutridog/img/local/lilys.png" alt=""></div>
        </div>
    </div>

</div>

<div class="h-screen">
   <div class="container pt-6">
    <div class="grid grid-cols-3">
        <div class="col-span-1">
            <img src="/wp-content/themes/nutridog/img/local/test.png" alt="" class="w-full">
        </div>
    </div>
    
   </div>
</div>



<?php get_footer(); ?>