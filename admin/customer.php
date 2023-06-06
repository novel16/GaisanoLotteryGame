<?php include('includes/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCAP Slots - Customer</title>
    <!-- <link rel="stylesheet" href="../css/datatable.css"> -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="icon" href="../images/gaisano.png" type="image/x-icon">

     <!-- fontawesome -->
    <link rel="stylesheet" href="../fontawesome/all.min.css" />
     <script src="../fontawesome/6fc1f0eac0.js"></script>

      <!-- datatable -->
      <link rel="stylesheet" href="../css/datatable.css">


    
</head>
<body>
    
    <?php include('includes/sidebar.php'); ?>


    <!-- main -->
    <section id="interface">
       
    <?php include('includes/navbar.php'); ?>

        <h3 class="i-name">
            Customer
            <div class="home-gauge">
                <span><i class="fa-solid fa-gauge"></i>Home</span>
                <span>></span>
                <span>Customer</span>
            </div>
        </h3>

      
        
        <div class="table-container" id="table-container">
            <!-- <form action="" method = "GET">
                <div class="date-picker">
                    <div class="date-box">
                        <input type="search" id="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"  placeholder = "Search">
                        <button type = "submit" name = "btn_search"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    </form>
                
                    <div class="date-box">
                    <form action="" method = "GET">
                        <input type="date" id="from" name="from" value="<?php echo isset($_GET['from']) ? $_GET['from'] : ''; ?>">
                    </div>
                    <span>-</span>
                    <div class="date-box">
                        <input type="date" id="to" name="to" value="<?php echo isset($_GET['to']) ? $_GET['to'] : ''; ?>">
                    </div>
                    <button class="btn-date" type= "submit" name = "submit" >Apply</button>
                </div>
            </form> -->
            
            <!-- <a href="#" class= "btn btn-success"><i class="fa-solid fa-circle-plus me-1"></i>New</a> -->
            
            <table class = "table table-borderless table-striped" id = "mydatatable">
                <thead>
                    <tr>
                        <th>ID No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>


    </section>


   

   

     
    <script src="../js/jquery/jquery-3.6.3.js"></script>
    <script src="../js/datatable.js"></script>

    <script>

        $(document).ready(function () {

            $('#mydatatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'fetch_customer_result.php',
               
            });
        });

    </script>
   
</body>
</html>