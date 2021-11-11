<?php
$content = "<h1 align='center'>Players</h1>";

$sql = "SELECT * FROM player
ORDER BY player_name";
$result = mysqli_query($connection, $sql);
error_reporting(E_ALL);
ini_set("Display_errors",1);
if ($result === false) {
    echo mysqli_error($connection);
} else {
    $content .= "<table border='5', align='center'><thead align='left'>
                 <tr>  <th>Names</th>
                       <th>Country</th>
                 </tr>
		 </thead>
                 <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        $content .= "<tr>";
        $content .= "<td>".$row['player_name']."</td>";
        $content .= "<td>".$row['player_nationality']."</td>";
        
$content .= "</tr>";
    }
    $content .= "</tbody></table>";
    mysqli_free_result($result);
}

echo $content;

?>
