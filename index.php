<?php
session_start();

if(!isset($_SESSION['user']))
{
    header('location: user_login.php');
}

if(isset($_SESSION['invoice']))
{
    $invoice = $_SESSION['invoice'];
}
else{
    echo '<script>
           alert("Please enter customer data to play lottery game!");
           window.location = "customer_input.php";
       </script>';
       exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Game</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/gaisano.png" type="image/x-icon">
    
</head>
<body>

    <?php include('nav-bar.php'); ?>
    
    <marquee direction="left" scrollamount="15">
    <h1 class="marquee-h1"><?php echo $invoice; ?> is now ready to play Lottery Game! </h1>
    </marquee>

  


    <div class="container">
    <h1 id="message" class="animate__bounceInDown">Lottery Game</h1>
        <div class="lottery">
            <div class="image">
                <img class="slot" src="images/slot.png" alt="">
                <img class="baston" src="images/baston1.png" alt="">
            </div>
            
            <form action="lottery_insert_data.php" id= "" name="save" method = "POST">
                        <div class="lottery-box">
                            
                            <div id="one" class="odometer"  name="one" >0</div>
                            <div id="two" class="odometer" name="two" >0</div>
                            <div id="three" class="odometer" name="three" >0</div>
                        </div>
                    
                </div>

                <div class="lottery-input" id = "reload-input">
                    <h3>place your 3-digit number</h3>

                        <div class="lottery-box">
                            
                            <input type="text" autofocus name="input_one" id="input_one" maxlength="1">
                            
                            <input type="text" name="input_two" id="input_two" maxlength="1">
                            
                            <input type="text" name="input_three" id="input_three" maxlength="1">
                            <input type="button" value="Start" id="btnStart" class="btnStart" >
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

    <!-- <script>
        const randomone = document.getElementById('one');
        const randomtwo = document.getElementById('two');
        const randomthree = document.getElementById('three');
        const btn = document.getElementById('btnStart');
        const message = document.getElementById('message');
        const input_one = document.getElementById('input_one');
        const input_two = document.getElementById('input_two');
        const input_three = document.getElementById('input_three');
    
        
        btn.addEventListener('click', function(){
            if(input_one.value === "" || input_two.value === "" || input_three.value === "") {
                //btn.disabled = true;
                message.style = "color: red";
                message.innerHTML = "Place your number!";
            } else {

                let intervalId = setInterval(function(){
                    numberone();
                    numbertwo();
                    numberthree();
                    
                }, 100);
                setTimeout(function(){
                    
                    clearInterval(intervalId);
                    randomone.style.animationIterationCount = "1";
                    if(randomone.value === input_one.value && randomtwo.value === input_two.value && randomthree.value === input_three.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN A GRAND PRIZE!!!"; 
                    }
                   
                    else if(randomone.value === input_one.value && randomtwo.value === input_two.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN A CONSOLATION PRIZE-2!"; 
                    }
                    else if(randomone.value === input_one.value && randomthree.value === input_three.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN A CONSOLATION PRIZE-2!"; 
                    }
                    else if(randomtwo.value === input_two.value && randomthree.value === input_three.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN A CONSOLATION PRIZE-2!"; 
                    }
                    else if(randomone.value == input_one.value || randomtwo.value == input_two.value || randomthree.value == input_three.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN A CONSOLATION PRIZE-1!";
                        
                    }
                    

                     else {
                        
                        message.innerHTML = "YOU LOSE!";
                        message.style = "color: red";  
                    }
                    document.getElementById("form_submit").submit();
                   
                },5000);
            }
        });
    
        function numberone(){
            randomone.value = (Math.floor(Math.random() *9));
            
        }
        function numbertwo(){
            randomtwo.value = (Math.floor(Math.random() *9));
        }
        function numberthree(){
            randomthree.value = (Math.floor(Math.random() *9));
            //message.style = "font-size: 3.5rem";
            message.style = "color: blue";
            message.innerHTML = "Wait for the result..";
            //btn.disabled = true;
            
        }
    </script> -->





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
  
  let table = document.getElementById('mytable');


  
    
  btn.addEventListener('click', function() {
    if (input_one.value === "" || input_two.value === "" || input_three.value === "") {
      message.style = "color: red";
      message.innerHTML = "Place your number!";
    } else {
      let intervalId = setInterval(function() {
        numberone();
        numbertwo();
        numberthree();

         // Update odometer values

        
      }, 100);
      setTimeout(function() {
       clearInterval(intervalId);

       let xhr = new XMLHttpRequest();
        xhr.open('POST', 'lottery_insert_data.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
        //   if (xhr.status === 200 && xhr.responseText) {
        //     let response = JSON.parse(xhr.responseText);
            if(randomone.innerHTML === input_one.value && randomtwo.innerHTML === input_two.value && randomthree.innerHTML === input_three.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN"; 
                        Swal.fire({
                        title: '<span style="font-size: 4rem;">YOU WIN A GRAND PRIZE!</span>',
                        width: 450,
                        allowOutsideClick: false,
                        padding: '8em',
                        color: 'green',
                        background: '#fff url(images/winner-win.gif) center no-repeat',
                        backdrop: `
                            rgba(0,0,0,0.6)
                            url("images/congrats.gif")
                            
                            cover
                            no-repeat`
                        }).then((result) => {
                            input_one.value = "";
                            input_two.value = "";
                            input_three.value = "";
                            input_none.autofocus()
                        });
                    }
                   
                    else if(randomone.innerHTML === input_one.value && randomtwo.innerHTML === input_two.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN"; 
                        Swal.fire({
                        title: '<span style="font-size: 4rem;">YOU WIN A CONSOLATION PRIZE-2!</span>',
                        width: 450,
                        allowOutsideClick: false,
                        padding: '8em',
                        color: 'green',
                        background: '#fff url(images/winner-win.gif) center no-repeat',
                        backdrop: `
                            rgba(0,0,0,0.6)
                            url("images/congrats.gif")
                            
                            cover
                            no-repeat`
                        }).then((result) => {
                            input_one.value = "";
                            input_two.value = "";
                            input_three.value = "";
                            input_none.autofocus()
                        });
                    }
                    else if(randomone.innerHTML === input_one.value && randomthree.innerHTML === input_three.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN"; 
                        Swal.fire({
                        title: '<span style="font-size: 4rem;">YOU WIN A CONSOLATION PRIZE-2!</span>',
                        width: 450,
                        allowOutsideClick: false,
                        padding: '8em',
                        color: 'green',
                        background: '#fff url(images/winner-win.gif) center no-repeat',
                        backdrop: `
                            rgba(0,0,0,0.6)
                            url("images/congrats.gif")
                            
                            cover
                            no-repeat`
                        }).then((result) => {
                            input_one.value = "";
                            input_two.value = "";
                            input_three.value = "";
                            input_none.autofocus()
                        });
                    }
                    else if(randomtwo.innerHTML === input_two.value && randomthree.innerHTML === input_three.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN"; 
                        Swal.fire({
                        title: '<span style="font-size: 4rem;">YOU WIN A CONSOLATION PRIZE-2!</span>',
                        width: 450,
                        allowOutsideClick: false,
                        padding: '8em',
                        color: 'green',
                        background: '#fff url(images/winner-win.gif) center no-repeat',
                        backdrop: `
                            rgba(0,0,0,0.6)
                            url("images/congrats.gif")
                            
                            cover
                            no-repeat`
                        }).then((result) => {
                            input_one.value = "";
                            input_two.value = "";
                            input_three.value = "";
                            input_none.autofocus()
                        });
                    }
                    else if(randomone.innerHTML == input_one.value || randomtwo.innerHTML == input_two.value || randomthree.innerHTML == input_three.value) {
                        message.style = "color: green";
                        message.innerHTML = "YOU WIN!";
                        Swal.fire({
                        title: '<span style="font-size: 4rem;">YOU WIN A CONSOLATION PRIZE-1!</span>',
                        width: 450,
                        allowOutsideClick: false,
                        padding: '8em',
                        color: 'green',
                        background: '#fff url(images/winner-win.gif) center no-repeat',
                        backdrop: `
                            rgba(0,0,0,0.6)
                            url("images/congrats.gif")
                            
                            cover
                            no-repeat`
                        }).then((result) => {
                            input_one.value = "";
                            input_two.value = "";
                            input_three.value = "";
                            input_none.autofocus()
                        });
                        
                        
                    }
                    

                     else {
                        
                        message.innerHTML = "YOU LOSE!";
                        message.style = "color: red";  
                    }    
                   
        };
        let params = "one=" + encodeURIComponent(randomone.innerHTML) + "&two=" + encodeURIComponent(randomtwo.innerHTML) + "&three=" + encodeURIComponent(randomthree.innerHTML) + "&input_one=" + encodeURIComponent(input_one.value) + "&input_two=" + encodeURIComponent(input_two.value) + "&input_three=" + encodeURIComponent(input_three.value);
        xhr.send(params);  
      }, 3000); 
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
    
    message.style = "color: blue";
    message.innerHTML = "Wait for the result..";
    
  }
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/odometer.min.js"></script> -->
</body>
</html>

