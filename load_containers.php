<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "dashboard_db"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch containers from database
$sql = "SELECT id, container_name FROM containers LIMIT 6"; // Adjust LIMIT as needed
$result = $conn->query($sql);

// Display containers
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='box' id='container-" . $row["id"] . "'>";
        echo "<button class='hide-button' onclick='toggleContainerVisibility(\"container-" . $row["id"] . "\")'>Hide</button>";
        echo "<span class='container-name'>" . $row["container_name"] . "</span>";
        echo "</div>";
    }
} else {
    echo "No containers found";
}

$conn->close();
?>
