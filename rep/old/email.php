<?php
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	class Email {
		private $body;
		private $to;
		private $from;
		private $header;
		function __construct() {
			$this->body = "";
			$this->to = "";
			$this->from = "";
			$this->subject = "";
		}
		public function setBody($body) {
			$this->body = $body;
		}
		public function setTo($to) {
			$this->to = $to;
		}
		public function setFrom($from) {
			$this->from = $from;
		}
		public function setSubject($subject) {
			$this->subject = $subject;
		}
		public function send() { // attempts to send email with given parameters, returns false if sending 
		// failed, true if sent successfuly NOTE: this does not ensure the email actually reached its destination
			return mail($this->to, $this->subject, $this->body, "FROM: noreply@greatmoods.com");
		}
	}
?>