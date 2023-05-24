<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    // Redirect to the homepage or any other desired page
    header("Location: index.php");
    exit();
}

// Include the database connection file
include_once("config.php");

// Process the login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the query to fetch user details based on the provided email
    $query = "SELECT * FROM tbl_user WHERE email = '$email'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // Check if a user with the provided email exists
        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            // Verify the password
            // if (password_verify($password, $user['password'])) {
                if ($password == $user['password']) {
                // Set the session variables
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['id_user'] = $user['id_user'];

                // Redirect to the homepage or any other desired page
                if($user['role']==99){
                    header("Location: index.php");
                    exit();
                } else {
                    header("Location: home.php");
                    exit();
                }
            } else {
                $errorMessage = "Invalid email or password";
            }
        } else {
            $errorMessage = "Invalid email or password";
        }
    } else {
        $errorMessage = "Error occurred. Please try again later.";
    }
}
?>
<!--Trigger-->
<html>
<head>
    <title>Login</title>
    <style>
    body {
        background: url("src/style/imgs/RM SEDERHANA.jpg") no-repeat fixed center center;
        background-size: cover;
        font-family: Montserrat;
    }

    .logo {
        width: 213px;
        height: 36px;
        margin: 30px auto;
    }

    .login-block {
        width: 320px;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        border-top: 5px solid #ff656c;
        margin: 0 auto;
    }

    .login-block h1 {
        text-align: center;
        color: #000;
        font-size: 18px;
        text-transform: uppercase;
        margin-top: 0;
        margin-bottom: 20px;
    }

    .login-block input {
        width: 100%;
        height: 42px;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 14px;
        font-family: Montserrat;
        padding: 0 20px 0 50px;
        outline: none;
    }

    .login-block input#email {
        background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#email:focus {
        background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#password {
        background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
        background-size: 16px 80px;
    }

    .login-block input#password:focus {
        background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
        background-size: 16px 80px;
    }

    .login-block input:active, .login-block input:focus {
        border: 1px solid #ff656c;
    }

    .login-block button {
        width: 100%;
        height: 40px;
        background: #ff656c;
        box-sizing: border-box;
        border-radius: 5px;
        border: 1px solid #e15960;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
        font-family: Montserrat;
        outline: none;
        cursor: pointer;
    }

    .login-block button:hover {
        background: #ff7b81;
    }

</style>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="login-block">
        <h1>Login</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="email" value="" placeholder="Email" name="email" id="email" required />
            <input type="password" value="" placeholder="Password" name="password" id="password" required />
            <button type="submit">Submit</button>
        </form>
        <?php if (isset($errorMessage)): ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>