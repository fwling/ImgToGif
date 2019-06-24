<?php
	$argv = array_values($argv);
	$file = ltrim($argv[1], '.\\');
	$img_info = getimagesize($file);
	$img_type = $img_info['mime'];
	$file_arr = explode('.', $file);
	$file_name = $file_arr[0];
	switch($img_type){
		case 'image/jpeg':
			$image = imagecreatefromjpeg($file);
			break;
		case 'image/png':
			$image = imagecreatefrompng($file);
			break;
		default:
			exit('不支持的图片格式');
	}
	$color = imagecolorallocate($image, 255, 255, 255);
	imagecolortransparent($image, $color);
	imagefill($image, 0, 0, $color);
	imagegif($image, $file_name . '.gif');
	imagedestroy($image);
	echo $file_name . '.gif 处理完成';