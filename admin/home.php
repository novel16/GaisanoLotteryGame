<?php
include('../connect.php');
    $today =date('Y-m-d');
    $year = date('Y');

    if(isset($_GET['year']))
    {
        $year = $_GET['year'];
    }

    //to calculate the overall total of customer
    $customer_sql = "SELECT * FROM customer";
    $customer_stmt = $conn->prepare($customer_sql);
    $customer_stmt->execute();
    $customer_count = $customer_stmt->rowCount();

    //to calculate the overall total of lottery played
    $lottery_sql = "SELECT * FROM lottery";
    $lottery_stmt = $conn->prepare($lottery_sql);
    $lottery_stmt->execute();
    $lottery_count = $lottery_stmt->rowCount();

    //to calculate the overall total of consolation-1
    $consolation_1_sql = "SELECT * FROM lottery WHERE prize = 'Consolation-1'";
    $consolation_1_stmt = $conn->prepare($consolation_1_sql);
    $consolation_1_stmt->execute();
    $consolation_1_count = $consolation_1_stmt->rowCount();

    //to calculate the overall total of consolation-2
    $consolation_2_sql = "SELECT * FROM lottery WHERE prize = 'Consolation-2'";
    $consolation_2_stmt = $conn->prepare($consolation_2_sql);
    $consolation_2_stmt->execute();
    $consolation_2_count = $consolation_2_stmt->rowCount();

    //to calculate the overall total of grand price
    $consolation_3_sql = "SELECT * FROM lottery WHERE prize = 'Grand Prize'";
    $consolation_3_stmt = $conn->prepare($consolation_3_sql);
    $consolation_3_stmt->execute();
    $consolation_3_count = $consolation_3_stmt->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Game | Website</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>
<body>
    
    <?php include('includes/sidebar.php'); ?>


    <!-- main -->
    <section id="interface">
       
    <?php include('includes/navbar.php'); ?>

        <h3 class="i-name">
            Dashboard
        </h3>  


        <div class="dashboard">
            <div class="box-container">
                <div class="box box1">
                    <div class="dash-text">
                        <h3><?php echo $customer_count;?></h3>
                        <span>Total customer</span>
                    </div>
                    <i class="dash-logo fa-solid fa-users"></i>
                    <a href="customer.php?customer=customer">More Info<i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="box box2">
                    <div class="dash-text">
                        <h3><?php echo $lottery_count; ?></h3>
                        <span>Lottery Played</span>
                    </div>
                    <i class="dash-logo fa-solid fa-check-to-slot"></i>
                    <a href="lottery_result.php?lottery_result=lottery_result">More Info<i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="box box3">
                    <div class="dash-text">
                        <h3><?php echo $consolation_1_count; ?></h3>
                        <span>Consolation-1</span>
                    </div>
                    <i class="dash-logo fa-solid fa-award"></i>
                    <a href="lottery_result.php?consolation-1=consolation-1">More Info<i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="box box4">
                    <div class="dash-text">
                        <h3><?php echo $consolation_2_count; ?></h3>
                        <span>Consolation-2</span>
                    </div>
                    <i class="dash-logo fa-solid fa-award"></i>
                    <a href="lottery_result.php?consolation-2=consolation-2">More Info<i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <div class="box box5">
                    <div class="dash-text">
                        <h3><?php echo $consolation_3_count; ?></h3>
                        <span>Grand Prize</span>
                    </div>
                    <i class="dash-logo fa-solid fa-trophy"></i>
                    <a href="lottery_result.php?grand prize=grand prize">More Info<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

       

       <div class="chart-box">
            <div class="chart-header">
                <h4>Monthly Lottery Result</h4>

                <div class="year">
                    <span>Select year:</span>
                    <select name="year" class="" id="select_year">
                        <?php
                            for($i = 2023; $i <=2099; $i++){
                                $selected = ($i==$year)?'selected':'';
                                echo "
                                    <option value='".$i."' ".$selected.">".$i."</option>
                                ";
                            }
                        ?>
                        
                    </select>
                </div>
            </div>

            <div class = "chart-info">
                <canvas id="myChart"></canvas>
            </div> 
       </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>


    <?php
        $and = 'AND YEAR(date) = '.$year;
        $months = array();
        $lottery = array();
        $consolation_1 = array();
        $consolation_2 = array();
        $grand_prize = array();


        for( $m = 1; $m <= 12; $m++ ) {
            $sql = "SELECT * FROM lottery WHERE MONTH(date) = '$m' AND YEAR(date) = '$year'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            array_push($lottery, $stmt->rowCount());

            //consolation-1
            $sql = "SELECT * FROM lottery WHERE MONTH(date) = '$m' AND YEAR(date) = '$year' AND prize ='Consolation-1'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            array_push($consolation_1, $stmt->rowCount());

            //consolation-2
            $sql = "SELECT * FROM lottery WHERE MONTH(date) = '$m' AND YEAR(date) = '$year' AND prize ='Consolation-2'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            array_push($consolation_2, $stmt->rowCount());

            //Grand Prize
            $sql = "SELECT * FROM lottery WHERE MONTH(date) = '$m' AND YEAR(date) = '$year' AND prize ='Grand Prize'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            array_push($grand_prize, $stmt->rowCount());
        
            $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
            $month =  date('M', mktime(0, 0, 0, $m, 1));
            array_push($months, $month);
          }


          $months = json_encode($months);
          $lottery = json_encode($lottery);
          $consolation_1 = json_encode($consolation_1);
          $consolation_2 = json_encode($consolation_2);
          $grand_prize = json_encode($grand_prize);
         

    ?>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo $months; ?>,
      datasets: [
      {
        label: 'Total Lottery Played',
        data: <?php echo $lottery; ?>,
        borderWidth: 1
      },
      {
        label: 'Consolation-1',
        data: <?php echo $consolation_1; ?>,
        borderWidth: 1
      },
      {
        label: 'Consolation-2',
        data: <?php echo $consolation_2; ?>,
        borderWidth: 1
      },
      {
        label: 'Grand Prize',
        data: <?php echo $grand_prize; ?>,
        borderWidth: 1
      }
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
 
</body>
</html>