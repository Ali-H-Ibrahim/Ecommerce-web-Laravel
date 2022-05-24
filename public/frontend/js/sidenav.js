
$(".default_option").click(function(){
    $(this).parent().toggleClass("active");
  })
  
  $(".select_ul li").click(function(){
    var currentele = $(this).html();
    $(".default_option li").html(currentele);
    $(this).parents(".select_wrap").removeClass("active");
  })

  