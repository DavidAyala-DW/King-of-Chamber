<?php

function king_chamber_membership($handle,$id){

  ob_start();
  $KCM = get_field($handle,$id);

  ?>
    <section
      class="flex flex-col relative pt-[73px] pb-[94px] w-full px-5 md:pl-5 md:pr-0 max-w-[2500px] mx-auto xl:pl-[130px] lg:pr-0"
    >
      <div class="absolute inset-0 w-full h-full z-[-1]">
        <?php echo imageComponent($KCM["background_image"],"Large","block img-responsive object-center object-cover w-full h-full");?>
      </div>
      
      <h2 class="text-white text-[28px] lg2:text-[35px] leading-5 lg2:leading-[60px] uppercase font-semibold mb-6 lg2:mb-[14px] text-center">
        <?php echo $KCM["heading"] ?>
      </h2>

      <h3 class="text-center text-[15px] px-5 max-w-[1123px] mx-auto leading-4 lg2:leading-[30px] font-normal text-white mb-20">
        <?php echo $KCM["subheading"] ?>
      </h3>

      <div class="w-full flex flex-col space-y-10 md:space-y-0  md:flex-row md:items-start md:justify-between md:space-x-[70px] max-w-[1440px] mx-auto">

        <div class="flex flex-col space-y-6 md:mt-5 w-full">

          <div class="flex flex-col space-y-7">

            <?php foreach ($KCM["benefits"] as $benefit) :?>

              <div class="flex flex-col space-y-5 md:space-y-0">

                <div class="flex items-center space-x-2.5">

                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M14.2791 12.6368C16.0037 10.1386 15.7565 6.68989 13.5331 4.46682C11.3103 2.24402 7.86158 1.99647 5.36338 3.72109L3.51077 1.86873C7.04078 -0.855342 12.1283 -0.601612 15.3649 2.63499C18.6018 5.87189 18.8555 10.9594 16.1317 14.4894L14.2791 12.6368Z" fill="white"/>
                    <path d="M1.86863 3.51086L3.7207 5.36322C1.99634 7.86142 2.2436 11.3101 4.46643 13.5329C6.68951 15.756 10.1385 16.0035 12.6364 14.2789L14.489 16.1315C10.959 18.8556 5.87147 18.6016 2.6349 15.3647C-0.601711 12.1284 -0.855727 7.04088 1.86863 3.51086Z" fill="white"/>
                  </svg>

                  <h4 class="leading-6 lg2:leading-[60px] text-[20px] lg2:text-[24px] font-semibold uppercase text-white"/>
                    <?php echo $benefit["heading"] ?>
                  </h4>

                </div>

                <div class="text-sm lg2:text-[15px] text-white leading-4 lg2:leading-[30px] font-normal">
                  <?php echo $benefit["description"]?>
                </div>

              </div>

            <?php endforeach ?>

          </div>

          <?php echo Button([
            "text_color" => "text-white",
            "bg_color" => "bg-transparent",
            "text" => $KCM["cta_text"],
            "link" => $KCM["cta_link"],
            "className" => "border border-white max-w-max block"
          ]) ?>

        </div>

        <?php echo imageComponent($KCM["main_image"],"Large","block img-responsive max-w-full md:max-w-[420px] md2:max-w-[500px] xl:max-w-[100%] object-center object-cover w-full");?>

      </div>


    </section>

  <?php return ob_get_clean();
}