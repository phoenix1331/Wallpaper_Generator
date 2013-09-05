<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<div id="content-custom">

<form action="custom.php" method="post">
 <style type="text/css">
    label
    {
        font-size:20px; 
        line-height:12px;
        display:inline;
		margin-right:20px;
    } 
</style>
 <div style="width:480px; margin:10px auto 10px auto; padding:30px;color:#555;">
     
      <input type="radio" style="width:20px; height:20px;" name="selection" value="1024x768" checked/> <label>1024 x 768</label>
      <input type="radio" style="width:20px; height:20px;" name="selection" value="1280x800" /> <label>1280 x 800</label>
      <input type="radio" style="width:20px; height:20px;" name="selection" value="1366x768" /> <label>1366 x 768</label>
      </div>
      <div align="center">
    <p>Name: <input type="text" name="text" value="Your Name Here" />
    <input type="hidden" name="submit" value="preview">
      <input type="submit" class="submit" value="Generate"/>
    </p>
  </div>
</form>
<p align="center">Type your name in the box above and press generate wallpaper.</p>


  <div align="center">
    <p>
      <?php 

$select = $_REQUEST["selection"];
$text = $_REQUEST["text"];
$return_url = 'return.php?selection=' . "" . $select . "" . '&text=' . "" .  $text;?>
<?php 
	$direct_text = 'The current selection is: <br />';
	echo $direct_text.'Wallpaper Size = '.$select.'<br />Your Name = '.$text; 
?>
     
      
<p align="center">Your wallpaper will look similar to the one below</p>
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

<br /><br />
<br />
<br />


<form method="post" action="<?php echo $return_url; ?>" target="_blank">
<input type="hidden" name="submit" value="save">
<input type="submit" value="Save this image">
</form> 
</div>
</div><!--END CONTENT-->
</div><!--END WRAP-->

</body>
</html>
