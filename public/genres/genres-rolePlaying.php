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
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/1dc109e6fc9503ae8d369de3be69820f.webp')">
			<!-- ASASIN CREED VALHALA -->
			</div>
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/d506c064896372cbad28cc132cb5a129.webp')">
			<!-- CYBERPUNK -->
			</div>
			<div class="slide_item_carousel" style="background-image: url('../../img/image__games/6456da1955d01bab0b3349d21949ce5e.webp')">
			<!-- ВЕДЬМАК 3 -->
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
								<h1 class="title__content">Ролевые</h1>
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
<script type="module" src="../../js/DataGenres/rolePlayingData.js"></script>
</html>