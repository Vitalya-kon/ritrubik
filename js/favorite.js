// ##### ФУНКЦИЯ addToCard(id) при клике на div class = "favorite__cardGame"(ДОБАВЛЕНИЕ В ИЗБРАННОЕ)
function addToFav(id) {
  // выбираем элемент с классом spanFavorite используя jQuery
  let spanFavorite = $(".spanFavorite");

  // отправляем POST запрос на system/favToAdd.php и передаем id в теле запроса
  $.ajax({
    url: "/system/favToAdd.php",
    method: "POST",
    data: { id: id },
    success: function(data) {
      // если data == "added"
      if (data === "added") {
          spanFavorite.text("В избранном");
      }
      // если data == "exist"
      if (data === "exist") {
        // изменяем текст в элементе spanFavorite на "Добавить в избранное"
        spanFavorite.text("Добавить в избранное");
        // отправляем POST запрос на system/delFavGame.php и передаем id в теле запроса
        $.ajax({
          url: "/system/delFavGame.php",
          method: "POST",
          data: { id: id }
        });
      }
    }
  });
}
