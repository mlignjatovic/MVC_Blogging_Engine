<?php
/*
*
* User Controller Class
* 
*/

class Users extends UsersData {
	
	public function login ($f3) {

		if ($f3->exists('POST.user_name') && $f3->exists('POST.user_password')) {
			$f3->clear('SESSION');
			$post_user = $f3->get('POST.user_name');
			$post_password = $f3->get('POST.user_password');
			// Method from this Class|   Users->checkCred()
			if ($this->checkCred($f3,$post_user,$post_password)) {
				
				$f3->reroute('/admin');
				
			}else {
				$f3->reroute('/login');
			}
			
		}
	}

	private function checkCred ($f3,$post_user,$post_password) {

		$user = new DB\SQL\Mapper($this->db,'users');
		$user->load(array('user_name=?',$post_user));	
			
		if (!$user->dry()) {

				$crypt = \Bcrypt::instance();
			if ($crypt->verify($post_password,$user->user_password)) {
				//If Login is successful set SESSION[user_name] && SESSION[user_email]
					$f3->set('SESSION.user_name',$user->user_name);
					$f3->set('SESSION.user_email',$user->user_email);
				if ($user->rol_id == '1') {
					$f3->set('SESSION.user_role','Administrator');
				}else if ($user->rol_id == '2') {
					$f3->set('SESSION.user_role','Editor');
				}
				//If password is OK 
				$out =  true;
				
			}else {

				$out =  false;
				
			}
		}
			
     return $out;
		
	}

	public function register($f3) {

		if (!$f3->exists('POST.username') || !strlen($f3->get('POST.username'))) {
				$f3->set('message','Username is required');	
		}else if (!$f3->exists('POST.password') || !strlen($f3->get('POST.password'))){
				$f3->set('message','Password is required');
		}else if (!$f3->exists('POST.email') || !strlen($f3->get('POST.email'))) {
				$f3->set('message','Email is required');
		}else if (!$f3->exists('POST.role') || !strlen($f3->get('POST.role'))) {
				$f3->set('message','Role is required');
		}else {
				// Fat-Free Validation plug-in
				$data = $f3->get('POST');
				$valid = Validate::is_valid($data, array(
				'username' => 'required|alpha_numeric',
			    'password' => 'required|max_len,100|min_len,6|alpha_numeric',
			    'email' => 'required|valid_email',
			    'role' => 'required|alpha_numeric'
			));
				// If Validator returns TRUE, set username,email and hash password with Fat-free Bcrypt API
			if ($valid === true) {
				$crypt = \Bcrypt::instance();
				$username = $f3->get('POST.username');
				$password = $crypt->hash($f3->get('POST.password'));
				$email = $f3->get('POST.email');
				$rolName = $f3->get('POST.role');
				// Call to UserData Model method| /app/Models/UserData->setUser()
				$this->setUser($f3,$username,$password,$email,$rolName);

				$f3->reroute('/admin/register');
				exit;
		}
		else {
			echo "Please enter valid charachters for all fields";
			exit;
		}
	}

}
	public function setDeleteUser ($f3,$params) {

		$userId = $f3->get('PARAMS.id');
		
		if (is_numeric($userId)) {
			//Call to UserData Model method| app/Models/UserData->deleteUser
			$this->deleteUser($f3,$userId);
		}
		
		$f3->reroute('/admin/register');
		exit;
	}

	public function logout ($f3) {
		$f3->clear('SESSION');
		$f3->reroute('/login');
		exit;
	}

	
}