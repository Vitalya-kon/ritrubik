<!DOCTYPE html>
<html lang="ru">
<?php
include "$path/private/head.php";
include "$path/system/addReviews.php";

?>

<body>
    <div class="bg_cardGame">        
    </div>
    <div class="_container">
        <?php include "$path/private/header.php" ?>
        <main class="startPage">
            <div class="main__column">
                <!-- ===========menu-bar============================== -->

                <?php include_once "$path/public/menuBar.php" ?>

                <!-- =========main content==================================== -->
                <div class="content_cardGame">
                    <div class="theiaStickySidebar">
                        <div class="cardGame">
                            <div class="cardGame__left">
                                <div class="main__cardGame">

                                                            
                                </div>
                                <?php if (isset($_SESSION['login'])) { ?>
                                <div class="comment__cardGame" id="comment">
                                    <div class="reviews__cardGame">
                                        <h3 class="reviews__cardGame-title">Отзывы</h3>
                                        <form method = 'post' class='form__reviews' name="form__reviews">
                                            <div class="rating-area">
                                                <input type="radio" id="star-5" name="rating" value="5">
                                                <label for="star-5" title="Оценка «5»"></label>	
                                                <input type="radio" id="star-4" name="rating" value="4">
                                                <label for="star-4" title="Оценка «4»"></label>    
                                                <input type="radio" id="star-3" name="rating" value="3">
                                                <label for="star-3" title="Оценка «3»"></label>  
                                                <input type="radio" id="star-2" name="rating" value="2">
                                                <label for="star-2" title="Оценка «2»"></label>    
                                                <input type="radio" id="star-1" name="rating" value="1">
                                                <label for="star-1" title="Оценка «1»"></label>
                                            </div>
                                            <span class="ratingShow"></span>
                                            <textarea class="reviewsText" placeholder="Напиши отзыв" name='reviewsText'></textarea>
                                            <button  class='reviewsSend' name='reviewsSend'>Отправить</button>
                                        </form>
                                    </div>
                                    <div class="feedBack__cardGame"></div>
                                </div>
                                <?php } ?>
                            </div>                          
                            <div class="right__cardGame">
                                <div class="img__cardGame"></div>
                                <div class="slider__cardgame"></div>
                                <div class="similar__cardGame">
                                    <h3 class="similar__title">Похожие игры</h3>
                                    <div class="schowSimilar"></div>
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
   <script type="text/javascript" src="../js/sidbar.js"></script>
    <script>
        // ассинхронный запрос с sysCardGame.php методом POST с телом где productid = $_GET['productid'];
    async function getCardGame(){
        await fetch('/system/sysCardGame.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `productid=<?php echo $_GET['productid']; ?>`
        })
        // выполняется ответ с json
        .then(response => response.json())
        // ответ для выполнения кода
        .then(data => {
            console.log(data)
            // let cardGameMain = document.querySelector(".content");
            // переменная с обращением к классу main__cardGame
            let mainCardgame = document.querySelector(".main__cardGame");
            const slider = document.querySelector(".slider__cardgame")
            // переменная с обращением к классу img__cardGame
            let imgCardGame = document.querySelector(".img__cardGame");
            /// bacground cardgame
            let bg_card = document.querySelector(".bg_cardGame");
            // переменная с обращением к классу whereToBuy
            let buy = document.querySelector(".whereToBuy");
            // перебор ответа в переменную row
            for (let row of data) {
                let fav_span = null; 
                if (row.fav_amount == 1) {
                    fav_span = "В избранном"
                }else{
                    fav_span = "Добавить в избранное"
                }

                let platform = row.platform;
                // Разделение данных по запятой и сохранение их в массив
                let dataArrayPlatform = platform.split(", ");

                // Функция для изменения каждого значения
                dataArrayPlatform.forEach((value, index, array) => {
                    if (index === array.length - 1) {
                        array[index] = `<span class="platform_style_card_game">${value}</span>`;
                    } else {
                        array[index] = `<span class="platform_style_card_game">${value},</span>`;
                    }
                });

                // Объединение измененных значений массива в одну строку
                let platformList = dataArrayPlatform.join(" ");

                
                let genres = row.genres;
                let price = row.price;
                // Разделение данных по запятой и сохранение их в массив
                let dataArrayGenres= genres.split(", ");

                // Функция для изменения каждого значения
                dataArrayGenres.forEach((value, index, array) => {

                    if (index === array.length - 1) {
                        array[index] = `<span class="genres_style_card_game">${value}</span>`;
                    } else {
                        array[index] = `<span class="genres_style_card_game">${value},</span>`;
                    }
                });

                // Объединение измененных значений массива в одну строку
                let genresList = dataArrayGenres.join(" ");

                let id_ggsel_partner = row.id_ggsel_partner;
                let id_ggsel_agent = row.id_ggsel_agent;

                !(function (e) {
                    var l = function (l) {
                            return e.cookie.match(
                                new RegExp("(?:^|; )digiseller-" + l + "=([^;]*)")
                            );
                        },
                        i = l("lang"),
                        s = l("cart_uid"),
                        t = i ? "&lang=" + i[1] : "",
                        d = s ? "&cart_uid=" + s[1] : "",
                        r = e.getElementsByTagName("head")[0] || e.documentElement,
                        n = e.createElement("link"),
                        a = e.createElement("script");
                    (n.type = "text/css"),
                        (n.rel = "stylesheet"),
                        (n.id = "digiseller-css"),
                        (n.href = `//shop.digiseller.ru/xml/store2_css.asp?seller_id=${id_ggsel_partner}`),
                        (a.async = !0),
                        (a.id = "digiseller-js"),
                        (a.src =
                            `//www.digiseller.ru/store2/digiseller-api.js.asp?seller_id=${id_ggsel_partner}&lang=ru-RU` +
                            t +
                            d),
                    !e.getElementById(n.id) && r.appendChild(n),
                    !e.getElementById(a.id) && r.appendChild(a);
                })(document);

                
                
                // вывод карточки  
                mainCardgame.innerHTML = `  
                                        <div onload="saveFav(${row.id})" class='main__description-cardGame'  >    
                                            <h1 class="title__cardGame">${row.name}</h1>
                                            <div class='cardGame_cont_link_and_favorite'>
                                                <a href="#buy__cardGame"
                                                <button class="button_play">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                        <path fill="none" d="M12.75 6V3.75H11.25V6L9 6C6.10051 6 3.75 8.3505 3.75 11.25V17.909C3.75 19.2019 4.7981 20.25 6.09099 20.25C6.71186 20.25 7.3073 20.0034 7.74632 19.5643L10.8107 16.5H13.1893L16.2537 19.5643C16.6927 20.0034 17.2881 20.25 17.909 20.25C19.2019 20.25 20.25 19.2019 20.25 17.909V11.25C20.25 8.3505 17.8995 6 15 6L12.75 6ZM18.75 11.25C18.75 9.17893 17.0711 7.5 15 7.5L9 7.5C6.92893 7.5 5.25 9.17893 5.25 11.25V17.909C5.25 18.3735 5.62652 18.75 6.09099 18.75C6.31403 18.75 6.52794 18.6614 6.68566 18.5037L10.1893 15H13.8107L17.3143 18.5037C17.4721 18.6614 17.686 18.75 17.909 18.75C18.3735 18.75 18.75 18.3735 18.75 17.909V11.25ZM6.75 12.75V11.25H8.25V9.75H9.75V11.25H11.25V12.75H9.75V14.25H8.25V12.75H6.75ZM15 10.875C15 11.4963 14.4963 12 13.875 12C13.2537 12 12.75 11.4963 12.75 10.875C12.75 10.2537 13.2537 9.75 13.875 9.75C14.4963 9.75 15 10.2537 15 10.875ZM16.125 14.25C16.7463 14.25 17.25 13.7463 17.25 13.125C17.25 12.5037 16.7463 12 16.125 12C15.5037 12 15 12.5037 15 13.125C15 13.7463 15.5037 14.25 16.125 14.25Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </g>
                                                    </svg>
                                                    <span>ИГРАТЬ</span>
                                                </button>
                                                    
                                                </a>
                                                <?php if (isset($_SESSION['login'])) { ?>
                                                <div class = "favorite__cardGame" id="fav" data-favid="${row.id}" onclick = "addToFav(${row.id})" >
                                                        <img src="../img/icons/favorite.png" alt="favorite">
                                                        <span data-game-favid=${row.id} class="spanFavorite">${fav_span}</span>

                                                    </div> 
                                                <?php } ?>
                                            </div>
                                            <div class ="info__cardGame">
                                                <div class ="cardGame__info releaseGame__cardGame">
                                                    <span class ="info__definition">Дата релиза:</span>
                                                    <span class="info__value releaseGame_style">${row.releaseGame}</span>
                                                </div>
                                                <div class ="cardGame__info genres__CardGame">
                                                    <div class ="info__definition">Жанр:</div>
                                                    <div class="info__value">${genresList}</div>
                                                </div>
                                                <div class ="cardGame__info platform__cardGame">
                                                    <div class ="info__definition">Платформы:</div>
                                                    <div class="info__value">${platformList}</div>
                                                </div>
                                            </div>
                                            <article class="desc__cardGame">
                                                <div class ="desc__aboutGame">Описание</div>   
                                                <div class ="desc__info" >${row.description}</div>                                                   
                                            </article> 
                                            <button id="btn" class="desc__btnMore">Читать далее</button>
                                        </div>
                                        <div class='video__cardGame'>
                                            <h2 class='video__cardGame-title'>Видео обзор</h2>
                                                <div class='video__cardGame-link'>
                                                <iframe width="100%" src="${row.video}" allow="autoplay"
                                                frameborder="0" allowfullscreen ></iframe>
                                                </div>
                                        </div> 

                                        <div class='buy__cardGame' id="buy__cardGame">
                                            <h2 class='buy__cardGame-title'>Где купить</h2>
                                            <div class='buy__cardGame-container' >
                                                    <div class='buy__cardGame-items'>
                                                        <div class="buy__cardGame-item">
                                                            <div class="buy__cardGame-item_1">
                                                                <img src="https://ggsel.net/assets/new/img/logo.svg" />
                                                                <div class="review_game_for_ggsel_cont">
                                                                    <a href="${row.link_ref}" target="_blank">
                                                                        <button class="review_game_for_ggsel_btn">
                                                                            Обзор
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div> 
                                                            <div class="buy__cardGame-item_2" >
                                                                <div class="digiseller-buy-standalone"
                                                                    data-id="${id_ggsel_agent}"
                                                                    data-ai="1207199"
                                                                    data-img="1"
                                                                    data-img-size="180"
                                                                    data-name="1"
                                                                    data-price="1"
                                                                    data-owner="1"
                                                                    data-no-price="0">
                                                                </div>
                                                            </div>
                                                        </diV>
                                                    </div>
                                            </div>
                                        </div> 
                                        `;
                imgCardGame.innerHTML = `
                                                <div class="imgCardGame__item_1">
                                                    <a href="../img/image__games/${row.link_img}" data-fancybox='gallery' alt="${row.alt}">
                                                        <img width="92%" src ="../img/image__games/${row.link_img}">
                                                    </a>
                                                </div>                                               
                                                <div class="imgCardGame__item_2">
                                                    <a href="../img/image__games/${row.link_img_two}" data-fancybox='gallery' alt="${row.alt}">
                                                        <img src ="../img/image__games/${row.link_img_two}">
                                                    </a>
                                                </div>    
                                                <div class="imgCardGame__item_3">
                                                    <a href="../img/image__games/${row.link_img_three}" data-fancybox='gallery' alt="${row.alt}">
                                                        <img src ="../img/image__games/${row.link_img_three}">
                                                    </a>
                                                </div>
                                    
                                            `
                bg_card.innerHTML = `
                                    <div class="bg_cardGame_cont">
                                        <img class="bg_cardGamee_img" src ="../img/image__games/${row.link_img}">
                                    </div>
                `
                slider.innerHTML = `   
                                        <div class="slider__slides">
                                        <div class="slider__slide active">
                                            <a href="../img/image__games/${row.link_img}" data-fancybox='gallery' alt="${row.alt}">
                                                <img  src ="../img/image__games/${row.link_img}">
                                            </a>
                                        </div>
                                        <div class="slider__slide">
                                            <a href="../img/image__games/${row.link_img_two}" data-fancybox='gallery' alt="${row.alt}">
                                                <img src ="../img/image__games/${row.link_img_two}">
                                            </a>
                                        </div>
                                        <div class="slider__slide">
                                            <a href="../img/image__games/${row.link_img_three}" data-fancybox='gallery' alt="${row.alt}">
                                                <img src ="../img/image__games/${row.link_img_three}">
                                            </a>
                                        </div>
                                    </div>
                                    <div id="nav-button--prev" class="slider__nav-button"></div>
                                    <div id="nav-button--next" class="slider__nav-button"></div>
                                    <div class="slider__nav">
                                        <div class="slider__navlink active"></div>
                                        <div class="slider__navlink"></div>
                                        <div class="slider__navlink"></div>
                                    </div>  `
                readMore();
                let slides = document.getElementsByClassName("slider__slide");
                let navlinks = document.getElementsByClassName("slider__navlink");
                let currentSlide = 0;
                console.log(document.getElementById("nav-button--next"))
                document.getElementById("nav-button--next").addEventListener("click", () => {
                    changeSlide(currentSlide + 1)
                });
                document.getElementById("nav-button--prev").addEventListener("click", () => {
                    changeSlide(currentSlide - 1)
                });

                function changeSlide(moveTo) {
                    if (moveTo >= slides.length) {moveTo = 0;}
                    if (moveTo < 0) {moveTo = slides.length - 1;}
                    
                    slides[currentSlide].classList.toggle("active");
                    navlinks[currentSlide].classList.toggle("active");
                    slides[moveTo].classList.toggle("active");
                    navlinks[moveTo].classList.toggle("active");
                    
                    currentSlide = moveTo;
                }

                document.querySelectorAll('.slider__navlink').forEach((bullet, bulletIndex) => {
                    bullet.addEventListener('click', () => {
                        if (currentSlide !== bulletIndex) {
                            changeSlide(bulletIndex);
                        }
                    })
                })
            }

        })
    }
    async function getShowRatingAll(){                
                await fetch('/system/showRatingAll.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `productid=<?php echo $_GET['productid']; ?> `
                    })
                    .then(response => response.json())
                    // получаем ответ как data
                    .then(data => {
                        let ratingShow = document.querySelector(".ratingShow");
                        for (let row of data) {
                            if (row.rating == null) {
                                ratingShow.innerHTML = `<span class="rating__res-false"> Нет голосов</span>`
                            } else {
                                ratingShow.innerHTML = `Средний балл :<span class="rating__res-true"> ${row.rating}</span>`
                            }

                        }
                    })
                
    }
    async function getAddReviews() {                
        await fetch('/system/addReviews.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(response => response.text())
            // получаем ответ как data
            .then(data => {
                
            })
    }
    async function getShowReviews() {
            
        fetch('/system/showReviews.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
            })
        .then(response => response.json())
        // получаем ответ как data
        .then(data => {
            let feedBack = document.querySelector(".feedBack__cardGame");
            for (let row of data) {
                if (row.id == <?php echo $_GET['productid'];?>) {
                    feedBack.innerHTML += `<div>
                                                        <span class="reviwsSender">Отправитель : ${row.login}</span>
                                                        <span class="reviwsDate">отправлено : ${row.date}</span>
                                                        <p class="reviwsComment">${row.text}</p>
                                                    </div>`
                }
            }
        })
            
    }
    async function getSysSimilar(){
        await fetch('/system/sysSimilar.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `id=<?php echo $_GET['productid']; ?>`
                    })
                    // выполняется ответ с json
                    .then(response => response.json())
                    .then(data => {
                        let schowSimilar = document.querySelector(".schowSimilar");
                        for (let row of data) {
                            schowSimilar.innerHTML += `<div>
                                                            <a class="link__similar" href="/cardGame?productid=${row.id}">
                                                                <img width="35%" src ="../img/image__games/${row.link_img}" alt="${row.alt}">
                                                                <span class="name__similar">${row.name}</span>
                                                            </a>    
                                                        </div>`
                        }
                    })
    }

    getCardGame()
    getShowRatingAll()
    getAddReviews()
    getShowReviews()
    getSysSimilar()
   
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <script src="../js/favorite.js"></script>
    
</html>