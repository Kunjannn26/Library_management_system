<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Library Management System </title>

</head>
<body>
    <style>

        
    </style>
<?php 
session_start();
if(isset($_SESSION['first'])){
	header('location: ./index.php');
}
// include('./template-part/header.php') ;

$connection = mysqli_connect('localhost', 'root', '', 'lms');
if($connection) {
    echo "";
}
else {
    die("Database Connection Failed");
}
$query1=mysqli_query($connection,"select id, img, text from captcha");
while($row=mysqli_fetch_array($query1)){
$images[$row['id']] = $row; 
}
	
$random_img = array_rand($images); 

?>
<link rel="stylesheet" href="css/forgotstyle.css" type="text/css" media="all">

<!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<!---form section start--->
<!---form area start--->
<body>
<section class="main-content">

<div class="login">
    <h2>Reset Password</h2>
    <form action="passwordreset.php" method="post">
    <input type="text" name="RollNo" id="RollNo" placeholder="Enter your roll no"
                        style="width: 100%" required />
     <input type="text" name="user-email" id="email_address" placeholder="Enter your e-mail"
                        style="width: 100%" required />
     <input type="password" name="password" id="password" placeholder="Enter your password"
                        style="width: 100%" required />
    <input name="cuser-password" type="password" placeholder="Confirm New password" id="cpassword" style="width: 100%"
                        required />
        
                        <?php 
            echo '<img src="data:image/jpeg;base64,'.base64_encode($images[$random_img][1]).'"/>'; 
            ?><br>
		    <input type="hidden" value="<?php echo $images[$random_img][2]; ?>" name="ccaptcha" >
            <input type="text" name="captcha" placeholder=" Enter Captcha" class="text"><br>
            <div class=" send-button">
                <input class="primary_btn" type="submit" value="Reset" />
            </div>
        </form>
    <br>
    
    <div class="clear"></div>
    </div>
</div>


<div class="clear"></div>

</div>
        </form>
    </div>
</section>
</body>
</html>
<!---form area end--->
<!---form section end--->
