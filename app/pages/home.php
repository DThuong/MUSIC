<?php require page('includes/header') ?>

<style>
  .banner-group {
    position: relative;
    width: 100%;
    height: 70vh;
    overflow: hidden;
  }

  .banner-group .banner {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    max-height: 500px;
    object-fit: cover;
  }

  .banner-group .banner.show {
    opacity: 1;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const bannerGroup = document.querySelector('.banner-group');
    const banners = document.querySelectorAll('.banner-group .banner');

    let currentIndex = 0;

    function showBanner() {
      banners.forEach(banner => {
        banner.classList.remove('show');
      });

      banners[currentIndex].classList.add('show');

      currentIndex = (currentIndex + 1) % banners.length;

      setTimeout(showBanner, 5000);
    }

    showBanner();
  });
</script>

<div class="banner-group">
  <img class="banner" src="<?= ROOT ?>/assets/images/banner1.jpg">
  <img class="banner" src="<?= ROOT ?>/assets/images/banner2.jpg">
  <img class="banner" src="<?= ROOT ?>/assets/images/banner3.jpg">
  <img class="banner" src="<?= ROOT ?>/assets/images/banner4.jpg">
</div>
<marquee behavior="scroll" direction="left">Thầy ơi chấm nhóm em 10 điểm nhaaaaaaaaa</marquee>
<h2 class="Home-title">HOT MUSIC</h2>
<section class="content">

  <?php

  //$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
  $rows = db_query("select * from songs order by id desc limit 16");

  ?>

  <?php if (!empty($rows)) : ?>
    <?php foreach ($rows as $row) : ?>
      <?php include page('includes/song') ?>
    <?php endforeach; ?>
  <?php else : ?>
    <div class="m-2">No songs found</div>
  <?php endif; ?>

</section>

<?php require page('includes/footer') ?>