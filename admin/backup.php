<?php

$server = "localhost";
$user = "root";
$password = "gcap";
$db = "lottery_game";

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    echo 'Connection Failed' . mysqli_connect_error($conn);
}

$conn->set_charset("utf8");

// Get All Table and View Names From the Database
$tables = array();
$sql = "SHOW FULL TABLES WHERE TABLE_TYPE LIKE 'BASE TABLE' OR TABLE_TYPE LIKE 'VIEW'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];
}

$sqlScript = "";
foreach ($tables as $table) {
    // Prepare SQL script for creating table/view structure
    $query = "SHOW CREATE TABLE $table";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $sqlScript .= "\n\n" . $row[1] . ";\n\n";

    if ($row[1] != null) {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($conn, $query);

        $columnCount = mysqli_num_fields($result);

        // Prepare SQL script for dumping data for each table/view
        if ($columnCount > 0) {
            while ($row = mysqli_fetch_row($result)) {
                $sqlScript .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j++) {
                    $row[$j] = $row[$j];

                    if (isset($row[$j])) {
                        $sqlScript .= '"' . $row[$j] . '"';
                    } else {
                        $sqlScript .= '""';
                    }
                    if ($j < ($columnCount - 1)) {
                        $sqlScript .= ',';
                    }
                }
                $sqlScript .= ");\n";
            }
        }
        $sqlScript .= "\n";
    }
}

if (!empty($sqlScript)) {
    // Save the SQL script to a backup file
    $backup_file_name = $database_name . 'lottery_game_' . date("m-d-Y") . '.sql';
    $fileHandler = fopen($backup_file_name, 'w+');
    $number_of_lines = fwrite($fileHandler, $sqlScript);
    fclose($fileHandler);

    // Download the SQL backup file to the browser
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backup_file_name));
    ob_clean();
    flush();
    readfile($backup_file_name);
    exec('rm ' . $backup_file_name);
}

if (!$result) {
    echo mysqli_error($conn);
} else {
    header('location: home.php');
}
?>
