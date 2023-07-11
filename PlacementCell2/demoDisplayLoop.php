<?php require 'db_connection.php' ?>
<?php
// Get the column names from the database
$result = mysqli_query($conn, "SHOW COLUMNS FROM $db.PersonalInfo");
$column_names = array();
while ($row = mysqli_fetch_array($result)) {
    $column_names[] = $row['Field'];
}

// Get the data for each column
$data = array();
foreach ($column_names as $name) {
    $result = mysqli_query($conn, "SELECT $name FROM $db.PersonalInfo");
    while ($row = mysqli_fetch_array($result)) {
        $data[$name][] = $row[$name];
    }
}

// Output the table
echo "<table>";
echo "<tr>";
foreach ($column_names as $name) {
    echo "<th>$name</th>";
}
echo "</tr>";
foreach ($data as $column_name => $column_data) {
    echo "<tr>";
    foreach ($column_data as $data) {
        echo "<td>$data</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
JavaScript:

// Get the column names from the database
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var column_names = [];
        var response = JSON.parse(this.responseText);
        for (var i = 0; i < response.length; i++) {
            column_names.push(response[i]['Field']);
        }
        
        // Get the data for each column
        var data = {};
        for (var i = 0; i < column_names.length; i++) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var column_name = this.getResponseHeader('column_name');
                    var response = JSON.parse(this.responseText);
                    data[column_name] = [];
                    for (var j = 0; j < response.length; j++) {
                        data[column_name].push(response[j][column_name]);
                    }
                    
                    // Output the table
                    if (Object.keys(data).length == column_names.length) {
                        var table = document.createElement('table');
                        var header = table.createTHead();
                        var row = header.insertRow(0);
                        for (var k = 0; k < column_names.length; k++) {
                            var cell = row.insertCell(k);
                            cell.innerHTML = column_names[k];
                        }
                        var body = table.createTBody();
                        for (var k = 0; k < data[column_names[0]].length; k++) {
                            var row = body.insertRow(k);
                            for (var l = 0; l < column_names.length; l++) {
                                var cell = row.insertCell(l);
                                cell.innerHTML = data[column_names[l]][k];
                            }
                        }
                        document.body.appendChild(table);
                    }
                }
            };
            xhttp.open('GET', 'get_data.php?column_name=' + column_names[i], true);
            xhttp.send();
        }
    }
};
xhttp.open('GET', 'get_column_names.php', true);
xhttp.send();