<?php 
function newsletter($handle,$id){


  $newsletter = get_field($handle,$id);
  // debug($newsletter);
  ob_start();

  ?>

    <section
      class="flex flex-col relative py-20 md:pt-[116px] md:pb-[190px] px-5 md:px-0 w-full max-w-[2500px] mx-auto"
    >

      <?php echo imageComponent($newsletter["background_image"],"Large","block absolute inset-0 z-[-2] img-responsive object-center object-cover w-full h-full");?>
      <div class="absolute inset-0 w-full h-full bg-black bg-opacity-[.65] z-[-1]"></div>
    
      <div class="flex flex-col">

        <h2 class="font-bold text-[28px] md:text-[35px] text-center leading-5 md:leading-[30px] text-white mb-[21px]">
          <?php echo $newsletter["heading"] ?>
        </h2>

        <p class="text-center leading-[30px] text-white font-normal text-[15px] mb-8">
          <?php echo $newsletter["subheading"] ?>
        </p>

        <form action="" class="flex flex-col space-y-5 md:space-y-0 md:flex-row items-center md:space-x-[19px] max-w-max mx-auto">

          <input
            type="email"
            name="email"
            placeholder="Enter your email"
            class="text-white !h-auto bg-transparent min-w-[320px] md:min-w-[342px] py-[5px] pl-[22px] text-[10px] leading-[30px] font-normal outline-none border border-white rounded-[50px] placeholder:text-[#635F5F]"
          >

          <?php echo Button([
            "type" => "submit",
            "text" => "SUBMIT",
            "className" => "max-w-max mx-auto"
          ]) ?>

        </form>

      </div>

    </section>

  <?php return ob_get_clean();

}