<?php
	// A class that the user defines the user in the website
	class User{
		public $id;
		public $email;
		public $role;
		public $class;

		public function __construct($id, $email, $role, $class) {
			$this->id = $id;
			$this->email = $email;
			$this->role = $role;
			$this->class = $class;	
		}
	}
?>