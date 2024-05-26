<?php
require_once 'logincheck.php';

// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=carehub', 'root', '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $plant_name = $_POST['plant_name'];
    $soil_type = $_POST['soil_type'];
    $temperature = $_POST['temperature'];
    $watering_timing = $_POST['watering_timing'];
    $pestiside_info = $_POST['pestiside_info'];
    $fertilizer_info = $_POST['fertilizer_info'];

    // Insert data into the plantinfo table
    $stmt = $pdo->prepare("INSERT INTO plantinfo (id,plant_name, Soil_Type, Temperature, watering_timing, pestiside_info, fertilizer_info) VALUES (?,?, ?, ?, ?, ?, ?)");
    $stmt->execute(['',$plant_name, $soil_type, $temperature, $watering_timing, $pestiside_info, $fertilizer_info]);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>HOME SERVICES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
  <link rel="shortcut icon" href="../uploads/cicon.png" />   
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style3.css">  
  <link href="../font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Federo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="../css/style6.css">
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <style>
    .form-style-1 {
      margin:10px auto;
      max-width: 400px;
      padding: 20px 12px 10px 20px;
      font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    }
    .form-style-1 li {
      padding: 0;
      display: block;
      list-style: none;
      margin: 10px 0 0 0;
    }
    .form-style-1 label {
      margin:0 0 3px 0;
      padding:0px;
      display:block;
      font-weight: bold;
    }
    .form-style-1 input[type=text], 
    .form-style-1 textarea, 
    select {
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      border:1px solid #BEBEBE;
      padding: 7px;
      margin:0px;
      -webkit-transition: all 0.30s ease-in-out;
      -moz-transition: all 0.30s ease-in-out;
      -ms-transition: all 0.30s ease-in-out;
      -o-transition: all 0.30s ease-in-out;
      outline: none;	
    }
    .form-style-1 input[type=text]:focus, 
    .form-style-1 textarea:focus, 
    select:focus {
      -moz-box-shadow: 0 0 8px #88D5E9;
      -webkit-box-shadow: 0 0 8px #88D5E9;
      box-shadow: 0 0 8px #88D5E9;
      border: 1px solid #88D5E9;
    }
    .form-style-1 .field-divided {
      width: 49%;
    }
    .form-style-1 .field-long {
      width: 100%;
    }
    .form-style-1 .field-select {
      width: 100%;
    }
    .form-style-1 .field-textarea {
      height: 100px;
    }
    .form-style-1 input[type=submit] {
      background: #4B99AD;
      padding: 8px 15px 8px 15px;
      border: none;
      color: #fff;
    }
    .form-style-1 input[type=submit]:hover {
      background: #4691A4;
      box-shadow:none;
      -moz-box-shadow:none;
      -webkit-box-shadow:none;
    }
    .form-style-1 .required {
      color:red;
    }
  </style>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="ts-main-content">
    <?php include('includes/leftbar.php'); ?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3>Enter plant info:</h3>
          </div>
          <form method="post">
            <ul class="form-style-1">
              <li>
                <label>Plant Info <span class="required">*</span></label>
                <input type="text" name="plant_name" class="field-divided" placeholder="Plant-name" required /> 
                <input type="text" name="soil_type" class="field-divided" placeholder="Soil Type" required />
              </li>
              <li>
                <label>Temperature <span class="required">*</span></label>
                <input type="text" name="temperature" class="field-long" required />
              </li>
              <li>
                <label>Watering Timing <span class="required">*</span></label>
                <textarea name="watering_timing" class="field-long field-textarea" required></textarea>
              </li>
              <li>
                <label>Pesticide Info <span class="required">*</span></label>
                <textarea name="pestiside_info" class="field-long field-textarea" required></textarea>
              </li>
              <li>
                <label>Fertilizer Info <span class="required">*</span></label>
                <textarea name="fertilizer_info" class="field-long field-textarea" required></textarea>
              </li>
              <li>
                <input type="submit" value="Submit" />
              </li>
            </ul>
          </form>
        </div>
      </div>

      <!-- Displaying the data -->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3>Plant Info Table:</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table id="table" class="display" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Plant Name</th>
                  <th>Soil Type</th>
                  <th>Temperature</th>
                  <th>Watering Timing</th>
                  <th>Pesticide Info</th>
                  <th>Fertilizer Info</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM plantinfo");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr>
                          <td>".htmlspecialchars($row['id'])."</td>
                          <td>".htmlspecialchars($row['plant_name'])."</td>
                          <td>".htmlspecialchars($row['Soil_Type'])."</td>
                          <td>".htmlspecialchars($row['Temperature'])."</td>
                          <td>".htmlspecialchars($row['watering_timing'])."</td>
                          <td>".htmlspecialchars($row['pestiside_info'])."</td>
                          <td>".htmlspecialchars($row['fertilizer_info'])."</td>
                        </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#table').DataTable();
    });
  </script>
</body>
</html>
