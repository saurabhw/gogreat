<?php
	abstract class ResultHandler {
		protected $result;
		function __construct($res) {
			$this->result = $res;
		}
		public function _print() {
			return "this function should be overwritten.<br />";
		}
	}
?>
