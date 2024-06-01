<!DOCTYPE html>
<html lang="ru">
<?php include_once "$path/private/head.php"; ?>

<body>
<div class="slider_content_carousel" >
    <div class="owl-carousel owl-theme" id="slider_game_content">
        <div class="slide_item_carousel" style="background-image: url('../../img/image__games/6456da1955d01bab0b3349d21949ce5e.webp')">
		<!-- ВЕДЬМЯК 3 -->
		</div>
        <div class="slide_item_carousel" style="background-image: url('../../img/image__games/f1f2a849f0cdfe32196545b51b008b19.webp')">
		<!-- METRO EXODUS -->
		</div>
        <div class="slide_item_carousel" style="background-image: url('../../img/image__games/d506c064896372cbad28cc132cb5a129.webp')">
		<!-- CYBERPUNK -->
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
				<section class="content">
					<div class="head_content">
						<h1 class="title__content">Топ 250 игр</h1>
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
<script type="module" src="../js/DataBest/top250Data.js"></script>
</html>