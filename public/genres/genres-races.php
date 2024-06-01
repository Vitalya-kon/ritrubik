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
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/4315a10f768f11a9fd9132808a45a65f.webp')">
			<!-- FORZA MOTORSPORT -->
			</div>
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/a3611da1bd8fa7dceb81544d038676ee.webp')">
				<!-- GRAND TOURISMO 7 -->
			</div>
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/1e679e5e30dc7f151c5a122c85e7f13c.webp')">
				<!-- MFS UNBOUND -->
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
								<h1 class="title__content">Гонки</h1>
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
<script type="module" src="../../js/DataGenres/racesData.js"></script>
</html>