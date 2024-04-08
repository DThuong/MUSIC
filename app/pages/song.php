<?php require page('includes/header')?>
	<!-- Nội dung trang -->
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<center><h2 class="text-white">Playing</h2></center>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<section class="content">
					<?php 
						$slug = $URL[1] ?? null; /* Lấy giá trị URL thứ 2, nếu không có thì rỗng */
						$query = "select * from songs where slug = :slug limit 1"; /* Tạo câu truy vấn lấy thông tin bài hát từ CSDL */
						$row = db_query_one($query,['slug'=>$slug]); /* Thực thi câu truy vấn và lấy thông tin bài hát */
					?>
					<?php if(!empty($row)):?>
						<?php include page('song-full')?>
					<?php endif;?>
				</section>
			</div>
		</div>
	</div>

<?php require page('includes/footer')?>
