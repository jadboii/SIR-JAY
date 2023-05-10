<!DOCTYPE html>
<html>
<head>
    <title>BARANGAY 48</title>
    <link rel ="stylesheet" type = "text/css" href="style.css">
    <style>
        img.logo{
            display: block;
            margin-top: -110px;
            margin-bottom: 20px;
            margin-left: 150px;
            height: 150px;
            width: 150px;
        }
    </style>


</head>
<body>
    <form action ="index.php" method="post"> 
    <img class="logo" src="logo.png" alt="BRGY 48 Logo">
        <h2></h2>
        <?php if(isset($_GET['error'])){ ?>
            <p class ="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Username</label>
        <input type = "text" name="uname" placeholder="Enter Username">
        
        <label>Password</label>
        <input type = "password" name="password" placeholder="Enter Password">

        <button type ="submit">LOG-IN</button>

    </form>
</body>
</html>