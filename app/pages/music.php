<?php require page('includes/header')?>

	<section class="content">
		
		<?php 
			$limit = 20; // Số lượng bản ghi tối đa hiển thị trên mỗi trang
			$offset = ($page - 1) * $limit; // Tính toán offset dựa trên trang hiện tại và giới hạn
			$rows = db_query("select * from songs order by views desc limit $limit offset $offset"); // Truy vấn dữ liệu từ cơ sở dữ liệu, sắp xếp theo số lần xem giảm dần và giới hạn số lượng bản ghi và vị trí bắt đầu
		?>

		<?php if(!empty($rows)):?> <!-- Kiểm tra xem có bản ghi nào được trả về không -->
			<?php foreach($rows as $row):?> <!-- Lặp qua từng bản ghi -->
				<?php include page('includes/song')?> <!-- Include template của từng bản ghi -->
			<?php endforeach;?> <!-- Kết thúc vòng lặp -->
		<?php endif;?> <!-- Kết thúc kiểm tra bản ghi không rỗng -->

	</section>

	<div class="pn-page">
		<?php if ($offset > 0): ?> <!-- Kiểm tra xem có cần hiển thị nút "Prev" hay không -->
			<a href="<?=ROOT?>/music?page=<?=$prev_page?>">
				<button class="btn bg-orange">Prev</button> <!-- Nút "Prev" -->
			</a>
		<?php endif; ?> <!-- Kết thúc kiểm tra nút "Prev" -->

		<?php if (count($rows) == $limit): ?> <!-- Kiểm tra xem có cần hiển thị nút "Next" hay không -->
			<a href="<?=ROOT?>/music?page=<?=$next_page?>">
				<button class="float-end btn bg-orange">Next</button> <!-- Nút "Next" -->
			</a>
		<?php endif; ?> <!-- Kết thúc kiểm tra nút "Next" -->
	</div>

<?php require page('includes/footer')?>
