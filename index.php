<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Find Community Service Near you!</title>

     <!-- CSS -->
    <link href="CSS/style.css" type="text/css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Nav bar -->
    <div class = "title">
      <h1>Community Service Finder</h1>
    </div>
    <div class="navbar_i">
      <a href="index.php">Home</a>
      <a href="CreateService.php">Create a Service
      <a href="#signup">Sign Up</a>
    </div>
  </head>

  <body>
    <div class="card" id = "info_container">
      <div class="card-body" id = "carder">
        <?php
          $con = mysqli_connect("localhost", "root", "", "cs_app");
          $query = "SELECT * FROM service_form";
          $query_run = mysqli_query($con, $query);
        ?>

          <?php if(mysqli_num_rows($query_run) > 0) { ?>
            <?php foreach($query_run as $row) { ?>
              <h1 style ="text-align: center;"><?php echo $row['org_name']; ?></h1><br>
              <h3 style ="text-align: center;"><?php echo $row['org_title']; ?></h3><br>
              <h4>Contact Info: </h4>
              <b><p>Phone Number: </b> <?php echo $row['org_pNum']; ?></p>
              <b><p>Location: </b><?php echo $row['org_location']; ?></p>
              <b><p>Email: </b><?php echo $row['org_email']; ?></p>
              <h4>Description: </h4>
              <p><?php echo $row['org_message']; ?></p>
              <b><p>Maximum of Volunteers: </b><?php echo $row['quantity']; ?></p>
              <h4>Dates and Time </h4>
              <b><p>Date: </b><?php echo $row['date']; ?></p>
              <b><p>Starting Time: </b><?php echo $row['start_time']; ?></p>
              <b><p>Ending Time: </b><?php echo $row['end_time']; ?></p>
              <button>Volunteer</button>
            <?php } ?>
          <?php } ?>
      </div>
    </div>
  </body>
</html>