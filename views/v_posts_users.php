<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title> posts users</title>

<style type="text/css">

		body{	
			background-color: #a7cece;
		
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
			}
			
		h2	{font-family: Verdana;
			font-size: 35px;
			color:greenyellow;
			margin-left: 100px;
			
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


<?php foreach( $users as $user): ?>

        <?=$user['first_name']?> <?=$user['last_name']?><br>
        
        <?php if(isset($connections[$user['user_id']])): ?>
                <a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
        <?php else: ?>
                <a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
        <?php endif; ?>        
        
        <br><br>

<?php endforeach ?>
</body>
</html>