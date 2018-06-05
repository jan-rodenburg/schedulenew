<?php
require_once('lib/Reservation.class.php');
include_once('lib/Template.class.php');
require_once('lib/Time.class.php');
require_once('lib/CmnFns.class.php');
include_once('config/langs.php');
$resid  = $_REQUEST['resid'];
$status = (int) $_REQUEST['status'];
$htmlid = $_REQUEST['htmlid'];
?>
<html>
	<head>

	</head>
	<body bgcolor="#ffff00"><b>
		
	
<?php
function doit()
{
				global $resid, $status, $htmlid;
				global $conf;
				$res = new Reservation($resid);
				if ($status < 0 || $status > 3)
								$res->reservation_status = 0;
				else
								$res->reservation_status = $status;
				if ($status == 4)
								$res->reservation_status = 3;
				if ($res->reservation_status == 2 || $res->reservation_status == 3) {
			/// begin set tijdwaardes
					$gmtimenow = time() - (int)substr(date('O'),0,3)*60*60; 
					$offset = -60; // minuten tov GMT local xampp
					$midnight = strtotime('00:00');
												$epochseconds = gettimeofday(true);
												$timeofdayseconds = $epochseconds - $midnight;
												$timeofdayminutes = $timeofdayseconds/60;
												$timeofdayhour = $timeofdayminutes/60;
												$timeofdaylasthourinminutes = floor($timeofdayhour)*60;
					$time_nu = $timeofdaylasthourinminutes + $offset; // laatst verstreken uur in minuten na middernacht
					$dag_nu = Time::getAdjustedDate($gmtimenow); //DIT IS DAG nu in seconden
					
					$dag_verschil = 86400; // dag verchil is 86400 = 3600 x 24, in seconden
					$uur_verschil = 60; // uurverschil is 60, in minuten
			/// einde set tijdwaardes					

					$oldresdate=$res->end_date;
					$oldrestime=$res->end;

					while ($res->end_date > $dag_nu)  {
					$res->end_date = $res->end_date - $dag_verschil; // 1 dag terug 
					}
					
					if ($res->end_date == $dag_nu ) {
						while ($res->end > $time_nu) {
							$res->end = $res->end - $uur_verschil; // 1 uur terug
						}
					}
						///
					// EINDTIJD MAG NIET VROEGER DAN BEGINTIJD
				// check de nieuwe eindtijd: 
				
					if ($res->start_date==$res->end_date && $res->end <= $res->start) {
									$res->end = $res->start+60; // force 1 hour up.
					}

					if ($res->start_date > $res->end_date) {
									$res->end_date = $oldresdate; // RESTORE, do not update timings; ***todo: alert begintijd groter dan nieuwe eindtijd, artikel niet vrijgegeven
									$res->end = $oldrestime;
					}		
					
					
				}
				// end doit
				
				if ($res->check_res(array())) {
								// update!!
								if ($status == 4) {
												$res->db->mod_res_cluster_readyall($res);
								} else {
												$res->db->mod_res($res, null, null, null, null, null);
								}
								// write testdata
								if ($res->reservation_status == 2 || $res->reservation_status == 3) {
												print('<br>pre update: date:' . $oldresdate . ' time:' . $oldrestime . '<br>');
												print('post update: date:' . $res->end_date . ' time:' . $res->end. '<br>');
												print('dagnu:' . $dag_nu . ' timenu:' . $time_nu. '<br>');
												
												
								} else {														
												
												print('update success');
								}
								$statustext = translate_status_res($status);
								$nowtime    = Time::getAdjustedTime(mktime());
								$enddateDB  = $res->end_date + 60 * $res->end;
								if (($res->res_to_late()) && ($res->reservation_status < 2)) {
												$statustext = $statustext . ' &gt; ' . translate('Too late');
								} else {
								}
								if (($status == 4)) {
												$statustext = '<span class="valop2">' . translate('reservation_status4') . '</span>';
								}
?>
			<script type="text/javascript">
<?php
								print "var resid='$resid';";
								print "var statustext='$statustext';";
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
				} else {
								print('<br>nothing updated. check the startdate!');
				}
}
if ($resid) {
				print "Processing..";
				doit($resid);
} else {
				print "Connecting .. ";
}
?>
		
	</b></body>
</html>