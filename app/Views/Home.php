<?php

class Home extends Views {
//Beforeroute is called every time before any other method from this class
	public function beforeroute ($f3) {

		$f3->set('menu',array(
			'/'=>'Home',
			'/login'=>'Login'));
		$f3->set('header','header.html');
		$f3->set('footer','footer.html');
	}

	public function index ($f3,$params) {

		$perPage = 2; //Set how many posts will be shown per page
		//MODEL OBJECT FROM app/Models/Pagination.php
		$pagination = new Pagination($f3);
		$pagination->setParams($f3,(int)$f3->get('PARAMS.page'),$perPage);
		$f3->set('links',$pagination->createLinks($f3));
		//MODEL OBJECT FROM app/Models/PostViewData.php
		$getPosts = new PostViewData($f3);
		$getPosts->getAllPosts($f3,$pagination->perPage,$pagination->offset);

		$f3->set('content','allPosts.html');

	}

	public function singlePostView ($f3,$params) {
		
		$postId = $f3->get('PARAMS.id');
		//MODEL OBJECT FROM app/Models/PostViewData.php
		$getPosts = new PostViewData($f3);
		$getPosts->getOnePost($f3,$postId);

		$f3->set('content','singlePost.html');

	}
		//Login page
	public function login ($f3,$params) {
		
		$f3->set('content','login.html');

	}
}