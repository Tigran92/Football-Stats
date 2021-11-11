<?php
$content = "<h1 align='center'>Full Details<h1>";




 $sql = "SELECT team. team_id, team_name, team_manager, team_contact_number, ground_name, ground_address, ground_capacity, player_name, player_nationality
 	FROM ground
 	INNER JOIN team
	ON ground.ground_id=team.team_id
 	INNER JOIN player 
 	ON ground.ground_id=player.team_id
	ORDER BY team_name";





$result = mysqli_query($connection, $sql);
error_reporting(E_ALL);
ini_set("Display_errors",1);
if ($result === false) {
    echo mysqli_error($connection);
} else {
    $content .= "<table border='5', align='center'><thead align='left'>
                 <tr> 
			
			<th>Player</th>
		 	<th>Country</th>
			<th>Team</th>
                        <th>Manager</th>
		        <th>Stadium</th>
			<th>Capacity</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>Team ID</th>
                 </tr>
		 </thead>
                 <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        $content .= "<tr>";
        $content .= "<td>".$row['player_name']."</td>";
        $content .= "<td>".$row['player_nationality']."</td>";
	$content .= "<td>".$row['team_name']."</td>";
        $content .= "<td>".$row['team_manager']."</td>";
	$content .= "<td>".$row['ground_name']."</td>";  
	$content .= "<td>".$row['ground_capacity']."</td>";
	$content .= "<td>".$row['ground_address']."</td>";
	$content .= "<td>".$row['team_contact_number']."</td>";
	$content .= "<td>".$row['team_id']."</td>";
$content .= "</tr>";
    }
    $content .= "</tbody></table>";
    mysqli_free_result($result);
}

echo $content;

?>
