<?php
	
	class Category{

		private $conn;
		private $table_name = "categories";

		private $id;
		private $name;
		private $description;

		public function __construct($db) {

			$this->conn = $db;

		}

		//read all products
		function read() {

			$query = "SELECT c.category_id, c.name, c.description
						FROM " . $this->table_name . " c 
						ORDER BY c.category_id DESC";

			$stmt = $this->conn->prepare($query);

			$stmt->execute();

		return $stmt;

		}


	}

?>