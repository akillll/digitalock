<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="login.css">

</head>

<body>
<nav class="top-nav">
            <div class="container-fluid">
                <div class="navbar-header">
                    <p>Digi locker</p>
                </div>
                <ul class="navbar-side">
        
                    <li id="hi">
                        <a href="new_sign_up.php">Sign up</a>
                    </li>
                </ul>
            </div>

        </nav>
        <div class="content">
        <h1>HI USER</h1>
        <h2>welcome to the locker</h2>
    </div>

     <form action="login.php" method="post" class="Login_form">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <input type="text" name="uname" placeholder="User Name" class="input-box">

        <input type="password" name="password" placeholder="Password" class="main-input-box"> 

        <button type="submit" class="Login-btn">Login</button>

     </form>

</body>

</html>