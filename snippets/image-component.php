<?php

	function imageComponent($id,$size, $CSS, $brightness = 99, $opacity = 99, $post = false){

		ob_start();

		$idImage = $id;

		if($post){
			$post = get_post($id);
			$idImage = get_post_thumbnail_id($post->ID);
		}

		$thumbnail = wp_get_attachment_image_src($idImage, $size)[0];
		$thumbnailSizes = [
			"width" => wp_get_attachment_image_src($idImage, $size)[1],
			"height" => wp_get_attachment_image_src($idImage, $size)[2]
		];
		$thumbnail_alt = get_post_meta($idImage, '_wp_attachment_image_alt', TRUE);

		?>

		<img 
			width="<?php echo $thumbnailSizes["width"]; ?>"
			height="<?php echo $thumbnailSizes["height"]; ?>"
			src="<?php echo $thumbnail; ?>"
			alt="<?php echo $thumbnail_alt ?>;"
			class="<?php echo $CSS ?>"
			style = "filter: brightness(0.<?php echo $brightness ?>) opacity(0.<?php echo $opacity ?>)"
		>

		<?php return ob_get_clean();

	}