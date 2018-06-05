<?php

	require_once('lib/Reservation.class.php');
	//	require_once('lib/ReservationTime.class.php');
	include_once('lib/Template.class.php');
	require_once('lib/Time.class.php');
	require_once('lib/CmnFns.class.php');
	include_once('config/langs.php');

	$resid = $_REQUEST['resid'];

	
	?>
<html>
	<head>

	</head>
	<body bgcolor="#ffff00"><b>
		
	
<?php
	function doit () {
		global $resid;
		global $conf;
		$res = new Reservation($resid);

		//if ($res->check_res(array())) {
		// delete mag altijd
		if (true) {
			if ($resid != $res->clusterid) {
				$res->db->del_res($resid,null,null,null,null,null);
				print ('delete artikel success'); //eerste
			}else{
				$res->db->del_res_cluster($resid,$res->clusterid,null,null,null);
				print ('delete cluster success');
			}
		
	
?>
			<script type="text/javascript">
				document.bgColor="#00ff00";
				// hide yourself; go back to "pending.."
				
				if (window.parent && window.parent.jQuery) {
				// alert('delete-reservation.php r45'); //success
					setTimeout("window.parent.document.location.href=window.parent.document.location.href",500); //500
				} else {
				alert('2'); // nooit zichtbaar
					alert('delete success');
				}
			</script>
<?php
		}else{
		//// dit treed op als starttijdstip in toekomst ligt (doe niets is het beste)
		//// en blijft hangen
			print ('(delete cluster:)nothing to delete, function fail!'); 
		}
	}

	if ($resid) {
		print "Processing..";
		//sleep(1);
		doit ($resid);
	} else {
		print "Connecting .. ";
	}
	

?>
		
	</b></body>
</html>