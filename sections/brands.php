<?php

function brands($id){

  ob_start();

  $brand_rows = get_field("brands",$id)["brand_rows"];  
  $background_color_active = get_field("brands",$id)["background_color"];
  ?>

  <section
    class="flex space-y-[42px] flex-col relative pt-[34px] pb-[65px] w-full px-5 lg:px-[75px] max-w-[2500px] mx-auto <?php echo $background_color_active? 'bg-[#D7F8E4]': '' ?>"
  >

    <?php foreach($brand_rows as $row) :?>

      <div class="flex flex-col w-full max-w-[1440px] m-auto">

        <h2 class="text-green text-[24px] leading-5 sm:leading-[60px] font-semibold uppercase text-center mb-8 sm:mb-10">
          <?php echo $row["heading"]?>
        </h2>

        <div class="flex flex-col space-y-10 sm:space-y-0 sm:flex-row flex-wrap justify-center lg:justify-between ">

          <?php foreach($row["images"] as $image ) : ?>
            <div class="sm:pr-10 sm:pb-2 lg:pb-5 flex flex-col items-center justify-center">
              <?php echo imageComponent($image["image"],"Large","block img-responsive object-center max-w-max mx-auto object-cover w-full");?>
            </div>
          <?php endforeach ?>

        </div>

      </div>

    <?php endforeach ?>

  </section>

  <?php return ob_get_clean();
}