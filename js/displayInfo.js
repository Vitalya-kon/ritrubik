
  // ============= ФУНКЦИЯ ДЛЯ ОТОБРАЖЕНИИ ИНФОРМАЦИИ ОБ ИГРЕ ПРИ НАВЕДЕНИИ НА СТР START.PHP=======================
  function displayInfo(){
    $(".content__item").each(function(){
      var timer;
      $(this).on("mouseover", function(){
          var self = $(this);
          timer = setTimeout(function(){
              self.children(".info").css("display", "block");
              self.css("transform", "scale(1.1)");
              self.css("zIndex", "777");
          }, 300); // Задержка в ,3 секунду
      })
      $(this).on("mouseout", function(){
          clearTimeout(timer); // Отмена таймера при убирании курсора
          $(this).children(".info").css("display", "none");
          $(this).css("transform", "none");
          $(this).css("zIndex", "0");
      })
  })
  }
    
  
      
