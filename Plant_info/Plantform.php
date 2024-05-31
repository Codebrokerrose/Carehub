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
<style>
    a {
        text-decoration: none;
        color: black;
    }

    #form-details form {
        width: 100%;
        margin: 20px 20px 0 0;
    }

    #form-details {
        display: flex;
        justify-content: space-between;
        margin: 0px;
        padding: 80px;
        border: 1px solid #070606;
        background-image: url('/carehub/img/cards/back.jpeg');
        object-fit: cover;
    }

    .ch-grid {
        margin: 20px 0 0 0;
        padding: 0;
        list-style: none;
        display: block;
        text-align: center;
        width: 100%;
    }

    .ch-grid:after,
    .ch-item:before {
        content: '';
        display: table;
    }

    .ch-grid:after {
        clear: both;
    }

    .ch-grid li {
        width: 220px;
        height: 220px;
        display: inline-block;
        margin: 20px;
    }

    .ch-item {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        position: relative;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        cursor: default;
    }

    .ch-info-wrap,
    .ch-info {
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
    }

    .ch-info-wrap {
        top: 20px;
        left: 20px;
        background: #f9f9f9 url(../images/bg.jpg);
        box-shadow:
            0 0 0 20px rgba(255, 255, 255, 0.2),
            inset 0 0 3px rgba(115, 114, 23, 0.8);

    }

    .ch-info>div {
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-position: center center;
    }

    .ch-info .ch-info-front {
        transition: all 0.6s ease-in-out;
    }

    .ch-info .ch-info-back {
        opacity: 0;
        background: #223e87;
        pointer-events: none;
        transform: scale(1.5);
        transition: all 0.4s ease-in-out 0.2s;
    }

    .ch-img-1 {
        background-image: url('/carehub/img/cards/3.jpg');
    }

    .ch-img-2 {
        background-image: url('/carehub/img/cards/p1.jpg');
    }

    .ch-img-3 {
        background-image: url('/carehub/img/cards/f.jpg');
    }

    .ch-img-4 {
        background-image: url('/carehub/img/cards/green.jpg');
    }

    .ch-info h3 {
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 18px;
        margin: 0 15px;
        padding: 40px 0 0 0;
        height: 90px;
        font-family: 'Open Sans', Arial, sans-serif;
        text-shadow:
            0 0 1px #fff,
            0 1px 2px rgba(0, 0, 0, 0.3);
    }

    .ch-info p {
        color: #fff;
        padding: 10px 5px 0;
        font-style: italic;
        margin: 0 30px;
        font-size: 12px;
        border-top: 1px solid rgba(255, 255, 255, 0.5);
    }

    .ch-info p a {
        display: block;
        color: #e7615e;
        font-style: normal;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 9px;
        letter-spacing: 1px;
        padding-top: 4px;
        font-family: 'Open Sans', Arial, sans-serif;
    }

    .ch-info p a:hover {
        color: #fff;
    }

    .ch-item:hover .ch-info-front {
        transform: scale(0);
        opacity: 0;
    }

    .ch-item:hover .ch-info-back {
        transform: scale(1);
        opacity: 1;
        pointer-events: auto;
    }

    .plantinforesult {
        margin-bottom: -150px;
        padding-bottom: 0%;
    }

    .center-text {
        text-align: center;
        font-family: 'Arial', sans-serif;
        font-size: 24px;
        font-weight: bold;
        margin-top: 20px;
        color: #333;
    }

    .plantinforesult {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 70vh;
        margin: 0;
        padding: 0;
    }
</style>

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
        <!-- <div class="form-container"> -->
        <!-- <img src="/carehub/img/cards/1.jpg" alt=""> -->
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
        <!-- </div> -->
    </section>

    <?php if ($watering_timing || $pesticide_info || $fertilizer_info): ?>
        <section class="plantinforesult">
            <!-- <p class="plantinfohead">YOUR RESULTS ARE HERE</p> -->
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
    <!-- </section> -->

    <?php include 'C:\xampp\htdocs\carehub\home\footer.php'; ?>
</body>

</html>