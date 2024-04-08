<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/style.css">
</head>
<body>
	<style>
		header a{
			color: #000;
		}

		.dropdown-list{
			background-color: #fff;
		}
	
		.header-div {
			display: flex;
			justify-content: space-between;
			align-items: center;
			width: 100%;
			display: inline-flex;
			align-items: center;
			color: #000;
		}
		.main-nav {
			display: flex;
			justify-content: flex-end;
			margin-right: 20px; /*Bảo thêm*/
		}
		.prev_next_page{
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.prev_next_page a{
			margin: 10px;
		}
	</style>
	<header style="background-color: #fff; color: #000;">
		<div class="header-div">
			<div class="logo-holder">
			<a href="<?=ROOT?>"><img class="logo" src="<?=ROOT?>/assets/images/logo.png"></a>
			</div>
			<div class="main-nav">
				<div class="nav-item"><a href="<?=ROOT?>/admin">Dashboard</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/users">Users</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/songs">Songs</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/categories">Categories</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/artists">Artists</a></div>
				<div class="nav-item dropdown">
					<a href="#">Hi, <?=user('username')?></a>
					<div class="dropdown-list">
						<div class="nav-item"><a href="<?=ROOT?>/profile">Profile</a></div>
						<div class="nav-item"><a href="<?=ROOT?>">Website</a></div>
						<div class="nav-item"><a href="<?=ROOT?>/logout">Logout</a></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php if(message()):?>
		<div class="alert"><?=message('',true)?></div>
	<?php endif;?>