<?php
	class post_controller extends base_controller{
	public function __construct(){
	
		
		#makes sure the parent function gets called
		parent::__construct();
		
		
		# only lets logged in users access the methods in this controller	
		if(!$this->user){
			die("Members only.<a ref='/users/login'>Login</a>");
		}
	}	
	
	# Display a new post	
	public function add(){
		# set up view
		$this->template->content = View::instance("v_posts_add");
		$this->template->title = "NEW POST";
		
		#render template
		echo $this -> template;
		}
		
	
	# Process new post
	public function p_add(){
	
		#associate this post with this user
		$_POST ['user_id'] = $this -> user-> user_id;
		
		$_POST ['created'] = Time::now();
		$_POST ['modified'] = Time::now();
		
		#insert
	    DB::instance(DB_NAME)->insert('posts', $_POST);
		
		# Setup view
		$this->template->content=View::instance('v_post_p_add');
		$this->template->title= "New Post";
		
		#render this template
		echo $this->template;
	}
	
	# View all posts
	public function index(){
		
		# Set up view
		$this-> template -> content = View :: instance('v_posts_index');
		$this->template->title = "Posts";
	
		# Build the query
	$q = "SELECT
			posts.*,
			users.first_name,
			users.last_name
		
		FROM posts
		INNER JOIN users
				ON	posts.user_id = users.user_id";
		
		#rum
		$posts = DB::instance (DB_NAME)-> select_rows($q);
		
		# Pass array to the view
		$this-> template-> content->posts = $post;
		
		# Render view
		echo$this->template;
	}
		
		public function users() {

    # Set up the View
    $this->template->content = View::instance("v_posts_users");
    $this->template->title   = "users";

    # Setup  the query to get all the users
    $q = 'SELECT*
        FROM users';

	# Run query
    $users = DB::instance(DB_NAME)->select_rows($q);

    # Build the query to get ALL connections from users_users table
    # I.e. who are they following
    $q = 'SELECT* 
        FROM users_users
        WHERE user_id = '.$this->user->user_id;

    # Execute this query with the select_array method
    # select_array will return our results in an array and use the "users_id_followed" field as the index.
    # This will come in handy when we get to the view
    # Store our results (an array) in the variable $connections
    $connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

    # Pass data (users and connections) to the view
    $this->template->content->users       = $users;
    $this->template->content->connections = $connections;

    # Render this view
    echo $this->template;
	}
	
	# Creates a row in rhe users_users table representing that one user is following another
	public function follow($user_id_followed) {

    # Prepare the data array to be inserted
    $data = Array(
        "created"	 		=> Time::now(),
        "user_id" 			=> $this->user->user_id,
        "user_id_followed" 	=> $user_id_followed
        );

    # Do the insert
    DB::instance(DB_NAME)->insert('users_users', $data);

    # Send them back
    Router::redirect("posts/v_posts_users");

	}
	
	# Removes the specified row in the users_users table,removing the follow between two users
	public function unfollow($user_id_followed) {
		

     # Set up the where condition
	$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
	
	# Run the delete
    DB::instance(DB_NAME)->delete('users_users', $where_condition);

     # Send them back
	Router::redirect("/posts/users");

	}

	}
     
		