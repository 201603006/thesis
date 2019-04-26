<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>ERSBS | My Events</title>
  </head>
  <body>
    <!--NAVBAR-->
    <div id="navigation">
      <?php
        include("navbarstudent.php");
      ?>
    </div>

    <div class="container text-left eventsHeading">
      <h4> <strong>My Events</strong> </h4>
    </div>

    <div class="container pt-1" id="myEvents">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active events-tab" id="nav-home-tab" data-toggle="tab" href="#nav-created" role="tab" aria-controls="nav-home" aria-selected="true">List of Created Events</a>

      <a class="nav-item nav-link events-tab" id="nav-profile-tab" data-toggle="tab" href="#nav-joined" role="tab" aria-controls="nav-profile" aria-selected="false">List of Joined Events</a>
    </div>
    </nav>

    <div class="tab-content " id="nav-tabContent">
      <div class="tab-pane fade show active ml-4 mr-4" id="nav-created" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="row" id="eventsTable">
        <div class="col-12">
            <table class="table display" id="">
              <thead class="text-white">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name of the Event</th>
                  <th scope="col">Date Created</th>
                  <th scope="col">Last Updated</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>

              <!--Connect to DB -->
              <?php
              $host = "localhost";
              $dbUsername = "root";
              $dbPassword = "";
              $dbname = "ersbs";

              // Create connection
              $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              //Fetch from DB
              $query = mysqli_query($conn, "SELECT * FROM event ORDER BY eventID");

              $count = 1;
              while ($result = mysqli_fetch_array($query)) {
                echo "<tr>
                        <td>$count</td>
                        <td>".$result['eventName']."</td>
                        <td>".$result['created']."</td>
                        <td>".$result['startTime']."</td>
                        <td>".$result['endTime']."</td>
                        <td><button type='button' class='btn btn-danger btn-sm'>Delete</button></td>
                      </tr>"; //delete button on the last <td>
                      $count++;
              }

            ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
      <div class="tab-pane fade ml-4 mr-4" id="nav-joined" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="row" id="eventsTable">
          <div class="col-12">
            <table class="table display" id="">
              <thead class="text-white">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name of the Event</th>
                  <th scope="col">Last Updated</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                  <!-- Fetch from DB -->
                  <?php $query = mysqli_query($conn, "SELECT * FROM event ORDER BY eventID");

                  $count = 1;
                  while ($result = mysqli_fetch_array($query)) {
                    echo "<tr>
                            <td>$count</td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>"; //delete button on the last <td>
                          $count++;
                  }
                    ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <!--  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    } );
  </script> -->

    <script>

    $(document).ready(function() {
        $('table.display').DataTable();
    } );

    </script>

  </body>
</html>
