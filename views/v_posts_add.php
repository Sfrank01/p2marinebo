<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>  post add  </title>

	<style type="text/css">
	
body	{	background-color: #a7cece;
		
		 }
		 
		form{
			background-color: powderblue;
			border-color:  grey;
			border-style:double;
			border-width:10px;
			padding: 40px;
			margin-left: 100px;	
			margin-right:800px;
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
			color: lightsteelblue;
			font-weight: bold;
			font-size: 24px;
			
		}
	
				 
	</style>

</head>
<body>
<h2> POST</h2>
<form method='POST' action='/controllers/c_post.php'>
	<table>
	<label for='content'> NEW POST:</label><br>
		<textarea name= 'content' id='content'></textarea>
		<br><br>
		<input type ='Submit' value= 'New post'>
	</table>	
</form>
		
		
</body>
</html>				
				
				
		
		