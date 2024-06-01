
<div class="footer" style="display: flex; gap: 25px;">
    <div>
        <span>&copy; 2021-<?php echo date('Y'); ?></span>
        <span>Ƥℝ๏gℝammeℝ</span>
    </div>
    <div>
        <div ><span>Колличество игр на сайте:</span> <span id="countGames"></span></div>
    </div>
</div>

<script>
     function getCountGames(){
                
        $.post("/system/sysFooter.php", {action: "getFooter"}, function (data) {
            if (data) {
                var data = JSON.parse(data)
                $("#countGames").text(data['count_games'])
            }
        }) 
         
    }

    getCountGames()
   
</script>