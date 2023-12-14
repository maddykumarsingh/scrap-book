<?php
include "database.php";
session_start();

// Check if the user's ID is stored in the session
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect additional data from this page
    $country = $_POST["country"]; // New field


    $id = $conn->real_escape_string($_SESSION["id"]);

    // New field
    $country = $conn->real_escape_string($country);

    $sql = "UPDATE person SET country = '$country' WHERE person_id = '$id'";

    if ($conn->query($sql) === TRUE) {
       header("Location:thankyou.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}
?>
 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css"
    href="fonts/style.css"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
body {
    height: 100%;
    margin: 0;
    font-family: 'PF Handbook Pro Regular';
    background-image: url('images/background_travel.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    cursor: url('images/plane_cur.png');

  }

#logo {
  background-image: url('images/ABC_Red.jpg');
  position: absolute;
  top: 25px;
  right: 25px;
  width: 330px; /* Adjust size as needed */
  height: 70px; /* Adjust size as needed */
  background-size: cover;
}

</style>
</head>

<body>
    <div id="logo"></div>
    <h2 style="text-align: center; color: #c31d2e; margin-top: 50px; ">Favorite travel destination or dream destination</h2>
    <div id="regions_div" style="width: 900px; height: 500px; align-self: center; margin: auto; margin-top: 50px;">
    </div>
</body>
<script>
    google.charts.load('current', {
        'packages':['geochart'],
      });
      google.charts.setOnLoadCallback(drawRegionsMap);
      var selectedCountry = 'India'; // Default selected country

function drawRegionsMap() {
  var data = google.visualization.arrayToDataTable([
    ['Country'],
    [selectedCountry]
  ]);

  var options = {
    region: 'world',
    resolution: 'countries',
    colorAxis: { colors: ['#c31d2e'] }
  };

  var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

  // Add a custom event listener for regionClick
  google.visualization.events.addListener(chart, 'regionClick', function(eventData) {
    selectedCountry = eventData.region;
    data.setValue(0, 0, selectedCountry);
    chart.draw(data, options);
    var form = document.createElement('form');
            form.method = 'post';
            form.action = 'dream-country.php'; // Replace with your PHP script URL

            // Create a hidden input for the country
            var countryInput = document.createElement('input');
            countryInput.type = 'hidden';
            countryInput.name = 'country';
            countryInput.value = selectedCountry; // Replace with the selected country value

            // Append the input to the form
            form.appendChild(countryInput);

            // Append the form to the body
            document.body.appendChild(form);

            // Submit the form
            form.submit();
  });
  chart.draw(data, options);
}
</script>
</html>