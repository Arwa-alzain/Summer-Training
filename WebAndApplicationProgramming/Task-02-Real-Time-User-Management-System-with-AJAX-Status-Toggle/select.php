<?php
include 'db.php';

#
echo "<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Status</th>
<th>Action</th>
</tr>";

# Fetch data from the database
$sql = "SELECT id, name, age, status FROM users ORDER BY id ASC";
$result = $conn->query($sql);

# Check if the query was successful
if(!$result) {
    # If the query failed, output an error message and terminate the script
    die("Query failed: " . $conn->error);
} elseif($result->num_rows > 0) {
    # If there are rows returned, loop through each row and output the data in a table
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        # Output the status with a unique ID for each row to facilitate AJAX updates
        echo"<td id='status_" . $row["id"] . "'>" . $row["status"] . "</td>";
        # Output a button to toggle the status, with an onclick event that calls a JavaScript function
        echo "<td><button onclick='toggleStatus(" . $row["id"] . ")'>Toggle Status</button></td>";
        echo "</tr>";
    }
} else {
    # If there are no rows returned, output a message indicating that no records were found
    echo "<tr><td colspan='5''>No records found</td></tr>";
}
echo "</table>";

#
$conn->close();
?>