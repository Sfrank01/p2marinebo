<!DOCTYPE html>
<html>

<html>
<head>
	<meta charset = "utf-8">
	<title>  Login  </title>

	<style type="text/css">
	
body	{	background-image: url(../images/lv.jpg);
			background-position:  center bottom;
			background-repeat:repeat-x;
		
		 }
		 
		table{
			background-color: #a7cece;
			border-color:  grey;
			border-style:double;
			border-width:10px;
			padding: 100px;
			margin-left: 100px;	
			}
			
		h1 {font-family: Verdana;
			margin-left:100px;
			color:greenyellow;
			font-size: 35px;
			}
			
		h2	{font-family: Verdana;
			font-size: 35px;
			color:greenyellow;
			margin-left: 100px;
			
		}
		td	{
			vertical-align: top;
			padding-bottom: 15px;
			padding-right: 20px;
		}
		
		ul   {
			font-family: Verdana;
			margin-left: 100px;
			color: grey;
			font-weight: bold;
			font-size: 24px;
			
		}
	
				 
	</style>

			

</style>
</head>
<body>



<h1> Welcome to <?=APP_NAME?><?php if ($user) echo ',  '.$user->first_name;?></h1>
</html>