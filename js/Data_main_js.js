export default class GetDataClass {
    constructor( url, section) {
        this.reload();
        this.url = url;
        this.section = section;
        this.page = 1;
        this.init();
    }
    reload() {
        window.onload = function() {
            if (document.readyState === "complete") { 
                localStorage.clear();              
            } 
        }
    }
    init() {
        let self = this;
        $(document).ready(() => {
            self.getData(1);
            $(document).on("click", ".pagination_link", (event) => {
                event.preventDefault();
                self.page = $(event.currentTarget).attr("id");
                localStorage.setItem("page", self.page);
                self.getData(self.page);
                setTimeout(() => {
                    $('html, body').animate({ scrollTop: 0 }, 1000);
                }, 500);
            });
        });
    }

    getData(page) {
        // this.page = localStorage.getItem("page") || 1;
        $.post(this.url, 
            {action: this.section, page: page}, 
            (data) => {
                if (data) {
                    var data = JSON.parse(data)
                    $('.content__items').fadeOut(0, () => {
                        $('.content__items').html(data['pattern_start']).fadeIn(0);
                        this.getSliiderGames();
                    });
                    $('.pagination_bottom').html(data['pag_bottom']);
                    var $contentItems = $(".content__item");
    
                    $contentItems.on("mouseenter", function(){
                        var $this = $(this);
                        $this.data('timer', setTimeout(function(){
                            $this.children(".info").animate({height: 'show'}, 300);
                            $this.css({"transform": "scale(1.1)", "zIndex": "777"});
                        }, 300));
                    }).on("mouseleave", function(){
                        var $this = $(this);
                        clearTimeout($this.data('timer'));
                        $this.children(".info").animate({height: 'hide'}, 300);
                        $this.css({"transform": "none", "zIndex": "0"});
                    });
                }
            }
        );
    }

    getSliiderGames() {
        $("#slider_game_content").owlCarousel({
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
}