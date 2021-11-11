<?php
$content = "<h1 align='center'>Grounds</h1>";

$sql = "SELECT * FROM ground";
$result = mysqli_query($connection, $sql);
error_reporting(E_ALL);
ini_set("Display_errors",1);
if ($result === false) {
    echo mysqli_error($connection);
} else {
    $content .= "<table border='5', align='center'><thead align='left'>
                 <tr>  <th>Names</th>
                       <th>Address</th>
		       <th>Capacity</th>
                 </tr>
		 </thead>
                 <tbody>";
while ($row = mysqli_fetch_assoc($result)) {
                       $content .= "<tr> <td>".$row['ground_name']."</td>
                                                <td>".$row['ground_address']."</td>
						<td>".$row['ground_capacity']."</td>
                                    </tr>";
    }
    $content .= "</tbody></table>";
    mysqli_free_result($result);
}

echo $content;

?>
