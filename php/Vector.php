<?php
	class Vector {
		private $list;
		private $size;
		function __construct() {
			$this->list = array();
			$size = 0;
		}
		public function get($index) {
			return $this->list[$index];
		}
		public function add($obj) {
			$this->list[$size] = $obj;
			$this->size = $this->size + 1;
		}
		public function toString() { // returns a string of the object elements sepparated by "," (commas)
			$string = "";
			for($i = 0; $i < $this->size; $i++) {
				$string .= $this->get($i);
				if($i != $this->size-1) {
					$string .= ",";
				}
			}
			return $string;
		}
	}
?>
