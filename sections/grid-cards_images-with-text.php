<?php

function grid_cards_images($handle,$id){
  
  ob_start();

  $card_wrapper = get_field($handle,$id);

  ?>

  <section
    class="flex flex-col relative pt-[70px] pb-[90px] w-full px-5 max-w-[1440px] mx-auto lg:pl-[130px] lg:pr-[97px]"
  >

    <h2 class="text-black text-[35px] leading-[60px] font-semibold uppercase text-center mb-[70px]">
      <?php echo $card_wrapper["heading"] ?>
    </h2>

    <div class="flex flex-col space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-5 sm:gap-y-10 md:gap-y-0 md:grid-cols-3 md:gap-x-[57px] w-full">

      <?php foreach($card_wrapper["card"] as $card) : ?>

          <div class="flex flex-col justify-between h-full space-y-[22px] shadow-[0px_4px_50px_rgba(0,_0,_0,_0.13)]">

            <?php echo imageComponent($card["image"],"Large","block img-responsive object-center object-cover w-full h-full");?>

            <div class="flex flex-col pl-[27px] pr-[14px] bg-white pb-7">

              <div class="flex items-center justify-between mb-5">

                <h3 class="text-[#0C0C0C] font-semibold text-[24px] leading-[30px]">
                  <?php echo $card["heading"]?>                
                </h3>

                <?php if(!empty($card["date"])) : ?>

                  <p class="leading-[30px] text-[10px] font-normal text-[#0C0C0C]">
                    <?php echo $card["date"] ?>
                  </p>

                <?php endif?>

              </div>

              <div class="text-[15px] leading-[30px] text-[#0C0C0C] font-normal mb-[15px]">
                <?php echo $card["paragraph"] ?>
              </div>

              <a class="max-w-max mx-auto uppercase block text-[#0C0C0C] tracking-[.2em] text-[13px] leading-[30px] font-semibold text-center" href="<?php echo $card["cta_link"] ?>">
                <?php echo $card["cta_text"] ?>
              </a>

            </div>


          </div>


      <?php endforeach; ?>

    </div>
    
  </section>

  <?php return ob_get_clean();
}
