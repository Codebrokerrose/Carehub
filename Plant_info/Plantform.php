<?php


// Rest of your PHP code
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="plantstyle.css">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="https://kit.fontawesome.com/f75e97ac39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section id="header">
        <!-- navigation -->
        <?php include 'C:\xampp\htdocs\carehub\home\nav.php'; ?>
    </section>
    <section id="page-header" class="about-header" style="background-image: url(tree.jpeg);">
        <h2>#let's_talk</h2>
        <p>We are here to hear you</p>
    </section>

    <section id="form-details">
        <form method="POST" action="">
            <div class="form-group row">
                <label for="inputPlantName" class="col-sm-2 col-form-label"><b>Plant Name</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Plant_Name" placeholder="Plant Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSoilType" class="col-sm-2 col-form-label"><b>Soil Type</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="Soil_Type" placeholder="Soil Type">
                </div>
            </div>
            <div class="form-group row">
                <label for="Temperature" class="col-sm-2 col-form-label"><b>Temperature</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="temperature" placeholder="Temperature">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <?php
        $plant_name = $soil_type = $temperature = "";
        $watering_timing = $pesticide_info = $fertilizer_info = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $plant_name = $_POST['Plant_Name'];
            $soil_type = $_POST['Soil_Type'];
            $temperature = $_POST['temperature'];

            // Create a connection to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "carehub";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch watering timings
            $sql = "SELECT watering_timing, pestiside_info, fertilizer_info FROM PlantInfo WHERE plant_name=? AND Soil_Type=? AND Temperature=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $plant_name, $soil_type, $temperature);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Fetch the data
                $row = $result->fetch_assoc();
                $watering_timing = $row['watering_timing'];
                $pesticide_info = $row['pestiside_info'];
                $fertilizer_info = $row['fertilizer_info'];
            } else {
                echo "<div class='alert alert-danger mt-3' role='alert' style='margin-left:30px'>
                            <p>No matching records found.</p>
                            <img src='/carehub/img/cards/recordnotfound.jpg' alt='No records found' style='width: 80%; height: 70%; margin-left:15px'>
                          </div>";
            }

            // Close the connection
            $stmt->close();
            $conn->close();
        }
        ?>
    </section>

    <?php if ($watering_timing || $pesticide_info || $fertilizer_info): ?>
        <section class="plantinforesult">
            <p class="plantinfohead center-text">YOUR RESULTS ARE HERE</p>
            <ul class="ch-grid">
                <li>
                    <div class="ch-item ch-img-4">
                        <div class="ch-info-wrap">
                            <div class="ch-info">
                                <div class="ch-info-front ch-img-1"></div>
                                <div class="ch-info-back">
                                    <h3>Water Schedule</h3>
                                    <p><?php echo $watering_timing; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ch-item ch-img-4">
                        <div class="ch-info-wrap">
                            <div class="ch-info">
                                <div class="ch-info-front ch-img-2"></div>
                                <div class="ch-info-back">
                                    <h3>Pesticide Info</h3>
                                    <p><?php echo $pesticide_info; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ch-item ch-img-4">
                        <div class="ch-info-wrap">
                            <div class="ch-info">
                                <div class="ch-info-front ch-img-3"></div>
                                <div class="ch-info-back">
                                    <h3>Fertilizer Info</h3>
                                    <p><?php echo $fertilizer_info; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    <?php endif; ?>
   <br>

    <?php include 'C:\xampp\htdocs\carehub\home\footer.php'; ?>
</body>
</html>
