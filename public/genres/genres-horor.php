<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "$path/private/head.php"; ?>

<body>
	<div class="slider_content_carousel" >
		<div class="owl-carousel owl-theme" id="slider_game_content">
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/95b6fec0d756fcb8c708ebcdfef01272.webp')">
				<!-- Little NIGHTMARES 2 -->
			</div>
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/973fed5aad6a73beaf3223425824e333.webp')">
				<!-- ALAN WAKE 2 -->
			</div>
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/2466b5d9c61ca9b02c2c0b8912a7ef4b.webp')">
				<!-- SONS FOREST -->
			</div>
		</div>
	</div>
	<?php include_once "$path/public/slider_show.php"; ?>
	<div class="_container">
		<?php include_once "$path/private/header.php"; ?>
		<main class="startPage">
			<div class="main__column">
				<!-- ===========menu-bar============================== -->

				<?php include_once "$path/public/menuBar.php" ?>

				<!-- =========main content==================================== -->
				<div class="content">
					
						<div class="action main__content">
							
							<div class="head_content">
							<h1 class="title__content">
								Хоррор
							</h1>
								<h4 class="subtitle__content"></h4>
							</div>
							<div class="content__block">
								<div class="content__items" id="contentAction">		
								</div>
							</div>
							<div class="pagination_bottom"></div>
						</div>
					
				</div>

			</div>
		</main>
		<?php include_once "$path/private/footer.php"; ?>
	</div>
</body>
<script type="module"  src="../../js/DataGenres/hororData.js" type="module"></script>
</html>