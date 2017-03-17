<?php
/*
* Uploader Class 
*/
class Uploader extends Database {
		//Allowed filr formats
	private $allowed = ['image/png','image/jpg','image/jpeg'];

	public function upload ($f3) {
		$formFieldName = $f3->get('POST.image');
		$overwrite = false; // set to true, to overwrite an existing file
		$slug = true; // rename file to filesystem-friendly version
		$web = \Web::instance();
		$files = $web->receive(function($file,$formFieldName) {
		  		       
		        if(!in_array($file['type'], $this->allowed)) {
		        	if ($file['size'] > (2 * 1024 * 1024)) {
		        		echo "File is to big";
		        		// this file is not valid, return false will skip moving it
		        		return false; 
		        	}
		        	echo "You can upload just JPG and PNG files";
		        	// this file is not valid, return false will skip moving it
		            return false; 

		         } else {
		         	//insert file name to database
		         	$this->db->exec('INSERT INTO  images (img_name) VALUES (?)',
						array(1=>$file['name']));
		         	// allows the file to be moved to defined upload dir
		       		 return true; 
		         }   

		    },
		    $overwrite,
		    $slug
		);

		$f3->reroute('/admin/upload-images');

			}
}