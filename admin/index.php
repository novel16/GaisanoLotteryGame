<?php
session_start();
if(isset($_SESSION['admin']))
{
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Game | Website</title>
    <!-- <link rel="stylesheet" href="admin.css"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
html{
    font-size: 62.2%;
}
body{
    
    background: #8a9e9e;
    height: 100vh;

}

.login-container{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    flex-direction: column;
}
.login-container .login-box{
    background: #fff;
    width: 35rem;
    padding: 2rem;
    border: 1px solid rgba(181, 179, 179, 0.5);
}
.login-container .login-box h3{
    font-size: 3.5rem;
    margin-bottom: 1rem;
    font-weight: 500;
}
.login-container .login-box .input-group{
    margin-bottom: 1.5rem;
}
.login-container .login-box .input-group span{
    font-size: 1.4rem;
    font-weight: 300;
}
.login-container .login-box .input-group input{
    width: 20rem;
    font-size: 1.4rem;
    font-weight: 300;
    padding: .3rem;
    border: 1px solid rgba(109, 107, 107, 0.5);
}
.login-container .login-box button{
    padding: .7rem 2.5rem;
    outline: none;
    border: none;
    font-size: 1.5rem;
    text-align: left;
    background: #3C84AB;
    font-weight: 300;
    text-align: left;
    color: #fff;
    cursor: pointer;

}
.login-container .login-box button:hover{
    background: #5eabd4;
    transition: all .3s ease-in;
}
.login-container p{
    font-size: 1.4rem;
    font-weight: 300;
    margin-top: 1rem;
    width: 35rem;
    padding: 1.3rem;
    background: #d73b52;
    color: #fff;
    
}
.login-container p:hover{
    background: #d7576a;
    cursor: text;
    transition: all .3s ease-in;
}
img{
    width: 25px;
    margin: 0 .5rem;
}
.copyright{
    position:absolute;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    border-top-right-radius: 1.5rem;
    border-top-left-radius: 1.5rem;
    background: #fff;
    width: 20rem;
    bottom:0;
    right:5rem;
    padding:.3rem;
    box-shadow: -.2rem -.2rem 1rem rgba(163, 160, 160, 0.5);
    opacity: .8;
}
.copyright span{
    font-size:1.3rem;
    font-weight:300;
}


@media(max-width: 550px){
    html{
        font-size: 45%;
    }
    body{
        max-height: 100vh;
    }
}
@media(max-width: 720px){
    html{
        font-size: 50%;
    }
    body{
        max-height: 100vh;
    }
}
@media(max-width: 991px){
    html{
        font-size: 55%;
    }
    body{
        max-height: 100vh;
    }
}

    </style>
</head>
<body>
    
    <div class="login-container">
        <div class="login-box">
            <h3>Admin Credentials</h3>
            <form action="login.php" method = "POST">
                <div class="input-group">
                    <span>Username:</span>
                    <input type="text" name = "username">
                </div>
                <div class="input-group">
                    <span>Password:</span>
                    <input type="password" name = "password">
                </div>
                
                <button type = "submit" name = "login">Login</button>
            </form>
            
        </div>
        <?php
            if(isset($_SESSION['error'])){
                ?>

                <p id = "error-message"><?php echo $_SESSION['error']; ?></p>

                <script>
                    setTimeout(function() {
                        var errorMessage = document.getElementById('error-message');
                        errorMessage.style.display = 'none';
                    }, 5000); // hide the error message after 5 seconds
                </script>

            <?php }
            unset($_SESSION['error']);
             ?>

        
    </div>


    <div class="copyright">
        <span>Powered by</span>
        <img src="../images/gaisano.png" alt="">
        <span>SOFTDEV</span>
    </div>
</body>
</html>