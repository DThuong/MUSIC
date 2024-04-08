<?php 
	// Cập nhật số lần xem trong bảng songs, cột views, cho bản ghi có id trùng khớp với $row['id'].
	db_query("update songs set views = views + 1 where id = :id limit 1",['id'=>$row['id']]);
?>
<!-- CSS để định dạng các phần tử trong card -->
<style>
	.music-card-full {
			background-color: rgb(red, green, blue); /* định dạng màu nền */
			padding: 2em; /* đặt khoảng cách bên trong */
			border-radius: 1em; /* đặt đường viền cong tròn */
			box-shadow: 0 0 2em #000; /* tạo hiệu ứng ánh sáng */
			color: #000; /* định dạng màu chữ */
			width: 500%;/*Bảo thêm*/
			margin-bottom: 30px;
			background-color:  lightgrey;
		}

	.music-card-full img {
			width: 100%; /* đặt chiều rộng đầy đủ */
			border-radius: 1em; /* đặt đường viền cong tròn */
			margin-bottom: 1em; /* đặt khoảng cách dưới đều kiện */
			margin-top: 1em;
			object-fit: cover;
		}
	.card-title{
		font-size: 3rem;
	}
	.music-card-full audio {
			width: 100%; /* đặt chiều rộng đầy đủ */
	}
	.music-card-full h2 {
		margin-top: 5px;
	}
	.card-views, .card-date{
		margin: 10px 0;
	}
	.card-download button{
		border-radius: 1rem;
	}
	.card-download button:hover{
		opacity: .6;
	}
	.card-img{
		height: 20rem;
		width: 50%;
		overflow: hidden;
		border-radius: 1em;
		margin: auto;
	}
</style>
<!-- Bắt đầu card music -->
<div class="music-card-full" style="max-width: 800px;">
	<!-- Tiêu đề bài hát -->
	<h2 class="card-title"><?=esc($row['title'])?></h2>
	<!-- Tên ca sĩ -->
	<div class="card-subtitle">by: <?=esc(get_artist($row['artist_id']))?></div>
	<!-- Ảnh bài hát -->
	<div class="card-img">
    <a href="<?=ROOT?>/song/<?=$row['slug']?>">
        <img src="<?=ROOT?>/<?=$row['image']?>" width="100" height="300"><!-- Bảo chỉnh img scale -->
    </a>
</div>
	<!-- Nội dung âm nhạc -->
<div class="card-content">
    <audio controls style="width: 100%">
        <source src="<?=ROOT?>/<?=htmlspecialchars($row['file'], ENT_QUOTES, 'UTF-8')?>" type="audio/mpeg">
    </audio>
</div>
	<!-- Số lần xem -->
	<div class="card-views">Views: <?=htmlspecialchars($row['views'], ENT_QUOTES, 'UTF-8')?></div>
	<!-- Ngày đăng -->
	<div class="card-date">Date added: <?=htmlspecialchars(get_date($row['date']), ENT_QUOTES, 'UTF-8')?></div>
	<!-- nút tải xuống -->
	<?php
		// Kiểm tra xem người dùng đã đăng nhập hay chưa bằng cách kiểm tra sự tồn tại của biến phiên $_SESSION
		if(is_user() || is_admin()) {
			// Hiển thị nút tải xuống chỉ khi người dùng đã đăng nhập
		?>
			<a href="<?=ROOT?>/download/<?=htmlspecialchars($row['slug'], ENT_QUOTES, 'UTF-8')?>" class="card-download">
				<button class="btn bg-purple">Download</button>
			</a>
		<?php
		} else {
		// Ngược lại, nếu người dùng chưa đăng nhập, yêu cầu đăng nhập
		echo "<p>Please login to download this song.</p>";
		}
?>

</div>
<!-- Kết thúc card music -->
<!--end music card-->
