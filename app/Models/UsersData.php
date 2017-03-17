<?php

/*
*
*	User Data Class
*/

class UsersData extends Database {
	
			//Insert new user in database
	protected function setUser ($f3,$username,$password,$email,$rolName) {
	
			$user = new DB\SQL\Mapper($this->db,'users');
			$user->load(array('user_name=?',$username));
			//Method from this Class| UserData->setRole()
			$setRol = $this->setRole($f3,$rolName);

			if ($user->dry()) {
				$this->db->exec('INSERT INTO  users (user_name, user_password, user_email, rol_id) VALUES (?,?,?,?)',
							array(1=>$username,2=>$password,3=>$email,4=>$setRol));
			}else {
				echo "User already exists";
				exit;
			}
		
	}
			//Get all users from database
	public function getUsers ($f3) {

			$f3->set('users',
				$this->db->exec('SELECT user_id,user_name,user_email, roles.rol_name 
								FROM users INNER JOIN roles ON users.rol_id = roles.rol_id'));
	}

	protected function deleteUser ($f3,$userId) {
	
				$user = new DB\SQL\Mapper($this->db,'users');
				$user->load(array('user_id=?',$userId));
				$user->erase();
				
	}
			//Return Role ID for later use
	private function setRole($f3,$rolName) {

			$role = new DB\SQL\Mapper($this->db,'roles');
			$role->load(array('rol_name=?',$rolName));
			return $role->rol_id;
		
	}
			//Get role names from database
	public function getRoles ($f3) {

			$f3->set('roles',
				$this->db->exec('SELECT rol_name 
								FROM roles'));
	}

	
}