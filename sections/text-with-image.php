<?php
function text_with_image($handle,$id){

  ob_start();
  $TWI = get_field($handle,$id);
  // debug($TWI);

  ?>

  <section
    class="flex flex-col relative w-full max-w-[2500px] mx-auto px-5 md:pr-5 xl:pr-[5%]"
  >

  <div class="flex flex-col space-y-reverse space-y-10 md:space-y-0 md:flex-row items-center w-full md:space-x-8">

    <?php echo imageComponent($TWI["main_image"],"Large","md:max-w-[480px] xl:max-w-full block order-2 md:order-1 img-responsive object-center object-cover w-full");?>  

    <div class="flex flex-col justify-between order-1 md:order-2">

      <h2 class="text-black font-semibold text-[35px] leading-10 capitalize mb-3">

        <?php echo $TWI["heading_color_1"]?>
        <span class="text-green">
          <?php echo $TWI["heading_color_2"]?>
        </span>
        
      </h2>

      <div class="text-[15px] leading-[30px] font-normal mb-3">
        <?php echo $TWI["paragraph"]?>
      </div>

      <?php echo Button([
        "text" => $TWI["cta_text"],
        "link" => $TWI["cta_link"],
        "text_color" => "text-[#0C0C0C]",
        "bg_color" => "bg-transparent",
        "className" => "border border-[#0C0C0C] max-w-max block"
      ]) ?>

    </div>

  </div>
  
  </section>

  <?php return ob_get_clean();
  
}