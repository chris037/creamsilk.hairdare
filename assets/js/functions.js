function init(){

	   
      var pageid = $('.wrapper').data('pageid');

      if(pageid == 'gallery'){
          //var id = GetParameterValues('id');  
          if(GetParameterValues('album')!= undefined){
             setupGallery('.gallery_inner_wrap');
          }else{
             setupGallery('.gallery_wrap');
          }
         
      }

       if(pageid == 'entries'){
          $('.twitter_wrap').hide();
          $('.tweet').twittie({
            dateFormat: '%b. %d, %Y',
            template: '<div class="avatar">{{avatar}}</div> <div class="feed">{{tweet}}</div> <div class="date">{{date}}</div>',
            count: '500',
            hashtag: '#CreamSilkHairDare',
            loadingText: 'Loading!'
          }, function(){
               var ch = $('.tweet ul').children();
               console.log(ch.length);
               console.log('loaded');

               // for (var i = 0; i < ch.length; i++) {
               //   console.log('cc');
               //    $('.twitter_wrap').append( '<li><img class="" data-src="holder.js/100px114" /></li>');
               // }
              setupGallery('.twitter_wrap');
              $('.twitter_wrap').show();

             // $('.tweet').append('<script type="text/javascript" src="assets/js/list.js"></script>');
             // var options = {
             //            valueNames: [ 'name']
             //          };

             //  var userList = new List('users', options);
              });
           $( "#search" ).click(function() {
               var str = this.value.toLowerCase();
               if(str.length == 0){
                    $('ul.list li').each( function() {
                          $(this).show();
                    });
               }
            });

          $( "#search" ).on("input", function() {
              var str = this.value.toLowerCase();
              if(str.length < 5){
                    $('ul.list li').each( function() {
                          $(this).show();
                    });
               }
              if(str.length >= 5){
                 $('#mCSB_1_container').css("top", "0px");
                 $('#mCSB_1_dragger_vertical').css("top", "0px");
                
                 $('ul.list li').each( function() {
                      var dta = $(this).data('name');
                      if(dta != undefined){
                         var dta2 = dta.toLowerCase();
                         var res = dta2.search(str);
                      
                          if (dta2.search(str) != -1) {
                            console.log(dta2);
                          } else {
                            $(this).hide();
                            //console.log(res);
                          }
                                 
                      }
                               

                 });

              }
             
           });

          
       }

       if(pageid == 'photo'){
       
          $("img").error(function () {
             console.log('okd');
            //$(this).prop('src', 'img/broken.png');
          });
       }

     addListener();

     //resize images to fit in a container
     $(".imgLiquidFill").imgLiquid();


	
}

function setupGallery(str){

	$(str).mCustomScrollbar({
          scrollButtons:{enable:true},
          theme:"light-thick",
          scrollbarPosition:"outside"
      });

	

}

function addListener(){
	 
	$('button').click(function(){ 
		 //checks if button is popup
           if($(this).data('attr')){
               $.featherlight('#'+$(this).data('attr'));
           }else{
               $(location).attr('href',$(this).data('href'));
           }
           
     });

     $('.gallery_wrap li').click(function(){
           var url = "gallery.php?album="+$(this).data('gal');
          $(location).attr('href',url);
     });

     $('.gallery_inner_wrap li').click(function(){
		      
          var src = $(this).find('img').attr('src');
          var album = $(this).data('album');
          var photo = $(this).data('photo');
          var url = 'photo.php?album=' + album + '&photo=' + photo;

          $('#fl1').find('img').attr('src', src);
          $('#fl1').find('img').show();
          $('#fl1').attr('src', url);
          $.featherlight('#fl1');
     });

     $('.popup').click(function(event) {
         var width  = 575,
             height = 400,
             left   = ($(window).width()  - width)  / 2,
             top    = ($(window).height() - height) / 2,
             url    = this.href,
             opts   = 'status=1' +
                      ',width='  + width  +
                      ',height=' + height +
                      ',top='    + top    +
                      ',left='   + left;
         
         window.open(url, 'twitter', opts);
      
         return false;
       });

}
function GetParameterValues(param) {  
            var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');  
            for (var i = 0; i < url.length; i++) {  
                var urlparam = url[i].split('=');  
                if (urlparam[0] == param) {  
                    return urlparam[1];  
                }  
            }  
        }  