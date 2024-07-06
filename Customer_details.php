<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Onlineshopping";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

$totalCustomers = mysqli_num_rows($result);
$maleCount = 0;
$femaleCount = 0;

if ($totalCustomers > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Gender'] == 'male') {
            $maleCount++;
        } elseif ($row['Gender'] == 'female') {
            $femaleCount++;
        }
    }
    echo '<div class="customer-stats">';
    echo '<div class="stat"><span class="label">Total Customers:</span> <span class="value">' . $totalCustomers . '</span></div>';
    echo '<div class="stat"><span class="label">Male Customers:</span> <span class="value">' . $maleCount . '</span></div>';
    echo '<div class="stat"><span class="label">Female Customers:</span> <span class="value">' . $femaleCount . '</span></div>';
    echo '</div>';
    
    echo '<table border="1">';
    echo "<tr>";
    echo "<th> Id </th>";
    echo "<th> Username </th>";
    echo "<th> Email </th>";
    echo "<th> Gender </th>";
    echo "</tr>";

    mysqli_data_seek($result, 0); 

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" .$row['id'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Gender'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($conn);
?>
