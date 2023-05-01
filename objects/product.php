<?php
	class Product{

		private $conn;
		private $table_name = "products";

		public $id;
		public $category_id;
		public $name;
		public $description;
		public $price;
		public $image;
		public $code;
		public $stock;
		public $weight;

		public function __construct($db) {

			$this->conn = $db;

		}

		//read all products
		function read() {

			$query = "SELECT p.id, p.name, p.description, p.price, p.image, p.code, p.category_id, p.stock, p.weight
						FROM " . $this->table_name . " p 
						ORDER BY p.id DESC";

			$stmt = $this->conn->prepare($query);

			$stmt->execute();

		return $stmt;

		}

		function readOne(){
 
	        // query to read single record
	        $query = "SELECT
	                    p.id, p.name, p.description, p.price, p.image, p.code, p.category_id, p.stock, p.weight
	                FROM
	                    " . $this->table_name . " p
	                WHERE
	                    p.id = ?
	                LIMIT
	                    0,1";
	     
	        // prepare query statement
	        $stmt = $this->conn->prepare( $query );
	     
	        // bind id of product to be updated
	        $stmt->bindParam(1, $this->id);
	     
	        // execute query
	        $stmt->execute();
	     
	        // get retrieved row
	        $row = $stmt->fetch(PDO::FETCH_ASSOC);
	     
	        // set values to object properties
	        $this->name = $row['name'];
	        $this->description = $row['description'];
	        $this->price = $row['price'];
	        $this->image = $row['image'];
	        $this->code = $row['code'];
	        $this->weight = $row['weight'];
	    }

	    function update_product(){
 
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name = :name,
                    price = :price,
                    description = :description,
                    image = :image,
                    code = :code
                WHERE
                    id = :id";
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->code=htmlspecialchars(strip_tags($this->code));
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':id', $this->id);
     
        // execute the query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


	}

?>