<?php


class Media extends MediaData {
	
	public function setDeleteImg ($f3) {
		
		if ($f3->exists('POST.imgId') && $f3->exists('POST.path')) {
			
			$imgId = $f3->get('POST.imgId');
			$imgPath = $f3->get('POST.path');
			
			if (is_numeric($imgId)) {
				//MODEL METHOD app/Models/MediaData.php
				$this->deleteImg($f3,$imgId,$imgPath);
			}
		}
		
		
		$f3->reroute('/admin/upload-images');
		exit;
	}
}