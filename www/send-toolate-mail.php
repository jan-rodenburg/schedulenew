<?php
// sending toolate mail
	require_once('lib/Reservation.class.php');
	include_once('lib/Template.class.php');
	require_once('lib/Time.class.php');
	require_once('lib/CmnFns.class.php');
	include_once('config/langs.php');

	$resid = $_REQUEST['resid'];
	$status = (int)$_REQUEST['status'];
	$htmlid = $_REQUEST['htmlid'];
	
	?>
<html>
	<head>

	</head>
	<body bgcolor="#00ff00"><b>
		
	
<?php
	function domail () {
		global $resid,$status,$htmlid;
		
		$res = new Reservation($resid);

		
		if ($res->check_res(array())) {
			print ('SUCCESS');
			$res->send_email('e_late', null, array($res->user->get_email())) ;
			//print ('Email to: '.$res->user->get_email() );	
			
?>
			<script type="text/javascript">
<?php
			//j	$statustext = $status;
				print "var resid='$resid';";
				// print "var statustext='$statustext';";
				
?>
				document.bgColor="#FFFF00";
				// hide yourself; go back to "pending.."
				// alert('press ok');
				if (window.parent && window.parent.jQuery) {
					window.parent.jQuery('.mailcell').removeAttr('display');
					// window.parent.jQuery('#statustext-'+resid).html(statustext); // schrijf actuele ... in parent
					// alert('press ok');
					setTimeout("window.parent.jQuery('#sendmailframe').hide(); document.location.href='send-toolate-mail.php'",500);
				} else {
					// alert('mail too late send success');
				}
					
				
			</script>
			
<?php
		
		}else{
			print ('FAIL');
		}
	}

	if ($resid) {
		print "Mail success.<br><br>";
		domail ($resid);
		sleep(3);
	} else {
		print "Connecting ... ";
		//sleep(3);
	}
	

?>
		
	</b></body>
</html>