<?php
	class Connection {
		private $host= 'localhost';
		private $username = 'amoodf5';
		private $password = '8Bntddbc';
		private $db = 'amoodf5_gm2012';
		private $con;
		private $query;
		private $result;
		function __construct() { // table you want to connect to
			$this->con = mysqli_connect($this->host, $this->username, $this->password, $this->db);
		}
		public function make_query($q) {
			$this->query = $q;
			$this->result = mysqli_query($this->con, $this->query);
		}
		public function get_result() {
			return $this->result;
		}
	}
?>
