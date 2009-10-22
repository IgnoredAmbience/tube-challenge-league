<p>Here are your 15 Random Stations:</p>
			<table align="center" border="0" cellpadding="1" cellspacing="0">
				<?php	
					$query = "SELECT * FROM `tc_stations` WHERE tc_station_zone <= 2.5 ORDER BY RAND() LIMIT 15";
					$fnc = mysql_query($query) or die("Select Failed! [999]");

					$fncpos = 0;
					
					while ($fncdata = mysql_fetch_array($fnc)) {
						$fncpos++; ?>

				<tr class="row<?php if($fncpos%2 != 0){ echo "1"; } else { echo "2"; } ?>">
					<td><?php echo $fncdata['tc_station_name']; ?></td>
				</tr><?php } ?>
			</table>
			