		function setNewEndDateandTime ($res) {
			// begin standaarcode van check-reservation-status
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
					/// te vroeg binnen, einddatum ligt in de toekomst,
					/// data aanpassen naar nu
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
						// klaar /// data aanpassen naar nu
			
		// eind standaarcode van check-reservation-status
		}
