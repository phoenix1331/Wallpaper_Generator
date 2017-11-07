<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><!-- master 1 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Custom Wallpaper Generator</title>

<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrap">
<?php

if(!empty($message)){
	echo $message;
}

?>
<!-- test one test two-->
<form action="index.php" method="post">

    <input type="radio" name="selection" value="1024x768" checked/> <label>1024 x 768</label>
    <input type="radio" name="selection" value="1280x800" /> <label>1280 x 800</label>
    <input type="radio" name="selection" value="1366x768" /> <label>1366 x 768</label>

    <p>Name: <input type="text" name="text" value="Your Name Here" />
    <input type="hidden" name="submit" value="preview">
    <input type="submit" class="submit" value="Generate"/>
    </p>

</form>
<p>Type your name in the box above and press generate wallpaper.</p>


<?php 
	$select = $_REQUEST["selection"];
	$text = $_REQUEST["text"];
	$return_url = 'return.php?selection=' . "" . $select . "" . '&text=' . "" .  $text;
?>
<?php 
	$direct_text = 'The current selection is: <br />';
	echo $direct_text.'Wallpaper Size = '.$select.'<br />Your Name = '.$text; 
?>
       
<p>Your wallpaper will look similar to the one below</p>

<?php 
	//Change to switch
	if ($select == '1280x800')
	{ $frame = 'Wembley1280x800.png';
	$size = 'width="600" height="380"';
	}
	else if ($select == '1366x768')
	{ $frame = 'Wembley1366.png';
	$size = 'width="600" height="340"';
	}
	else
	{
	$frame = 'Wembley1024.png';
	$size = 'width="500" height="380"';
	}
?>
<img src="<?php echo $return_url; ?>" <?php echo $size; ?> border="1" />

<br />
<br />

<form method="post" action="<?php echo $return_url; ?>" target="_blank">
<input type="hidden" name="submit" value="save">
<input type="submit" value="Save this image">
</form> 

</div><!--END WRAP-->

</body>
</html>
