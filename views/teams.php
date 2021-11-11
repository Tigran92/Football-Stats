<?php
$content = "<h1 align='center'>Teams</h1>";

$sql = "SELECT * FROM team ORDER BY team_manager";


$result = mysqli_query($connection, $sql);
error_reporting(E_ALL);
ini_set("Display_errors",1);
if ($result === false) {
    echo mysqli_error($connection);
} else {
    $content .= "<table border='5', align='center'><thead align='left'>
                 <tr>  <th>Names</th>
                       <th>Manager</th>
		       <th>Contact</th>
			<th>ID</th>
                 </tr>
		 </thead>
                 <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
      $content .= "<tr> <td><a href='?page=player&team_id=".$row['team_id']."'>".$row['team_name']."</a></td>
                                            <td>".$row['team_manager']."</td>
                                            <td>".$row['team_contact_number']."</td>
					    <td>".$row['team_id']."</td>
                                    </tr>"; 

        
    }
    $content .= "</tbody></table>";
    mysqli_free_result($result);
}

echo $content;

?>
