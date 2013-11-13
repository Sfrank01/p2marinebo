<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title> signup</title>

<style type="text/css">
	
	
	
   body	{	background-image: url(../images/lv.jpg);
			background-position:  center bottom;
			background-repeat:repeat-x;
		
		 }
		 
		table{
			background-color: lightblue;
			border-color:  grey;
			border-style:double;
			border-width:10px;
			padding: 100px;
			margin-left: 100px;
			font-size:18px;	
			font-color:slategrey;	
			}
			
		h1 {font-family: Verdana;
			margin-left:105px;
			font-size: 35px;
			color:greenyellow;
			}
		
		ul   {
			font-family: Verdana;
			margin-left: 100px;
			color: grey;
			font-weight: bold;
			font-size: 24px;
			
		}
		
</style>
</head>
<body>








<?php foreach ($posts as $post):?>

<article>

	 <h1><?=$post['first_name']?> <?=$post['last_name']?> posted:</h1>
	 <p><?=$post['content']?></p>
	 
	 <time datetime="<?=Time::display($post['created'])?>"> <br>
		<?=Time::display($post['created'])?>
	</time>
</article>	
	
	
 <?php endforeach ?>
 
</body>
 
 </html>
	