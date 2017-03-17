<?php
/*
*
*	Admin Views Class
*/
class Admin extends Views {
		//Beforeroute is called every time before any other method from this class
	public function beforeroute ($f3) {
		//Check if SESSION[user_name] && SESSION[user_email] are set
		if ($f3->exists('SESSION.user_name') && $f3->exists('SESSION.user_email')) {
			//If SESSION is set, render admin menu
				$f3->set('menu',array(
					'/admin'=>'New Post',
					'/admin/list-of-posts'=>'Posts',
					'/admin/upload-images'=>'Media',
					'/admin/register'=>'Users',
					'/admin/logout'=>'Logout'
			));
			$f3->set('header','admin/header.html');
		    $f3->set('footer','admin/footer.html');
			
		}else {

			$f3->reroute('/login');
		}
		
	}
			//New post page
	public function index ($f3) {
		//MODEL OBJECT FROM app/Models/PostViewData.php
		$getCat = new PostViewData($f3);
		$getCat->getCategories($f3);

		$f3->set('content','admin/newPost.html');

	}
		//Post list page
	public function postList ($f3) {

		$perPage = 6;//Set how many posts will be shown per page 
		$pagination = new Pagination($f3);
		$pagination->setParams($f3,(int)$f3->get('PARAMS.page'),$perPage);
		$f3->set('links',$pagination->createLinks($f3));
		//MODEL OBJECT FROM app/Models/PostViewData.php
		$getPosts = new PostViewData($f3);
		$getPosts->getAllPosts($f3,$pagination->perPage,$pagination->offset);
		
		$f3->set('content','admin/postList.html');

	}
		//Post editing page
	public function editPost ($f3,$postId) {
		
		$postId = $f3->get('PARAMS.id');
		//MODEL OBJECT FROM app/Models/PostViewData.php
		$getPost = new PostViewData($f3);
		$getPost->editViewPost($f3,$postId);
		
		$f3->set('content','admin/newPost.html');

	}
		//Register and user list page page
	public function register ($f3) {
		//MODEL OBJECT FROM app/Models/UserData.php
		$users = new UsersData($f3);
		$users->getUsers($f3);
		$users->getRoles($f3);

		$f3->set('content','admin/register.html');

	}
		//Upload page 
	public function upload ($f3) {
		//MODEL OBJECT FROM app/Models/MediaData.php
		$getImg = new MediaData($f3);
		$getImg->imageList($f3);

		$f3->set('content','admin/upload.html');

	}

	
	
	
}