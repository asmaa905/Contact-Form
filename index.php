<?php
   // check if user coming from A Request
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        #assign variables

        $user  = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $cell  = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        #  Creating Array of Errors

        $formErrors = array();
        if( strlen($user) <= 3 ) {
            $formErrors[] = 'usrname must be larger than 3 characters';
        }
        if( strlen($description) < 10 ) {
            $formErrors[] = "Message Can't Be Less Than<strong>10</strong> Characters";
        }
        // IF No Errors Send Email [ mail(To, Subject, Message, Headers, Parameters) ]
        $headers = 'From: '.$email . '\r\n';
        $myEmail = 'aa4080@fayoum.edu.eg';
        $subject = 'Contact Form';
        if( empty($formErrors)) {
            mail($myEmail, $subject, $headers);
            $user = '';
            $cell = '';
            $email = '';

            $success = '<div class="alert alert-success">We Have Recieved Your Message</div>';
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Elzero Web Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/all.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/fontawesome.min.css'>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>

</head>
<body>
    <!-- <button class="btn btn-primary">Click</button>
    <i class="fa fa-search fa-3x"></i> -->
    <!-- Start Form -->
    <div class="container">
        <h1 class="text-center">Contact Me</h1>
        <!-- index.php?username=''&email=''&cellphone=''  => it appear when  use get request -->
        <!-- index.php  => in post request it not show any thing-->

        <form 
            class="contact-form" 
            action="<?php echo $_SERVER['PHP_SELF'] ?>"
            method="POST"
        >
            <?php if(!empty($formErrors)) { ?>
            <div class="alert alert-danger alert-dismissible" role="start">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
                </button>
                <?php
                foreach($formErrors as $error) {
                    echo $error . '<br>';
                }  
                ?>
                </div> 
            <?php } ?>
            <?php if (isset($success)) { echo $success; } ?>

            <div class="form-group">
                <input
                    class="form-control username"
                    type="text"
                    name="username"
                    placeholder="Type Your Username"
                    value="<?php if(isset($user)) { echo htmlspecialchars($user); } ?>" 
                />
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    Username Must Be Larger Than <strong>3</strong> characters
                </div>

            </div>

            <div class="form-group">
                <input class="form-control email" type="email" name="email" placeholder="Please Type a Valid Email"
                value="<?php if(isset($email)) { echo htmlspecialchars($email); } ?>" 
                />
                <i class="fa fa-envelope fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    Email Can't Be <strong>Empty</strong>
                </div>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="cellphone" placeholder="Type Your Cell Phone"
                value="<?php if(isset($cell)) { echo htmlspecialchars($cell); } ?>" 
                />
                <i class="fa fa-phone fa-fw"></i>

            </div>

            <div class="form-group">
                <textarea class="form-control descripton" type="text" name="description"  placeholder="😍 Your Message!"><?php if(isset($description)) { echo htmlspecialchars($description); } ?></textarea>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    Message Can't Be Less Than <strong>10</strong> Characters
                </div>
            </div>
            <input class="btn btn-success " type="submit" value="Send Message" />
            <i class="fa-solid fa-paper-plane fa-fw send-icon"></i>
        </form>
    </div>
    <!-- End Form -->

    <script src='js/jquery-3.7.1.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/main.js'></script>
</body>
</html>