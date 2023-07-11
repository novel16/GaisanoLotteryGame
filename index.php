<?php
error_reporting(0);
use function PHPSTORM_META\elementType;

    $today =date('Y-m-d');
    $current_day = date('l');
    $current_day = json_encode($current_day);

    // if(isset($_GET['day']))
    // {
    //     $day = $_GET['day'];
    //     $day = json_encode($day);
    // }


include('connect.php');
session_start();

if(!isset($_SESSION['user']))
{
    header('location: user_login.php');
}



        $sql = "SELECT c.id, c.invoice, c.fullname, s.status, e.num_of_entries ,e.total_entries from customer as c 
        INNER JOIN customer_status as s ON c.invoice = s.customer_invoice 
        INNER JOIN customer_entries AS e ON c.invoice = e.customer_invoice WHERE status = 'Pending' ORDER BY id ASC LIMIT 1 ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            $invoice = $row['invoice'];
            $fullname = $row['fullname'];
            $invoice = json_encode($invoice);

        if($row['status'] != 'Pending')
        {
            echo '<script>
            alert("Please enter customer data to play GCAP SLOTS!");
            window.location = "customer_input.php";
            </script>';
        }
        else{

            

        }



        //Grand Prize allocation day

        // $allocation_day_sql = "SELECT * FROM allocation WHERE status = '1'";
        // $allocation_day_stmt = $conn->prepare($allocation_day_sql);
        // $allocation_day_stmt->execute();

        // $allocation_day_row = $allocation_day_stmt->fetch(PDO::FETCH_ASSOC);

        // $grand_allocation_day = $allocation_day_row['day'];
        
        // $grand_allocation_day_json = json_encode($grand_allocation_day);


        //Grand Allocation Day
        $allocation_day_sql = "SELECT * FROM allocation";
        $allocation_day_stmt = $conn->prepare($allocation_day_sql);
        $allocation_day_stmt->execute();

        $grand_allocation_days = [];

        while ($allocation_day_row = $allocation_day_stmt->fetch(PDO::FETCH_ASSOC)) {
            $grand_allocation_days[] = $allocation_day_row['day'];
        }

       

        $grand_allocation_day_json = json_encode($grand_allocation_days);


        //2nd prize allocation day
        $second_allocation_day_sql = "SELECT * FROM second_prize_allocation";
        $second_allocation_day_stmt = $conn->prepare($second_allocation_day_sql);
        $second_allocation_day_stmt->execute();

        $second_allocation_days = [];

        while($second_allocation_day_row = $second_allocation_day_stmt->fetch(PDO::FETCH_ASSOC))
        {

            $second_allocation_days[] = $second_allocation_day_row['day'];

        }

        $second_allocation_days_json = json_encode($second_allocation_days);

      

        
        
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCAP Slots</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/gaisano.png" type="image/x-icon">

    <!-- bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="fontawesome/all.min.css">
    <script src="fontawesome/6fc1f0eac0.js"></script>

    <style>
        @media print{
            .noprint{
                
                visibility: hidden;
                
                
            }
            .customer-prizes.justprint{
                margin: 0;
                padding: 0;
                margin-top: -16rem;
                width: 302.4px;
                color: #ccc;
                background: none;
                font-size: 2rem;
            }
            .customer-prizes.justprint h5{
                font-size: 1.8rem;
            }
            .customer-prizes .print-display{
               display: block;
            }
        }
        .customer-prizes .print-display{
               display: none;
            }

       
    </style>
    
</head>
<body>
    <div class="noprint">
        <?php include('nav-bar.php'); ?>
    </div>
    
    
    
    <!-- entries -->
    <div class="entries noprint" id="entries">
        <h5>Total Entries</h5>
        <div class="entries-box">
            <input type="text" id="total_entry"  name="total_entry" readonly>
           
        </div>
    </div>

    <div class="next-player">
        <button type="button" id="nextPlayerBtn"  class="noprint btn btn-success text-light"><i class="fa-solid fa-forward"></i> Next Player</button>
    </div>
    

    <div class="container">

        <marquee id="marquee" class="noprint" direction="left" scrollamount="20">
        <h1 class="marquee-h1" style="text-transform: uppercase;"><?php echo $fullname; ?> <span id="marquee-message">- you are now ready to play ! </span></h1>
        </marquee>


        <h1 id="message" class="noprint">GCAP SLOTS</h1>

            <div class="customer-prizes justprint">
                <div class="print-display">
                    <h2>Gaisano Capital</h2>
                </div>
                
                <div class="container-box">
                    <h5 class="d-flex justify-content-start text-capitalize"><?php echo $fullname; ?></h5>
                    <div class="header-title">   
                        <span>Entries : <b><?php echo $row['num_of_entries'] ?></b></span>
                        <span>Invoice # : <b><?php echo $row['invoice']; ?></b></span>
                    </div>

                    <table class="table table-borderless" id="display-prizes">
                       
                    </table>
                    <button type="button"  onclick="window.print(); " class="noprint btn btn-primary d-flex justify-content-start mt-5">Print Receipt</button>
                </div>
            </div>

            <div class="lottery noprint">
               
                <form action="lottery_insert_data.php" id= "" name="save" method = "POST">
                    <div class="lottery-box">
                        
                        <div id="one" class="odometer"  name="one" >0</div>
                        <div id="two" class="odometer" name="two" >0</div>
                        <div id="three" class="odometer" name="three" >0</div>
                    </div>
                        
            </div>

            <div class="lottery-input noprint" id = "reload-input">
                    <h3>place your 3-digit number</h3>

                    <div class="lottery-box">
                                
                        <input type="text" autofocus name="input_one" id="input_one" maxlength="1">
                                
                        <input type="text" name="input_two" id="input_two" maxlength="1">
                                
                        <input type="text" name="input_three" id="input_three" maxlength="1">
                        <input type="button" value="Start" id="btnStart" class="btnStart" >
                        <input type="button" value="Reset" id="btnReset" class="btnReset" >
                        
                    </div>
                    
                </form>
            </div>
    </div>

   

   
    
    
        
    <script>
    document.getElementById("input_one").addEventListener("input", function (event) {
    if (!/^[0-9]+$/.test(event.target.value)) {
        event.target.value = event.target.value.slice(0, -1);
    }
    });
    document.getElementById("input_two").addEventListener("input", function (event) {
    if (!/^[0-9]+$/.test(event.target.value)) {
        event.target.value = event.target.value.slice(0, -1);
    }
    });
    document.getElementById("input_three").addEventListener("input", function (event) {
    if (!/^[0-9]+$/.test(event.target.value)) {
        event.target.value = event.target.value.slice(0, -1);
    }
    });

    // Get all the input fields
    const inputFields = document.querySelectorAll('.lottery-box input');

    // Add an event listener to each input field
        inputFields.forEach((input, index) => {
        input.addEventListener('input', () => {
            // If the current input field has a value, move the cursor to the next input field
            if (input.value) {
            if (index < inputFields.length - 1) {
                inputFields[index + 1].focus();
            }
            }
        });
        });

    </script>

    




<script>
  const randomone = document.getElementById('one');
  const randomtwo = document.getElementById('two');
  const randomthree = document.getElementById('three');
  const btn = document.getElementById('btnStart');
  const message = document.getElementById('message');
  const input_one = document.getElementById('input_one');
  const input_two = document.getElementById('input_two');
  const input_three = document.getElementById('input_three');
  const reloadInput = document.getElementById('reload-input');
  var totalEntry = document.getElementById('total_entry');
  var marqueeMessage =document.getElementById('marquee-message');
  var btnReset =document.getElementById('btnReset');
  
  let table = document.getElementById('mytable');
  var invoice_lottery = <?php echo $invoice; ?>;
  var currentDay = <?php echo $current_day; ?>;
  var grandAllocationDay = <?php echo $grand_allocation_day_json; ?>;
  var secondAllocationDay = <?php echo $second_allocation_days_json ?>;


//   alert(secondAllocationDay);
 
  btn.addEventListener('click', function() {
    if (input_one.value === "" || input_two.value === "" || input_three.value === "") {
      message.style = "color: red";
      message.innerHTML = "Place your number!";
    }
    else if(totalEntry.value == 0)
    {
       
        Swal.fire(
        'Not Enough Entries',
        '<span class = "text-danger">You have already used all the lottery entries.</span>',
        'info'
        )
        btn.disabled = true; 
        
    }
    else {
      let intervalId = setInterval(function() {
        numberone();
        numbertwo();
        numberthree();

       

        
      }, 50);
      setTimeout(function() {
       clearInterval(intervalId);
       
       let xhr = new XMLHttpRequest();
        xhr.open('POST', 'lottery_insert_data.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function() {
            if (randomone.innerHTML === input_one.value && randomtwo.innerHTML === input_two.value && randomthree.innerHTML === input_three.value) {
            
                    message.style = "color: #fff";
                    message.innerHTML = "YOU WIN THE GRAND PRIZE !";
                    
                    randomone.style = "background: #5c276b; color:#fff;";
                    randomtwo.style = "background: #5c276b; color:#fff;";
                    randomthree.style = "background: #5c276b; color:#fff;";
                 
            } 
            else if (randomone.innerHTML === input_one.value && randomtwo.innerHTML === input_two.value) {
                message.style = "color: #fff";
                message.innerHTML = "YOU WIN THE 2nd PRIZE !";

                randomone.style = "background: #5c276b; color:#fff;";
                randomtwo.style = "background: #5c276b; color:#fff;";
            }
             else if (randomone.innerHTML === input_one.value && randomthree.innerHTML === input_three.value) {
                message.style = "color: #fff";
                message.innerHTML = "YOU WIN THE 2nd PRIZE !";

                randomone.style = "background: #5c276b; color:#fff;";
                randomthree.style = "background: #5c276b; color:#fff;";
            }
             else if (randomtwo.innerHTML === input_two.value && randomthree.innerHTML === input_three.value) {
                message.style = "color: #fff";
                message.innerHTML = "YOU WIN THE 2nd PRIZE !";

                randomtwo.style = "background: #5c276b; color:#fff;";
                randomthree.style = "background: #5c276b; color:#fff;";
            } 
             else if (randomone.innerHTML === input_one.value || randomtwo.innerHTML === input_two.value || randomthree.innerHTML === input_three.value) {
                message.style = "color: #fff";
                message.innerHTML = "YOU WIN THE 3rd PRIZE !";

                if(randomone.innerHTML === input_one.value)
                {
                    randomone.style = "background: #5c276b; color:#fff;";
                }
                if(randomtwo.innerHTML === input_two.value)
                {
                    randomtwo.style = "background: #5c276b; color:#fff;";
                }
                if(randomthree.innerHTML === input_three.value)
                {
                    randomthree.style = "background: #5c276b; color:#fff;";
                }

                
            } 
             else {
                message.innerHTML = "THANK YOU! BETTER LUCK NEXT TIME!";
                message.style = "color: #fff; font-size: 2.5rem; font-weight: 500;";
            }

        };
    
    
        
        function generateNewNumbers() {
            randomone.innerHTML = (Math.floor(Math.random() * 10));
            randomtwo.innerHTML = (Math.floor(Math.random() * 10));
            randomthree.innerHTML = (Math.floor(Math.random() * 10));

        }

        function sendRequest() {
            let params = "invoice=" + encodeURIComponent(invoice_lottery) + "&one=" + encodeURIComponent(randomone.innerHTML) + "&two=" + encodeURIComponent(randomtwo.innerHTML) + "&three=" + encodeURIComponent(randomthree.innerHTML) + "&input_one=" + encodeURIComponent(input_one.value) + "&input_two=" + encodeURIComponent(input_two.value) + "&input_three=" + encodeURIComponent(input_three.value);
            xhr.send(params);
        }

        // randomone.innerHTML = 1;
        // randomtwo.innerHTML = 2;
        // randomthree.innerHTML = 3;

        if (randomone.innerHTML === input_one.value && randomtwo.innerHTML === input_two.value && randomthree.innerHTML === input_three.value) {
    
            if (!grandAllocationDay.includes(currentDay)) {

                generateNewNumbers();

            }
        }

        else if (randomone.innerHTML === input_one.value && randomtwo.innerHTML === input_two.value){

            if (!secondAllocationDay.includes(currentDay)) {

                generateNewNumbers();

            }
        }
        else if (randomone.innerHTML === input_one.value && randomthree.innerHTML === input_three.value){

            if (!secondAllocationDay.includes(currentDay)) {

                generateNewNumbers();

            }

        }

        else if (randomtwo.innerHTML === input_two.value && randomthree.innerHTML === input_three.value){

            if (!secondAllocationDay.includes(currentDay)) {

                generateNewNumbers();

            }

        }
        
        sendRequest(); 
    
      }, 4000);
    }
  });

 

    function numberone() {

        randomone.innerHTML = (Math.floor(Math.random() * 10)); 
        
    }
    function numbertwo() {

        randomtwo.innerHTML = (Math.floor(Math.random() * 10));
       
    }

    function numberthree() {

        randomthree.innerHTML = (Math.floor(Math.random() * 10));
        
        message.style = "color:#fff";
        message.innerHTML = "Please wait for the result..";
        btn.disabled = true; 
        randomone.style = "reset";
        randomtwo.style = "reset";
        randomthree.style = "reset";    
    }


  btnReset.addEventListener('click', function(){


    input_one.value = "";
    input_two.value = "";
    input_three.value ="";
    btn.disabled = false;
    input_one.focus();
    

    window.addEventListener('DOMContentLoaded', function() {
    // Set autofocus on input_one
    input_one.focus();
  });


  });

  
document.addEventListener('keydown', function(event) {
  // Check if the space bar key is pressed (keyCode 32)
  if (event.key === " " || event.key === "Spacebar") {
    event.preventDefault(); // Prevent the default space bar behavior

    input_one.value = "";
    input_two.value = "";
    input_three.value = "";
    btn.disabled = false;
    
    // Set autofocus on input_one
    input_one.focus();
    
  }
});



</script>


<script src="js/jquery/jquery-3.6.3.js"></script>

<script type="text/javascript">

    //check for total entries left
    $(document).ready(function(){

        var invoice = <?php echo $invoice; ?>;

      //  alert(invoice);

        setInterval(function() {
        // make AJAX request to server to check for updates
        $.ajax({
            url: 'entries.php',
            type: 'POST',
            data: { invoice: invoice },
            dataType: 'json',
            success: function(response) {
            
                $("#total_entry").val(response);

            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error checking for updates: ' + textStatus + ', ' + errorThrown);
            }
        });
        }, 50);

    });


    
   

</script>
<script>

     $(document).ready(function(){

        var invoice = <?php echo $invoice; ?>;

      //  alert(invoice);

        setInterval(function() {
        // make AJAX request to server to check for updates
        $.ajax({
            url: 'customer_prizes.php',
            type: 'POST',
            data: { invoice: invoice },
            // dataType: 'json',
            success: function(response) {
            
                $("#display-prizes").html(response);

            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log('Error checking for updates: ' + textStatus + ', ' + errorThrown);
            }
        });
        }, 50);

    });

</script>

<!-- next player function -->
<script>

    var btnNext = document.querySelector('#nextPlayerBtn');
    var total_entry =document.querySelector('#total_entry');

    btnNext.onclick = function(){

        if(totalEntry.value > 0)
        {
            Swal.fire(
            'Incomplete Entries',
            '<span class = "text-danger">Please make sure that all entries are used!</span>',
            'info'
            );
        }
        else{
            window.location.reload();
        }

    }

</script>

</body>
</html>






