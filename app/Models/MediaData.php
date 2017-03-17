<?php


class MediaData extends Database {
	//Get all uploaded images
	public function imageList ($f3) {
			$f3->set('images',
				$this->db->exec('SELECT img_id,img_name 
								FROM images'));	
	}

	protected function deleteImg ($f3,$imgId,$imgPath) {
			//Erase image name from database
			$image = new DB\SQL\Mapper($this->db,'images');
			$image->load(array('img_id=?',$imgId));
			$image->erase();
			//Erase actual file
			if (file_exists($imgPath)) {
				unlink($imgPath);
			}
			
	}
}