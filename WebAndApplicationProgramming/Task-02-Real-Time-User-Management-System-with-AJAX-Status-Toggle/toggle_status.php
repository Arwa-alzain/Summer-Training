<?php
include 'db.php';

if(isset($_GET['id'])) {
    $id = intval(($_GET['id']));

    $sql = "SELECT status FROM users WHERE id = '$id'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentStatus = $row['status'];

        $newStatus = ($currentStatus == 0) ? 1 : 0;

        $updateSql = "UPDATE users SET status = '$newStatus' WHERE id = '$id'";

        if($conn->query($updateSql) === TRUE) {
            echo $newStatus;
        } else {
            echo "Error updating status: " . $conn->error;
        }
    }
}

$conn->close();

?>