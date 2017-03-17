<?php
/*
*
* Posts Controller Class
* 
*/
class Posts extends PostCtrlData {
	//Insert post in database
	public function setPost ($f3) {
		//Check if POST array elements sent from form exists
		if ($f3->exists('POST.title') && $f3->exists('POST.post-text') && $f3->exists('POST.category')) {

			$title = $f3->get('POST.title');
			$text = $f3->get('POST.post-text');
			$catName = $f3->get('POST.category');
			//Check if POST elements are empty
			if (strlen($title) && strlen($text) && strlen($catName)) {

				//MODEL METHOD app/Models/PostCtrlData.php
				$this->insertPost($f3,$title,$text,$catName);

			}else {

				echo "Fields can't be empty!";
				exit;
			}

		}else {

			echo "Error Processing Request";
			exit;
		}

		$f3->reroute('/admin/list-of-posts');
		exit;
	}
		//Delete Post
	public function setDelete ($f3,$params) {

		$postId = $f3->get('PARAMS.id');
		
		//MODEL METHOD app/Models/PostCtrlData.php
		if (is_numeric($postId)) {
			$this->deletePost($f3,$postId);
		}
		
		$f3->reroute('/admin/list-of-posts');
		exit;
	}
		//Update post
	public function setUpdate ($f3,$params) {

		if ($f3->exists('POST.title') && $f3->exists('POST.post-text') && $f3->exists('POST.category')) {

			$postId = $f3->get('PARAMS.id');
			$title = $f3->get('POST.title');
			$text = $f3->get('POST.post-text');
			$catName = $f3->get('POST.category');
			
			if (is_numeric($postId)) {
				//MODEL METHOD app/Models/PostCtrlData.php
				$this->updatePost($f3,$postId,$title,$text,$catName);
			}
		}
		
		$f3->reroute('/admin/list-of-posts');
		exit;
	}
}