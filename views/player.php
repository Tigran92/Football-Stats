 <?php

if (!isset($_GET['team_id'])) {
	$content .= "<p align='center'>Its not known what player you're looking for...</p>";
}
else {

	$team_id = $_GET['team_id'];
	$sql = "SELECT * FROM player
	INNER JOIN team 
		ON player.team_id=team.team_id
	WHERE team.team_id='$team_id'
	ORDER BY player_nationality ASC";

	$result = mysqli_query($connection, $sql);

	$row_cnt = mysqli_num_rows($result);
	if ($row_cnt == 0) {
		$content .= "<p align='center'>The team currently has no players or cannot be found!</p>";
	} else {
		

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			if ($i == 0) {
				$content .= "<h1 align='center'>".$row['team_name']."</h1>";
				$content .= "<table cellpadding='4' border='5' align='center'>
						<thead align='left'>
							<tr>
								<th>Player Name</th>
								<th>Player Nationality</th>
							</tr>
						</thead>
						<tbody>";
				$content .= "<p align='center'>The team currently has $row_cnt players.</p>";
			}
			
			$content .= "<tr>
							<td>".$row['player_name']."</td> 
							<td>".$row['player_nationality']."</td>
						</tr>";			
			$i++;
		}
		
		mysqli_free_result($result);

		$content .= "</tbody></table>";
	}
echo $content;
} 
