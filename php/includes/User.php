<?php
	// A class that the user defines the user in the website
	class User{
		public $id;
		public $name;
		public $email;
		public $role;
		public $class;
		public $image_path;

		public function __construct($id,$name, $email, $role, $class, $image_path) {
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
			$this->role = $role;
			$this->class = $class;	
			$this->image_path = $image_path;
		}
	}
?>