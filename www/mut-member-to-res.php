<?php
/*
function to add/ del extra user to reservation .
pars:
mut-member-to-res.php?htmlid='+elm.id+'&resid='+resid+'+'&memberid='+memberid+'&status='+status


*/
require_once('lib/db/AdminDB.class.php');

$htmlid = $_REQUEST['htmlid'];
$resid  = $_REQUEST['resid'];
$memberid  = $_REQUEST['memberid'];
$status = $_REQUEST['status'];

?>
<html>
	<head>

	</head>
	<body bgcolor="#ffff00"><b>
	
<?php
function doit()
	{
				global $resid, $status, $htmlid, $memberid;
				global $conf;
?>			
				<script type="text/javascript">
<?php
								print "var resid='$resid';";
								print "var new memberid='$statustext';";
?>
								document.bgColor="#00ff00";
								// hide yourself; go back to "pending.."
								
								if (window.parent && window.parent.jQuery) {
									window.parent.jQuery('.statuscell input').removeAttr('disabled');
									window.parent.jQuery('#statustext-'+resid).html(statustext);
									// regel hieronder uitzetten igv test
									setTimeout("window.parent.jQuery('#cbframe').hide(); document.location.href='check-reservation-status.php'",500); //500
								} else {
									alert('update success');
								}
			</script>
<?php
				// else
	}


if ($memberid) {
				print "Processing..";
				doit($memberid);
} else {
				print "Connecting .. ";
}
?>
		
	</b></body>
</html>