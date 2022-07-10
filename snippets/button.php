<?php

function Button($array){

	$type = isset($array["is_submit"]) && $array["is_submit"]  ? "submit" : "link";
	$name = isset($array["name"]) ? $array["name"] : "";
	$text_color = isset($array["text_color"]) ? $array["text_color"] : "text-white";
	$bg_color = isset($array["bg_color"]) ? $array["bg_color"] : "bg-[#259452]";
	$padding_x = isset($array["padding_x"]) ? $array["padding_x"] : "px-10";
	$padding_y = isset($array["padding_y"]) ? $array["padding_y"] : "py-[5px]";
	$min_width = isset($array["min_width"]) ? $array["min_width"] : "";
	$rounded = isset($array["rounded"]) ? $array["rounded"] : "rounded-[50px]";
	$font_size = isset($array["font_size"]) ? $array["font_size"] : "text-[13px]";
	$font_weight = isset($array["font_weight"]) ? $array["font_weight"] : "font-semibold";
	$line_height = isset($array["line_height"]) ? $array["line_height"] : "leading-[30px]";
	$text_transform = isset($array["text_transform"]) ? $array["text_transform"] : "uppercase";
	$text_align = isset($array["text_align"]) ? $array["text_align"] : "center";
	$className = isset($array["className"]) ? $array["className"] : "";
	$id = isset($array["id"]) ? $array["id"] : "";
	$link = isset($array["link"]) ? $array["link"] : "";
	$text = isset($array["text"]) ? $array["text"] : "";
	$border = isset($array["border"]) ? $array["border"] : "";
	
	ob_start();

	?>
		<?php if($type == "link") : ?> 
			<a
				href="<?php echo $link;?>"
				class="
					<?php echo $text_color; ?>
					<?php echo $bg_color; ?>
					<?php echo $padding_x; ?>
					<?php echo $padding_y; ?>
					<?php echo $min_width; ?>
					<?php echo $rounded; ?>
					<?php echo $font_size; ?>
					<?php echo $font_weight; ?>
					<?php echo $line_height; ?>
					<?php echo $text_transform; ?>
					<?php echo $text_align; ?>
					<?php echo $className; ?>
					<?php echo $border; ?>
				"
				id="<?php echo $id ?>"
			>
				<?php echo $text ?>
			</a>

		<?php endif ?>

		<?php if($type == "submit") : ?>

			<button
				name="<?php  echo $name ?>"
				type="submit"
				id="<?php echo $id ?>"
				class="
					<?php echo $text_color; ?>
					<?php echo $bg_color; ?>
					<?php echo $padding_x; ?>
					<?php echo $padding_y; ?>
					<?php echo $min_width; ?>
					<?php echo $rounded; ?>
					<?php echo $font_size; ?>
					<?php echo $font_weight; ?>
					<?php echo $line_height; ?>
					<?php echo $text_transform; ?>
					<?php echo $text_align; ?>
					<?php echo $className; ?>
					<?php echo $border; ?>
				"
			>
				<?php echo $text ?>
			</button>

		<?php endif ?>

	<?php return ob_get_clean();
}
