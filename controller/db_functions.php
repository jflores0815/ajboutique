<?php

	class DB_Functions {
		
		private $conn;
		
		// constructor
		function __construct() {
			require_once ("../include/DB_Connect.php");
			// connecting to database
			$db = new Db_Connect();
			$this->conn = $db->connect();
		}

		// destructor
		function __destruct() {
			
		}
		
		public function getLoginDetails($username, $password) {

        $stmt = $this->conn->prepare("SELECT * FROM clients WHERE username = ? AND account_status='1'");

        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
						$stored_password = $user['password'];

            // check for password equality
            if ($stored_password == $password) {

								// user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }
		
	}
	
?>
