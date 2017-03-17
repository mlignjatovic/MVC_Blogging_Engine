<?php
/*
*
*	Data for VIEWS only
*/
class PostViewData extends Database {


		//Get all post from database
	public function getAllPosts ($f3,$perPage,$offset) {

			$f3->set('result',
				$this->db->exec('SELECT post_id,post_title,LEFT(post_text,600) AS post_text,
								DATE_FORMAT(post_date, "%d/%m/%Y") AS nice_date,
								categories.cat_name 
								FROM entries INNER JOIN categories 
								ON entries.cat_id = categories.cat_id ORDER BY post_date DESC
								LIMIT ? OFFSET ?',array(1=>$perPage,2=>$offset)));
		
	}
		//Get one post from database
	public function getOnePost ($f3,$postId) {

			if (is_numeric($postId)) {
				$post = new DB\SQL\Mapper($this->db,'entries');
				$post->load(array('post_id=?',$postId));
				$f3->set('title',$post->post_title);
				$f3->set('text',$post->post_text);
			}
			
	}
		//Get data for post editing view
	public function editViewPost ($f3,$postId) {

			if (is_numeric($postId)) {
				$post = new DB\SQL\Mapper($this->db,'entries');
				$post->load(array('post_id=?',$postId));
				$f3->set('postId',$post->post_id);
				$f3->set('postTitle',$post->post_title);
				$f3->set('postText',$post->post_text);
				//Method from this Class |  PostViewData->getCategories()
				$this->getCategories($f3);
			}
			
	}
		//Get all names from categories
	public function getCategories ($f3) {

			$f3->set('categories',
				$this->db->exec('SELECT cat_name 
								FROM categories'));
	}

	
} 