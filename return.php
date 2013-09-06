<?php	
	//Get String
	$text = $_REQUEST["text"];

	// customizable variables
	$font_file = 'arial.ttf';
	$font_size = 48;
	$r = 0;
	$g = 0;
	$b = 0;
	
	//Check wallpaper size // Change to switch
	$select = $_REQUEST['selection'];
		if($select == '1280x800'){
		$image_file 	= 'Wembley1280x800.png';
		$x_finalpos 	= 712;
		$y_finalpos 	= 680;
	}
	else if($select == '1366x768'){
		$image_file 	= 'Wembley1366.png';
		$x_finalpos 	= 712;
		$y_finalpos 	= 650;
	}
	else{
		$image_file 	= 'Wembley1024.png';
		$x_finalpos 	= 712;
		$y_finalpos 	= 650;
	}		

	//Can we create the image ?
	if (!function_exists('gd_info')) {
			error('Error: Server does not support PHP image generation') ;
	}	
	
	//Can we read the font ?
	if(!is_readable($font_file)) {
		error('Error: The server is missing the specified font.') ;
	}

	// create and measure the text
	$box = @ImageTTFBBox($font_size,0,$font_file,$text) ;

	$text_width = abs($box[2]-$box[0]);
	$text_height = abs($box[5]-$box[3]);

	$image =  imagecreatefrompng($image_file);

	if(!$image || !$box)
	{
		error('Error: The server could not create this image.') ;
	}

	// allocate colors and measure final text position
	$font_color = ImageColorAllocate($image,$r,$g,$b);
	$image_width = imagesx($image);
	$put_text_x = ($image_width - $text_width) / 2;
	$put_text_y = $y_finalpos;



	// Write the text
	imagettftext($image, $font_size, 0, $put_text_x,  $put_text_y, $font_color, $font_file, $text);
	header('Content-type: image/png');
	ImagePNG($image);
	ImageDestroy($image);
	exit ;


	function error($message)
	{
		header("HTTP/1.0 500 Internal Server Error") ;
		return $message;
		exit ;
	}

	

?>