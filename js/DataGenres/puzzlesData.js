

$(document).ready(function () {
    getData()
  $(document).on("click", ".pagination_link", function (event) {
    event.preventDefault();
    var page = $(this).attr("id");
    localStorage.setItem("page", page);
    getData(page);
    setTimeout(function() {
      $('html, body').animate({ scrollTop: 0 }, 1000);
  }, 500);
  });

  function getData(page) {
   
            $.post("/system/sysGenres/sysGenres-puzzles.php", 
                    {action: 'patternPuzzles',
                    page:page
                }, function (data) {
            if (data) {
                var data = JSON.parse(data)
                    $('.content__items').html(data['pattern_start'])
                    getSliiderGames()
                    
                  //  $('.content__items').html(data['pattern_start'])            
                    // $('.pagination_top').html(data['pag_top'])
                    $('.pagination_bottom').html(data['pag_bottom'])
                    var $contentItems = $(".content__item"); // Кэширование объекта jQuery

                    $contentItems.on("mouseenter", function(){
                        var $this = $(this); // Кэширование объекта jQuery
                        $this.data('timer', setTimeout(function(){
                            $this.children(".info").animate({height: 'show'}, 300);
                            $this.css({"transform": "scale(1.1)", "zIndex": "777"});
                        }, 300)); // Задержка в ,3 секунду
                    }).on("mouseleave", function(){
                        var $this = $(this); // Кэширование объекта jQuery
                        clearTimeout($this.data('timer')); // Отмена таймера при убирании курсора
                        $this.children(".info").animate({height: 'hide'}, 300);
                        $this.css({"transform": "none", "zIndex": "0"});
                    });
            } else {
                
            }
            
        }) 
        
        
    }
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
});
