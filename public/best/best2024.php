<?php
$path=$_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="ru">
<?php include_once "$path/private/head.php"; ?>
<body>
<div class="slider_content_carousel" >
    <div class="owl-carousel owl-theme" id="slider_game_content">
        <div class="slide_item_carousel" style="background-image: url('https://ritrubic.ru/img/image__games/f5dadf275202dbaabeeed1de1fea6d66.webp')">
		<!-- PACIFIC DRIVE -->
		</div>
        <div class="slide_item_carousel" style="background-image: url('../../img/image__games/34cad302f8b685d6debfcdbc33a54d75.webp')">
		<!-- PRINCE OF PERSIA -->
		</div>
        <div class="slide_item_carousel" style="background-image: url('https://ritrubic.ru/img/image__games/f9c4cf96264c2904e4072141eea5309b.webp')">
		<!-- ALONE IN THE DARK -->
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
                        <h1 class="title__content">Лучшее в 2024</h1>
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
<script type="module" src="../js/DataBest/best2024Data.js"></script>
</html>