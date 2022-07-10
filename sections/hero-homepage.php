<?php 


function heroHomepage($id){

  ob_start();
  $heros = get_field("heros",$id);
  $heros = get_field("heros",$id)["hero"];  
    
  ?>

    <section
      class="relative w-full max-w-[2500px] mx-auto"
      x-data="hero_homepage"
    >

      <div class="hero-slider max-w-[100%] overflow-x-hidden w-full">

        <div class="swiper-wrapper !grid grid-flow-col h-full w-full">

        <?php foreach($heros as $hero) : ?>

          <div class="swiper-slide w-full h-full">

            <div class=" <?php echo $hero["heading_size"] == "medium" ? 'max-w-[620px]' :'max-w-[720px] ' ?> z-[2] 2xl:max-w-[704px] flex flex-col px-5 md:pl-[7.4%] py-14 md:pt-[100px] md:pb-[186px]">

                <h1 class="leading-5 lg:leading-[55px] z-[2] font-bold text-[24px] md:text-[36px] lg:text-[50px] <?php echo $hero["color_order"] == "option1" ? 'text-primary' :'text-secondary' ?>  mb-4">

                  <?php echo $hero["heading_blue"] ?> 

                  <span class="<?php echo $hero["color_order"] == "option1" ? 'text-secondary' :'text-primary' ?>">
                    <?php echo $hero["heading_black"] ?> 
                  </span>

                </h1>

                <?php if(!empty($hero["paragraph"])) : ?>
                  <p class="leading-5 lg:leading-[60px] z-[2] text-sm md:text-lg font-normal text-secondary capitalize">
                    <?php echo $hero["paragraph"] ?>
                  </p>
                <?php endif ?>

                <?php echo Button([
                  "text" => $hero["cta_text"],
                  "link" => $hero["cta_link"],
                  "className" => "max-w-max block z-[2] mt-1.5".(!empty($hero["paragraph"]) ? " !mt-[22.5px]" : "")
                ]) ?> 

              </div>

              <div class="absolute w-full h-full inset-0">
                <?php echo imageComponent($hero["background_image"],"Large","img-responsive h-full object-center object-cover w-full");?>
              </div>

          </div>
                  
          <?php endforeach ?>

        </div>
      </div>

    </section>

  <?php return ob_get_clean();

}