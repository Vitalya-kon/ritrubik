<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once "$path/system/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
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
		<?php include_once "$path/private/header.php";?>
		<main class="startPage">
			<div class="main__column">
				<!-- ===========menu-bar============================== -->
				
					<?php include_once "$path/public/menuBar.php"?>
				
				<!-- =========main content==================================== -->
				<div class="content">
					<div class="theiaStickySidebar">
						<div class="favorite main__content">
							<div class="head_content">
								<h2 class="title__content">Избранное</h2>
								<h4 class="subtitle__content"></h4>
							</div>
							<div class="content__block">
								<div class="content__items" id="contentFav">		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<?php include_once "$path/private/footer.php"; ?>
	 </div>
</body>

<script>
	 fetch('/system/showFav.php',{
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
        })
        // выполняется ответ с json
        .then(response => response.json())
        // ответ для выполнения кода
        .then(data => {
            console.log(data);
            for(let row of data){
                // вывод карточки  
                contentFav.innerHTML +=`
										<div class="content__item favGame" data-content="">
											<!-- ссылка на cardGame с productid равное id из бд -->
											<a href="/cardGame?productid=${row.id}"  class="linkCard" data-idproduct=${row.id}>
												<div class="image__item">
													<img src="../img/image__games/${row.link_img}" alt="${row.alt}">
												</div>
												<div class="name__item">${row.name}</div>
											</a>
											<div class="info infoFav" data-info="" >
												<div class="info__item release-content">
													<span class="key">Дата выхода:</span>
													<span class="value">${row.releaseGame}</span>
												</div>
												<div class="info__item genres-content">
													<span class="key">Жанры:</span>
													<span class="value">${row.genres}</span>
												</div>
												<div class="info__item platform-content">
													<span class="key">Платформа:</span>
													<span class="value">${row.platform}</span>
												</div>
											</div>
										</div>
				`
				displayInfo();
				getSliiderGames();
            }      

        })
		function getSliiderGames(){
			const slider = $("#slider_game_content").owlCarousel({
				autoplayTimeout: 5000,
				items: 1,
				animateOut: 'fadeOut',
				animateIn: 'fadeIn',
				startPosition: Math.floor(Math.random() * $('#slider_game_content .slide_item_carousel').length),
				slideTransition: 'linear',
				autoplay: true,
				loop: true,
				dots: false
			});
		}
</script>
<script >
			
</script>
<script type="text/javascript" src="../js/sidbar.js"></script>

</html>