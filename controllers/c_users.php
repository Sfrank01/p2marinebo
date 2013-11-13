<?php
 class users_controller extends base_controller{
	
	
	public function __construct(){
		#makes sure the base controller construct gets called
	parent::__construct();
	}
	
	
		#Display a form so users can sign up
	public function signup($error =NULL){
		# Set up the view
		$this->template-> content = View::instance('v_users_signup');
		$this->template->title ="Sign Up";
		
		#pass data to the view
		$this->template->content->error = $error;
		
		# Render the view
		echo $this ->template;
	}
	
		#Process the sign up form
	public function p_signup(){
	
		//Check input for blank fields
        foreach($_POST as $field => $value){
            if(empty($value)) {
                //If any fields are blank, send error message
                 Router::redirect('/users/signup/error');  
            }
        }       

        //Check to see if the input email already exists in the database 
        $exists = DB::instance(DB_NAME)->select_field("SELECT email FROM users WHERE email = '" . $_POST['email'] . "'");

        //If email already exists
        if($exists){

             //Redirect to error page
            Router::redirect('/users/signup/exists');
        }else{   
		
	
		# Mark the time
	$_POST['created'] = Time::now();
	$_POST['modified'] = Time::now();
		# Hash the password
	$_POST['password']= sha1(PASSWORD_SALT.$_POST['password']);
	
	
		
		# Create a hashed token
	$_POST['token']   = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
	
		# Insert the new user
	DB::instance(DB_NAME)->insert_row('users',$_POST);
	
		# Send them to the login page
	Router::redirect('/users/login');		
	}
	}	
		#Display a form so users can login
	public function login ($error=NULL){
		$this->template->content =View::instance('v_users_login');
		
		#pass data to view
		$this->template->content->error =$error;
		# Render this template
		echo$this->template;
	}
	
		#Process the login form
	public function p_login(){
	
		#sanitize the user enterd data to prevent any funny-business (re: SQl injection attacks)
	$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
		# Hash the password they entered so we can compare it with the ones in the database
	$_POST['password']=sha1(PASSWORD_SALT.$_POST['password']);
		
		
		#Set up the query to see if there#s a matching email/password in the DB
	$q="SELECT token
		FROM    users
		WHERE   email = '".$_POST['email']. "'
		AND		password = '".$_POST['password']."'";
	
	
	$token= DB::instance(DB_NAME)->select_field($q);

	# If you dont find a matching token login failed!
	if (!$token){
		
			#  Send them to the Login page "error"
			Router::redirect('/users/login/error');
			}
			# But if we did , Login successful
		else{
	
		  /* 
			Store this token in a cookie using setcookie()
			Important Note: *Nothing* else can echo to the page before setcookie is called
			Not even one single white space.
			param 1 = name of the cookie
		        param 2 = the value of the cookie
			param 3 = when to expire
			param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
			*/
        setcookie("token", $token, strtotime('+2 weeks'), '/');
		
			
			#send them to the main page-or where ever you what them to go
			
		Router::redirect('/');

		}	
		}
	
	
     public function logout() {
		
		
			# Generate a new token new token that they'll use  next time they login
		$new_token = sha1(TOKEN_SALT.$this-> user-> email.Utils:: generate_random_string () );
			
			#Update their row in the DB with the new token
		$data = Array (
			'token' => $new_token
			);
			
		# Do the update
		DB::instance(DB_NAME)-> update("users",$data,"WHERE token ='".$this->user->token."'");	
	
			#Delete their old token cookie by expiring it
		setcookie("token","",strtotime('-1 year'),'/');
		
			# Send them back to the homepage
		Router::redirect('/');
			
			echo "This is the logout page";
     }
 

     public function profile() {
		# Only logged in users are allowed...
		if(!$this->user){
			Router::redirect('/users/login');
			}
		
		# If not redirected away, continue:
		# Set up the View
		$this->template->content = View::instance('v_users_profile');	
		$this->template->title= "Profile of". $this->user->first_name;

		#display the View
		echo $this->template;
   
     
 }
 }