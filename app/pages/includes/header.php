<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= ucfirst($URL[0]) ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/style.css">
	<style>
		.header-div {
			display: flex;
			justify-content: space-evenly;
			align-items: center;
			width: 100%;
		}

		.logo-holder,
		.main-title {
			display: inline-flex;
			align-items: center;
		}

		.main-nav {
			display: flex;
			justify-content: flex-end;
			margin-right: 20px; /*Bảo thêm*/
		}

		.dropdown-list {
			z-index: 999;
		}



		/*Bảo Thêm*/
		.search-container {
			display: flex;
			overflow: hidden;
		}
		.form-group {
			width: 600px;
			margin-left: 200px;
		}
		.search-form-control {
			flex: 1; /* Mở rộng input để chiếm hết không gian còn lại trong container */
			padding: 10px; /* Thêm padding để tạo khoảng trống xung quanh input */
			border: 1px solid purple;
			border-radius: 20px 0 0 20px;
		}
		.search-btn {
			padding: 10px 20px;
			background-color: #800080;
			color: #ffffff;
			border: none;
			border-radius: 0 20px 20px 0;
		}
	</style>
</head>

<body>

	<header>
		<div class="header-div">
			<div class="logo-holder">
				<a href="<?= ROOT ?>"><img class="logo" src="<?= ROOT ?>/assets/images/logo.png"></a>
			</div>

			<!-- Bảo Sửa -->
			<div class="footer-div">
				<div class="search-container">
					<form action="<?= ROOT ?>/search">
						<div class="form-group">
							<input class="search-form-control" type="text" placeholder="Search for music" name="find">
							<button class="search-btn">Search</button>
						</div>
					</form>
				</div>
			</div> 


			<div class="main-nav">
				<div class="nav-item"><a href="<?= ROOT ?>">Home</a></div>
				<div class="nav-item"><a href="<?= ROOT ?>/music">Music</a></div>
				<div class="nav-item dropdown">
					<a href="#">Category</a>
					<div class="dropdown-list">
						<?php
						$query = "select * from categories order by category asc";
						$categories = db_query($query);
						?>
						<?php if (!empty($categories)) : ?>
							<?php foreach ($categories as $cat) : ?>
								<div class="nav-item2"><a href="<?= ROOT ?>/category/<?= $cat['category'] ?>"><?= $cat['category'] ?></a></div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="nav-item"><a href="<?= ROOT ?>/artists">Artists</a></div>
				<?php if (!logged_in()) : ?>
					<div class="nav-item"><a href="<?= ROOT ?>/login">Login</a></div>
				<?php endif; ?>
				<?php if (logged_in()) : ?>
					<div class="nav-item dropdown">
						<a href="#">Hi, <?= user('username') ?></a>
						<div class="dropdown-list">
							<div class="nav-item"><a href="<?= ROOT ?>/admin/users/edit/<?= user('id') ?>">Profile</a></div>
							<div class="nav-item"><a href="<?= ROOT ?>/admin">Admin</a></div>
							<div class="nav-item"><a href="<?= ROOT ?>/logout">Logout</a></div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</header>
	</header>