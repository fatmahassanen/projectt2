<?php
include 'config.php';
$sql = "SELECT * FROM events";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>{$row[' event name']}</td>";
echo "<td>{$row['date']}</td>";
echo "<td>{$row['score']}</td>";
echo "<td>{$row['evaluate']}</td>";
echo "</tr>";
}
} else {
echo "<tr><td colspan='4'>No products found</td></tr>";
}
?>