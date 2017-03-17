<?php

class Views {
	
	public function afterroute ($f3) {

		echo \Template::instance()->render('layout/layout.html');
	}
}