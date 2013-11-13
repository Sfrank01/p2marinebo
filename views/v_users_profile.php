<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>  users profile  </title>

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

<?php>
	<h2>Login</h2>
		




<h1> This is the profile of <?=$user->first_name?></h1>
<?php
	public function profile($user_name= NULL){
	
	#if you look at _v_template youll see it prints a $content variable in the <body>
	# knowing that lets pass our v_users_profile.php  view fragment to $content so its printed in the <body>
	
	$this->template->content = View::instance('v_users_profile');
	
	#  $title is another variable used in _v_template to set the <title> of the page
	
	$this->template->title = "Profile";
	
	# Pass information to the view fragment
	
	$this->template->content->user_name = $user_name;
	
	# render view

	echo $this-template;
}

		
</body>
</html>
	