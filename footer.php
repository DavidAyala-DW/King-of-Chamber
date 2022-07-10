
</main>

<?php
$array_menu_footer = getArrayMenu();
?>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<?php
	$footer = get_field("footer","options");
?>

<footer id="colophon" class="w-full relative flex flex-col">

		<div class="flex flex-col px-5 lg:px-[110px] pt-[70px] pb-[30px]">

		<div class="absolute inset-0 w-full h-full z-[-1]">
        <?php echo imageComponent($footer["background_image"],"Large","block img-responsive object-center object-cover w-full h-full");?>
      </div>

			<div class="flex flex-col space-y-5 footer:space-y-0 footer:flex-row w-full mb-[55px]">
				
					<div class="logo flex footer:mr-[124px]">
							<div class="min-w-[245px] max-w-max w-full logo">
								<?php echo imageComponent($footer["main_image"],"Large","block img-responsive object-center object-cover w-full");?>
							</div>
					</div>

					<div class="flex flex-col md:flex-row w-full">

						<div class="flex flex-col w-full max-w-full md2:max-w-max md:pr-[110px] md:pb-[50px] footer:pb-[121px] md:mr-[117px] md:border-r border-[#D2D2D2]">

							<h3 class="leading-[60px] text-[15px] font-bold uppercase text-white">
								Navigation Links
							</h3>

							<div class="flex flex-col space-y-2 md:space-y-0 md:flex-row md:items-center justify-between md2:justify-start md2:space-x-[166px] w-full">

						
								<div class="flex flex-col max-w-max space-y-2 w-full">

									<?php $count = 0 ?>

									<?php foreach ($array_menu_footer as $k => $m) : ?>

										<?php if($count < 3) : ?>
											<a class="block max-w-max text-[15px] leading-[26px] capitalize font-normal text-white" href="<?php echo $m['url']; ?>">
												<?php echo $m['title']; ?>
											</a>
										<?php endif ?>

										<?php $count++; ?>

									<?php endforeach ?>

								</div>

								<div class="flex flex-col max-w-max space-y-2 w-full">

									<?php $count = 0 ?>

									<?php foreach ($array_menu_footer as $k => $m) : ?>

										<?php if($count >= 3) : ?>
											<a class="block max-w-max text-[15px] leading-[26px] capitalize font-normal text-white" href="<?php echo $m['url']; ?>">
												<?php echo $m['title']; ?>
											</a>
										<?php endif ?>

										<?php $count++; ?>

									<?php endforeach ?>

								</div>

							</div>

						</div>

						<div class="flex flex-col space-y-3">

								<h3 class="leading-[60px] text-[15px] font-bold uppercase text-white">
									contact
								</h3>
								
								<div class="flex  space-x-3">

									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21" fill="none">
										<path d="M13.1952 2.94405C11.8886 1.63782 10.1445 0.861862 8.29945 0.765945C6.45442 0.670027 4.63925 1.26095 3.20428 2.42465C1.76932 3.58836 0.816272 5.24236 0.52909 7.06743C0.241908 8.8925 0.640946 10.7593 1.64919 12.3074L6.84441 20.283C6.96003 20.4604 7.1181 20.6062 7.30431 20.7072C7.49053 20.8081 7.69898 20.861 7.91079 20.861C8.1226 20.861 8.33105 20.8081 8.51727 20.7072C8.70348 20.6062 8.86156 20.4604 8.97717 20.283L14.1726 12.3074C15.1081 10.8713 15.5215 9.15719 15.3436 7.45248C15.1656 5.74776 14.4071 4.15602 13.1952 2.94405ZM13.0205 11.5569L7.91081 19.4008L2.8011 11.5569C1.23703 9.15582 1.57249 5.94262 3.59873 3.9163C4.16499 3.35002 4.83725 2.90082 5.57712 2.59435C6.31699 2.28788 7.10998 2.13014 7.91081 2.13014C8.71164 2.13014 9.50463 2.28788 10.2445 2.59435C10.9844 2.90082 11.6566 3.35002 12.2229 3.9163C14.2491 5.94262 14.5845 9.15582 13.0205 11.5569Z" fill="white"/>
									</svg>

									<h4 class="max-w-[213px] text-white text-[15px] leading-5 font-normal">
											<?php echo $footer["contact"]["address"]?>
									</h4>

								</div>

								<div class="flex  space-x-3">

									<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
										<path d="M14.6667 0.916504H7.33337C5.81171 0.916504 4.58337 2.14484 4.58337 3.6665V18.3332C4.58337 19.8548 5.81171 21.0832 7.33337 21.0832H14.6667C16.1884 21.0832 17.4167 19.8548 17.4167 18.3332V3.6665C17.4167 2.14484 16.1884 0.916504 14.6667 0.916504ZM12.8334 19.2498H9.16671V18.3332H12.8334V19.2498ZM15.8125 16.4998H6.18754V3.6665H15.8125V16.4998Z" fill="white"/>
									</svg>

									<h4 class="max-w-[213px] text-white text-[15px] leading-5 font-normal">
											<?php echo $footer["contact"]["phone"]?>
									</h4>

								</div>

								<div class="flex  space-x-3">

									<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
										<path d="M13.0625 16.5H2.75L2.74794 6.12288L10.6088 11.5651C10.7238 11.6447 10.8602 11.6873 11 11.6873C11.1398 11.6873 11.2762 11.6447 11.3912 11.5651L19.25 6.12562V12.375H20.625V5.5C20.6245 5.13549 20.4794 4.78607 20.2217 4.52833C19.9639 4.27059 19.6145 4.12555 19.25 4.125H2.75C2.38544 4.12536 2.03591 4.27035 1.77813 4.52813C1.52035 4.78591 1.37536 5.13544 1.375 5.5V16.5C1.37555 16.8645 1.52059 17.2139 1.77833 17.4717C2.03607 17.7294 2.38549 17.8745 2.75 17.875H13.0625V16.5ZM17.7368 5.5L11 10.164L4.26319 5.5H17.7368Z" fill="white"/>
										<path d="M17.875 19.25C19.3938 19.25 20.625 18.0188 20.625 16.5C20.625 14.9812 19.3938 13.75 17.875 13.75C16.3562 13.75 15.125 14.9812 15.125 16.5C15.125 18.0188 16.3562 19.25 17.875 19.25Z" fill="white"/>
									</svg>

									<h4 class="max-w-[213px] text-white text-[15px] leading-5 font-normal">
											<?php echo $footer["contact"]["email"]?>
									</h4>

								</div>

						</div>
					</div>

			</div>

			<div class="flex flex-col space-y-5 md2:space-y-0 md2:flex-row md2:items-center justify-between">

				<p class="text-white capitalize text-[15px] leading-[26px] font-medium">
					<?php echo $footer["contact"]["copyright_text"]?>
				</p>

				<div class="flex items-center space-x-10">

					<a class="text-[15px] text-white capitalize leading-[26px] font-normal" href="<?php echo $footer["privacy_link"];?>">
						Privacy Policy
					</a>

					<a class="text-[15px] text-white capitalize leading-[26px] font-normal" href="<?php echo $footer["term_of_service_link"];?>">
						Terms of Service
					</a>

				</div>

			</div>

		</div>


</footer>

	<?php do_action( 'tailpress_footer' ); ?>

	<?php wp_footer(); ?>

</body>
</html>