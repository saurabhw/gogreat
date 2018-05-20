<?php 	
session_start();
if(!isset($_SESSION['authenticated']))
       {
            header('Location: ../index.php');
            exit;
       }
	include "php/Connect.php";
	include "php/ResultHandler.php";
	class Handler extends ResultHandler {
		function __construct($res) {
			parent::__construct($res);
		}
		private function printHeader() {
			//$option = $_GET['type'];
			echo "<tr>";
			echo "<th valign='top'>";
			echo "<select onclick='selectOrgs(this.value)'";
			echo "<option value=''>Select Organization Type</option>";
			echo "<option value='active'>Show All Active Accounts</option>";
			echo "<option value='prospects'>Show All Prospects</option>";
			echo "<option value='all'>Show All</option>";
			echo "<option value='school'>Schools</option>";
			echo "<option value='religion'>Religious Organizations</option>";
			echo "<option value='community'>Community Organizations</option>";
			echo "<option value='causes'>Causes and Charities</option>";
			echo "</select>";
			echo "</th>";
			echo "<th valign='top'><label>Clubs &amp; Athletic Teams</label></th>";
			echo "<th valign='top'><label>Contact Name</label></th>";
			echo "<th valign='top'><label>Contact Email</label></th>";
			echo "<th valign='top'><label>Contact Phone#</label></th>";
			echo "<th valign='top' halign='center'><img src='images/redBanner.png' height='36' width='36' /></th>";
			echo "<th valign='top'><img src='icons/red phone.jpg' height='36' width='36' /></th>";
			echo "<th valign='top'><img src='icons/redEnv.jpg' height='36' width='36' /></th>";
			echo "<th valign='top'><img src='icons/redDollarSign.png' height='36' width='36' /></th>";
			echo "<th valign='top'><img src='icons/shakingHands.png' height='30' width='36' /></th>";
			echo "</tr>";
		}
		private function printBody() {	
			$lastOrg = "";
			if(count($this->result) > 0) {		
				while($orgs = mysqli_fetch_array($this->result)) {
					$contactName = $orgs['orgFName'] . " " . $orgs['orgLName'];
					$banner = ($orgs['bannerReady'] == '0') ? "red_x.png" : "greenCheck.png";
					$phone = ($orgs['websiteReady'] == '0') ? "red_x.png" : "greenCheck.png";
					$email = ($orgs['emailsReady'] == '0') ? "red_x.png" : "greenCheck.png";
					$paypal = ($orgs['paypalReady'] == '0') ? "red_x.png" : "greenCheck.png";
					$members = ($orgs['membersReady'] == '0') ? "red_x.png" : "greenCheck.png";
					echo "<tr>";
					if($lastOrg == $orgs['orgName']) {
						echo "<td border='0'> </td>";
					} else {
						echo "<td>" . $orgs['orgName'] . "</td>";
					}
					echo "<td>" . $orgs['clubTeam'] . "</td>";
					echo "<td>$contactName</td>";
					echo "<td>" . $orgs['orgEmail'] . "</td>";
					echo "<td>" . $orgs['orgPhone'] . "</td>";
					echo "<td class='icons'><img src='icons/$banner' height='24' width='24'/></td>";
					echo "<td class='icons'><img src='icons/$phone' height='24' width='24'/></td>";
					echo "<td class='icons'><img src='icons/$email' height='24' width='24'/></td>";
					echo "<td class='icons'><img src='icons/$paypal' height='24' width='24'/></td>";
					echo "<td class='icons'><img src='icons/$members' height='24' width='24'/></td>";
					echo "</tr>";	
					$lastOrg = $orgs['orgName'];
				}
			} else {
				echo "no results found";
			}
		}
		public function _print() {
			$this->printHeader();
			$this->printBody();
		}
	}
	
	function constructQuery($_table, $_type) { // returns a valid sql query to the table	
		$q = "SELECT * FROM $_table";
		switch($_type) {
			case "all":
				break;
			case "active":
				$q .= " WHERE paypalReady = '1' AND websiteReady = '1'";
				break;
			case "prospects":
				$q .= " WHERE paypalReady = '0' OR websiteReady = '0'";
				break;
			case "school":
				$q .= " WHERE orgType LIKE '%School'";
				break;
			case "religion":
				$q .= " WHERE orgType IN ('Church', 'Synogogue', 'Mosque')";
				break;
			case "causes":
			case "community":
				$q .= " WHERE orgType = 'Organization'";
				break;
			default:
				break;
		}
		$q .= " ORDER BY orgName";
		return $q;
	}

	ob_start();	

	$table = "orgInfo";
	$type = $_GET['type'];	
	$query = constructQuery($table, $type); // returns a valid sql query to the table	

	$connection = new Connection();
	$connection->make_query($query);
	$result = $connection->get_result();

	$handler = new Handler($result);
	$handler->_print();	

	ob_end_flush();
?>