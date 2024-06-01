
<!DOCTYPE html>
<html lang="ru">
<?php include_once "$path/private/head.php"; ?>
<body>
<div class="slider_content_carousel" >
    <div class="owl-carousel owl-theme" id="slider_game_content">
        <div class="slide_item_carousel" style="background-image: url('../../img/image__games/ffc1723d6eb1ba93f808b08f8189a7e7.webp')">
		<!-- BALDURS GATE -->
		</div>
        <div class="slide_item_carousel" style="background-image: url('../../img/image__games/fc092bf0d97ef312fa79b10767deed68.webp')">
		<!-- SPIDER MAN 2 -->
		</div>
        <div class="slide_item_carousel" style="background-image: url('../../img/image__games/191078b4704ec3fef7628ea9ec5b3fa5.webp')">
		<!-- ATOMIC HEART -->
		</div>
    </div>
</div>
<?php include_once "$path/public/slider_show.php"; ?>
<div class="_container">
		<?php include_once "$path/private/header.php";?>
		<main class="startPage">
			<div class="main__column">
				<!-- ===========menu-bar============================== -->
				
					<?php include_once "$path/public/menuBar.php"?>
				
				<!-- =========main content==================================== -->
				<section class="content">
					<div class="head_content">
						<h1 class="title__content">Лучшее в 2023</h1>
						<h4 class="subtitle__content"></h4>
                    </div>
					<div class="content__block">
						<div class="content__items">
							
							</div>
						</div>
						<div class="pagination_bottom"></div>
				</section>
			</div>
		</main>
		<?php include_once "$path/private/footer.php"; ?>
	 </div>
</body>
<script type="module" src="../js/DataBest/best2023Data.js"></script>
</html>