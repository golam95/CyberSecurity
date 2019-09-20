
 <?php include("inc/head.php"); ?>
 <?php include("../classes/Admin.php");?>
 <?php 
 $db=new Database();
 $fm=new Format();
 ?>
 
 <?php
 
 $admin=new Adminlog();
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$email=$_POST['email'];
	$password=$_POST['password'];
    $logincheck=$admin->adminLogin($email,$password);
}

 ?>
 
<body>
<div class="signup-form">
<br/><br/><br/><br/><br/><br/>
    <form action="" method="POST">
		<h2>Admin LogIn Panel</h2>
		<p>Please Login!</p>
		<hr>
		
		 <div class="panel-heading" style="text-align: center; font-size: 17px;color:#990F02;">
                <?php 
                if (isset($logincheck)) {
                    echo($logincheck);
                }
                 ?>
            </div>
		

        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="email" class="form-control" name="email" placeholder="Enter valid Email" required="required">
			</div>
        </div>		
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="password" class="form-control" name="password" placeholder="Enter your password" required="required">
			</div>
        </div>
		
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">LogIn</button>
        </div>	
    </form>
	
</div>
</body>
</html>                            