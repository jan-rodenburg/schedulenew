<?php
// sending confirm mail
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
	<body bgcolor="#0000ff"><b>
		
	
<?php
	function domail () {
		global $resid,$status,$htmlid;
		
		$res = new Reservation($resid);

		
		if ($res->check_res(array())) {
			print ('SUCCESS');
			$res->send_email('e_add', null, array($res->user->get_email())) ;
				//die("yes");
			
?>
			<script type="text/javascript">
<?php
			//j	$statustext = $status;
				print "var resid='$resid';";
				// print "var statustext='$statustext';";
				
?>
				document.bgColor="#00ffff";
				// hide yourself; go back to "pending.."
				
				if (window.parent && window.parent.jQuery) {
					window.parent.jQuery('.mailcell').removeAttr('display');  // nu wordt ie getoond
					// window.parent.jQuery('#statustext-'+resid).html(statustext); // schrijf actuele ... in parent
					// alert('press ok');
					//setTimeout("document.location.href='send-confirm-mail.php'",500);
					setTimeout("window.parent.jQuery('#sendmailframe').hide(); document.location.href='send-confirm-mail.php'",500);
				} else {
					// alert('mail send success');
				}
					
				
			</script>
			
<?php
		
		}else{
			print ('FAIL!');
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