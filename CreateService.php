<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a service!</title>

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

    <!-- JAVA -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <?php 
      if(isset($_SESSION['status'])) {
        ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
         unset($_SESSION['status']);
        }
    ?>

    <div class="service_signup">
      <h2 style="font-size: 50px">CREATE A SERVICE!</h2>
    <div class="create_container">
      <form action="service_dbALT.php" method="POST">
        <div>
          <!-- Organization Name for form -->
          <input type="name" id="name" name="org_name"  placeholder="Organization Name" autocomplete="off" required>
        </div>
        <div>
          <!-- Title of event for form -->
          <input type="header" id="title" name="org_title"  placeholder="Title of Event" autocomplete="off" required>
        </div>
        <div>
        <!-- Location for form -->
          <input type="text" id="locationN" name="org_location"  placeholder="Place of Service (Location)" autocomplete="off" required>
        </div>
        <div>
          <!-- Phone number for form -->
          <input type="tel" id="pnumber" name="org_pNum"  placeholder="Contact Phone Number (Ex. 8083079000)"  autocomplete="off" maxlength = "10" required>
        </div>
        <div>
          <!-- Email for form -->
          <input type="email" id="email" name="org_email"  placeholder="Contact Email" autocomplete="off" required>
        </div>
        <div>
          <!-- Message for form -->
          <textarea id="message" name="org_message" placeholder="Description" rows="8" cols="33" autocomplete="off" required></textarea>
        </div>
        <div>
          <!-- Capacity of volunteers for Form-->
          <label>Maximum number of Volunteers:</label>
          <input type="number" id="quantity" name="quantity" min="1" max="100" maxlength = "3" required>
        </div>
        <div>
          <!-- Date for Form-->
          <label>Date of Event:</label>
          <input type="date" id="date" name = "org_date" required>
        </div>
        
        <div>
          <!-- Starting Time for Form-->
          <label>Starting Time of Event:</label>
          <input type="time" id="appt" name="start_time" required>
          <!-- Ending Time for Form-->
          <label>Ending Time of Event:</label>
          <input type="time" id="appt" name="end_time" required>
        </div>
        <!-- Submit Button -->
        <input type="submit" value="Submit" name = "submit">
      </form>
    </div>
    </div>
  </body>
</html>