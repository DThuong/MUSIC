<?php 
// Kiểm tra form nếu được submit
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $errors = [];

    // truy cập vào từng field trong input
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // xác thực thông tin người dùng
	    if(empty($username))
			{
				$errors['username'] = "a username is required";
			}else
			if(!preg_match("/^[a-zA-Z]+$/", $_POST['username'])){
				$errors['username'] = "a username can only have letters with no spaces";
			}

		if(empty($email))
			{
				$errors['email'] = "a email is required";
			}else
			if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
				$errors['email'] = "email not valid";
			}

		if(empty($password))
			{
				$errors['password'] = "a password is required";
			}else
			if(strlen($_POST['password']) < 8)
			{
				$errors['password'] = "password must be 8 characters or more";
			}
        if(empty($confirm_password)){
            $errors['confirm-password'] = "Please retype your password.";
        }else if($confirm_password !== $_POST['password']){
            $errors['confirm-password'] = "Passwords do not match.";
        }

    // Kiểm tra nếu email đã được đăng ký hay chưa
    $query = "SELECT * FROM users WHERE email = :email";
    $params = [':email' => $email];
    $existing_user = db_query_one($query, $params);

    if($existing_user) {
        $errors[] = "Email is already registered.";
    }

    if(empty($errors))
			{

				$values = [];
				$values['username'] = trim($_POST['username']);
				$values['email'] 	= trim($_POST['email']);
				$values['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$values['confirm-password'] = password_hash($_POST['confirm-password'], PASSWORD_DEFAULT);

				$query = "insert into users (username,email,password) values (:username,:email,:password)";
				db_query($query,$values);

				message("user created successfully");
				redirect('login');
			}
}
?>

<?php require page('includes/header')?>

	<section class="content-login">
 
		<div class="login-holder">

			<form method="post" action="add">
				<center><img src="assets/images/logo.png" style="width: 150px;border-radius: 50%;border: solid thin #ccc;"></center>
				<h2>Register</h2>
                <input value="<?=set_value('username')?>" class="my-1 form-control" type="text" name="username" placeholder="Username">
				<input value="<?=set_value('email')?>" class="my-1 form-control" type="email" name="email" placeholder="Email">
				<input value="<?=set_value('password')?>" class="my-1 form-control" type="password" name="password" placeholder="Password">
                <input value="<?=set_value('confirm-password')?>" class="my-1 form-control" type="password" name="confirm-password" placeholder="Confirm Password">
                <p>Đã có tài khoản ?<a href="login">Đăng nhập</a></p>
				<!-- message -->
				<?php if(message()):?>
					<div class="alert"><?=message('',true)?></div>
				<?php endif;?>
				<button class="my-1 btn-login bg-blue">Register</button>
			</form>
		</div>
	</section>

<?php require page('includes/footer')?>