   <?php

$content = "<h1 align='center'>Add Player</h1>";

$action = $_SERVER["PHP_SELF"]."?page=add_player";

$sql= "SELECT team_id, team_name
	FROM team";

$result = mysqli_query($connection, $sql);

if ($result === false) {
    echo mysqli_error($connection);
} else {
    $options = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='".$row['team_id']."'>";
        $options .= $row['team_name'];
        $options .= "</option>";
    }
}

$form_html = "<form action='".$action."' method='POST' align='center'>
				<fieldset>
                                        <label for='p_name'>Player Name:</label>
                                        <input type='text' name='p_name' required>
                                </fieldset>
				<fieldset>
					<label for='p_nationality'>Nationality:</label>
					<input type='text' name='p_nationality' required>
				</fieldset>
			


                <fieldset>
                    <label for='t_id'>Teams</label>
                    <select name='t_id' required>
						<option value='' disabled selected>Select a team</option>

                        ".$options."
                    </select>
                </fieldset>
                <button type='submit'> Add </button>
              </form>";

$content .= $form_html;


$t_id = $p_name = $p_nationality = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$t_id   = $_POST["t_id"];
	$p_name = $_POST["p_name"];
	$p_nationality = $_POST["p_nationality"];

	$sql = "INSERT INTO player (player_name, player_nationality, team_id) VALUES ('$p_name','$p_nationality','$t_id')";

	$result = mysqli_query($connection, $sql);

	if ($result === false) {
		echo mysqli_error($connection);
				
	} else {
		$content .= "Player successfully added.";

	}
}
echo $content;

?>

