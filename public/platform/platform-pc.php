<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "$path/private/head.php"; ?>

<body>
<div class="slider_content_carousel">
    <div class="owl-carousel owl-theme" id="slider_game_content">
        <div class="slide_item_carousel" style="background-image: url('../img/image__games/fc092bf0d97ef312fa79b10767deed68.webp')"></div>
        <div class="slide_item_carousel" style="background-image: url('../img/image__games/973fed5aad6a73beaf3223425824e333.webp')"></div>
        <div class="slide_item_carousel" style="background-image: url('../img/image__games/31ebc2ea5e2bc5da41a93fd07d595745.webp')"></div>
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
								<h2 class="title__content">На ПК</h2>
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
<script type="module" src="../../js/DataPlatform/PcData.js"></script>
</html>