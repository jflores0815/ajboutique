<?php
	
	class Client{

		private $conn;
		private $table_name = "clients";

		private $id;
		private $name;
		private $nickname;
		private $username;
		private $password;
		private $email;
		private $contact_number;
		private $birthday;
		private $address;
		private $status;
		private $created_at;

		public function __construct($db) {

			$this->conn = $db;

		}

		//read all products
		function read() {

			$query = "SELECT c.id, CONCAT(c.last_name, ', ', c.first_name) as 'name', c.nickname, c.username, 
						c.password, c.email, c.contact_number, date_format(c.birthday,'%M %d, %Y') as 'birthday',
						c.address, c.status, c.created_at
						FROM " . $this->table_name . " c
						ORDER BY c.id ASC";

			$stmt = $this->conn->prepare($query);

			$stmt->execute();

		return $stmt;

		}
		
		function read_one() {
		    
		    // query to read single record
            $query = "SELECT
                        c.name, c.name
                    FROM
                        " . $this->table_name . " c
                    WHERE
                        c.username = ?
                    LIMIT
                        0,1";
         
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
         
            // bind id of product to be updated
            $stmt->bindParam("s", $this->username);
         
            // execute query
            $stmt->execute();
         
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
            // set values to object properties
            $this->id = $row['id'];
            $this->name = $row['name'];
		    
		}


	}

?>