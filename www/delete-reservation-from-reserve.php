<?php

	require_once('lib/Reservation.class.php');
	//	require_once('lib/ReservationTime.class.php');
	include_once('lib/Template.class.php');
	require_once('lib/Time.class.php');
	require_once('lib/CmnFns.class.php');
	include_once('config/langs.php');

	$resid = $_REQUEST['resid'];
	?>
			<script type="text/javascript">
				document.bgColor="#00ff00";
				alert('starting '+$resid);
				}
			</script>
	<?php
	
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

		// if ($res->check_res(array())) {
		// go delete

			if ($resid != $res->clusterid) {
				$res->db->del_res($resid,null,null,null,null,null);
				print ('cleanin up, success'); //eerste
			}else{
				$res->db->del_res_cluster($resid,$res->clusterid,null,null,null);
				print ('cleanin up, success');
			}
		
	
?>
			
<?php

	}

	
	if ($resid) {
		print "Processing..";
		//sleep(3);
		doit ($resid);
		//sleep(3);
		echo  "<script type='text/javascript'>";
		echo "window.close();";
		echo "</script>";
	} else {
		print "Connecting .. ";
	}
	

?>
		
	</b></body>
</html>