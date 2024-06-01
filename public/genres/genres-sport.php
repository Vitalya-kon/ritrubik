<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<?php include_once "$path/private/head.php"; ?>

<body>
	<div class="slider_content_carousel" >
		<div class="owl-carousel owl-theme" id="slider_game_content">
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/75f763355eb06202535503d1f3a6e87b.webp')">
			<!-- FC 24 -->
			</div>
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/fifa 22.webp')">
			<!-- FIFA 22 -->
			</div>
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/67f85b352abfc7a139c7a77a5223b54b.webp')">
			<!-- FOOTBAL MANAGER 24 -->
			</div>
		</div>
	</div>
	<div class="_container">
		<?php include_once "$path/private/header.php"; ?>
		<main class="startPage">
			<div class="main__column">
				<!-- ===========menu-bar============================== -->

				<?php include_once "$path/public/menuBar.php" ?>

				<!-- =========main content==================================== -->
				<div class="content">
					<div class="theiaStickySidebar">
						<div class="action main__content">
							<div class="head_content">
								<h1 class="title__content">Спорт</h1>
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

			</div>
		</main>
		<?php include_once "$path/private/footer.php"; ?>
	</div>
</body>
<script type="module" src="../../js/DataGenres/sportData.js"></script>
</html>