<!DOCTYPE html>
<html>

<head>
    <title>Sign up Form</title>
    <link rel="stylesheet" href="acc_id.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<?php 

session_start(); 

include "dbconnect.php";

if (isset($_POST['accid']) && isset($_POST['accpass'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $accid = validate($_POST['accid']);

    $accpass = validate($_POST['accpass']);

    if (empty($accid)) {

        header("Location: home.php?error=User id is required");

        exit();

    }else if(empty($accpass)){

        header("Location: home.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM acc WHERE accid='$accid' AND accpass='$accpass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['accid'] === $accid && $row['accpass'] === $accpass) {

                echo "Logged in!";

                $_SESSION['accid'] = $row['accid'];

                $_SESSION['accpass'] = $row['accpass'];

                header("Location: b.html");

                exit();

            }else{

                header("Location: home.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: home.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: home.php");

    exit();

}
?>            

<body>

    <section class="bg">
    <?php if (isset($_GET['error'])) { ?>

    <p class="error"><?php echo $_GET['error']; ?></p>

    <?php } ?>
        <form action="home.php" method="post"> 
        <div class="Login_form">
            <h1 style="margin-top: 10%;"> Create account</h1>

            <input type="text" class="main-input-box" placeholder="Enter the Account Id" name="accid">
            <!--<div class=" get-here ">
                <p>Get Account ID</p>
            </div>
            <button class="btn ">Generate</button>-->
            <input type="password " class="input-box " placeholder="create Password " name="accpass">

            <button type="button " class="Login-btn ">Create </button>
            <!-- <hr>
                <p>Do you have an account ? <a href="# "> log in</a></p>
            <script src="acc_id.js "></script>-->
        </div>
        </form>
    </section>
</body>