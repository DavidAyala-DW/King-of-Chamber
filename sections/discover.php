<?php
function discover($handle,$id){

  ob_start();
  $discover = get_field($handle,$id);
  // debug($discover);
  ?>

    <section
      class="flex flex-col relative pt-[100px] pb-[126px] w-full px-5 md:pl-5 md:pr-0 max-w-[2500px] mx-auto xl:pl-[100px] lg:pr-0 bg-[#D7F8E4]"
    >
      <div class="w-full flex flex-col space-y-10 md:space-y-0  md:flex-row md:items-start md:justify-between md:space-x-[70px] max-w-[1440px] mx-auto">

        <div class="flex flex-col md:mt-5 w-full">

          <h2 class="text-black font-semibold leading-10 capitalize text-[35px] mb-5">
            <?php echo $discover["heading_color_1"]?>
            <span class="text-green">
              <?php echo $discover["heading_color_2"]?>
            </span>
          </h2>

          <div class="flex flex-col space-y-7">

            <?php foreach ($discover["bullet_list"] as $text) :?>

              <div class="flex flex-col space-y-5 md:space-y-0">

                <div class="flex items-start space-x-2.5">

                  <svg class="mt-1.5 min-w-[18px]" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                    <g clip-path="url(#clip0_19_87)">
                    <path d="M14.5199 12.6368C16.2481 10.1386 16.0004 6.68989 13.7723 4.46682C11.5448 2.24402 8.08881 1.99647 5.58535 3.72109L3.72884 1.86873C7.26629 -0.855342 12.3645 -0.601612 15.6079 2.63499C18.8516 5.87189 19.1059 10.9594 16.3763 14.4894L14.5199 12.6368Z" fill="#259452"/>
                    <path d="M2.08319 3.51074L3.93917 5.3631C2.21117 7.8613 2.45896 11.31 4.68647 13.5328C6.91423 15.7559 10.3705 16.0034 12.8737 14.2788L14.7302 16.1314C11.1927 18.8555 6.09446 18.6015 2.85107 15.3646C-0.392354 12.1283 -0.646905 7.04075 2.08319 3.51074Z" fill="#259452"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_19_87">
                    <rect width="18.0379" height="18" fill="white" transform="matrix(-1 0 0 1 18.2486 0)"/>
                    </clipPath>
                    </defs>
                  </svg>

                  <h3 class="leading-[30px] text-[15px] font-normal max-w-[574px] text-black"/>
                    <?php echo $text["text"] ?>
                  </h3>

                </div>

              </div>

            <?php endforeach ?>

          </div>

          <?php echo Button([
            "text" => $discover["cta_text"],
            "link" => $discover["cta_link"],
            "className" => "border border-white max-w-max block mt-5"
          ]) ?>

        </div>

        <?php echo imageComponent($discover["image"],"Large","block img-responsive max-w-full md:max-w-[420px] md2:max-w-[500px] xl:max-w-[100%] object-center object-cover w-full");?>

      </div>

    </section>

  <?php return ob_get_clean();

}