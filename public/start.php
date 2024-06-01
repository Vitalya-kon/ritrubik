<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";?>

<!DOCTYPE html>
<html lang="ru">
<?php include_once "$path/private/head.php"; ?>
<body>
<div class="slider_content_carousel" >
    <div class="owl-carousel owl-theme" id="slider_game_content">
        <div class="slide_item_carousel" style="background-image: url('https://ritrubic.ru/img/image__games/ffc1723d6eb1ba93f808b08f8189a7e7.webp')">

		</div>
      
        <div class="slide_item_carousel" style="background-image: url('https://ritrubic.ru/img/image__games/0c6772563cd31f629f45c37a6bb60f47.webp')">
		<!-- PALWORLD -->
		</div>
        <div class="slide_item_carousel" style="background-image: url('https://ritrubic.ru/img/image__games/31ebc2ea5e2bc5da41a93fd07d595745.webp')">
		<!-- ASSAsin creed -->
		</div>
        <div class="slide_item_carousel" style="background-image: url('https://ritrubic.ru/img/image__games/f9c4cf96264c2904e4072141eea5309b.webp')">
		<!-- ALONE IN THE DARK -->
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
					<!-- <div class="theiaStickySidebar"> -->
                        <div class="head_content">
                            <h2 class="title__content">Новое и актуальное </h2>
                            <h4 class="subtitle__content">На основе количества игроков и даты релиза</h4>
							<!-- Изначально не активна ни одна опция -->
						<div class="itc-select" id="select-1" style="display: none;">
							<!-- Кнопка для открытия выпадающего списка -->
							<button type="button" class="itc-select__toggle" name="car" value="" data-select="toggle" data-index="-1">Выберите из списка</button>
							<!-- Выпадающий список -->
							<div class="itc-select__dropdown">
								<ul class="itc-select__options">
								<li class="itc-select__option" data-select="option" data-value="volkswagen" data-index="0">Volkswagen</li>
								<li class="itc-select__option" data-select="option" data-value="ford" data-index="1">Ford</li>
								<li class="itc-select__option" data-select="option" data-value="toyota" data-index="2">Toyota</li>
								<li class="itc-select__option" data-select="option" data-value="nissan" data-index="3">Nissan</li>
								</ul>
							</div>
						</div>
                        </div>

						<!-- <div class="pagination_top"></div> -->
						<div class="content__block">

							<div class="content__items" id="contentItems">
								
							</div>
							
						</div>
						<div class="pagination_bottom"></div>
						
					<!-- </div> -->
				</div>
			</div>
			
		</main>
		<?php include_once "$path/private/footer.php"; ?>
	</div>
</body>
<!-- <script src="../node_modules/requirejs/require.js" data-main="/js/startData.js"></script> -->

<scriptt type="text/javascript" src="../js/sidbar.js"></scriptt>
<script src="/js/startData.js"></script>
</html>