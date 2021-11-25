
<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script type="text/javascript">


////////////////////////fonction hide/show commentaires
$(function(){
        $(".showhidereply").click(function(){
            
            var $toggle = $(this); 
            var id = ".reply-" + $toggle.data('id'); 
            $( id ).toggle();
        });
});

////////////////////fonction bouton filtres status idee


$(function(){
  $(".info-4").click(function(){

    $("[data-id = '3']").show();
    $("[data-id = '2']").show();
    $("[data-id = '1']").show();
    $("[data-id = '']").show();
  });
});

$(function(){
  $(".info-3").click(function(){

    $("[data-id = '3']").show();
    $("[data-id = '2']").hide();
    $("[data-id = '1']").hide();
    $("[data-id = '']").hide();
  });
});

$(function(){
  $(".info-2").click(function(){

    $("[data-id = '3']").hide();
    $("[data-id = '2']").show();
    $("[data-id = '1']").hide();
    $("[data-id = '']").hide();
  });
});

$(function(){
  $(".info-1").click(function(){

    $("[data-id = '3']").hide();
    $("[data-id = '2']").hide();
    $("[data-id = '1']").show();
    $("[data-id = '']").hide();
  });
});

$(function(){
  $(".info-0").click(function(){

    $("[data-id = '3']").hide();
    $("[data-id = '2']").hide();
    $("[data-id = '1']").hide();
    $("[data-id = '']").show();
  });
});

                    
                       





</script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>