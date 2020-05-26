$('.share-button').on('click', function(){
    var id = "#"+$(this).attr('for');
    if($(id).hasClass('invisible'))
    {
        $(id).removeClass("invisible").addClass("fade-in");
    }
    else{
        $(id).addClass("invisible");
    }
});

const players = Plyr.setup('.video-player');

$("#footer").attr("style",`top: ${$(document).height()}px;`)

var img_height = $("#img-in-modal").height();
console.log(img_height)

//вызвать модальное окно с картинкой
  $(".imagee").click(function() {
     $("#img-modal").addClass("is-active fade-in"); 
     $("#img-in-modal").attr("src", $(this).attr("src"));
     $("#link-in-modal").attr("href", $(this).attr("src"));
    
     var screen_height = window.screen.height;
     var img_height = $("#img-in-modal").height();
     var img_width = $("#img-in-modal").width();

     console.log(img_height)

     if(img_height > screen_height)
     {
       var new_img_height = img_height / 1.368;
       var new_img_width = img_width / 1.368;
       $("#img-in-modal").width(new_img_width).height(new_img_height)
     }
   });
   
 $("#modal-close").click(function() {
     $("#img-modal").removeClass("is-active");
     $("#img-in-modal").width("").height("");
 });

