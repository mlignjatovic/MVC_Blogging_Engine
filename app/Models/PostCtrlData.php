<?php

/*
*
*	Data for Controllers
*/

class PostCtrlData extends Database {
	
	
	protected function insertPost ($f3,$title,$text,$catName) {
					//Method from this Class   $PostCtrlData->selectCategory()
						$categoryId = $this->selectCategory($f3,$catName);
						$this->db->exec('INSERT INTO  entries (post_title, post_text , cat_id) VALUES (?,?,?)',
										array(1=>$title,2=>$text,3=>$categoryId));
							
	}

	protected function updatePost ($f3,$postId,$title,$text,$catName) {
	
				//Method from this Class   $PostCtrlData->selectCategory()
					$categoryId = $this->selectCategory($f3,$catName);
					$this->db->exec('UPDATE entries SET post_title = ?, post_text = ?, cat_id = ? WHERE post_id = ?',
								array(1=>$title,2=>$text,3=>$categoryId,4=>$postId));
							 
	}

	protected function deletePost ($f3,$postId) {
		
				$post = new DB\SQL\Mapper($this->db,'entries');
				$post->load(array('post_id=?',$postId));
				$post->erase();
			
	}

	protected function selectCategory ($f3,$catName) {

				$cat = new DB\SQL\Mapper($this->db,'categories');
				$cat->load(array('cat_name=?',$catName));
				return $cat->cat_id;
			
	}

	
}
