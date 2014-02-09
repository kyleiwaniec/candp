<?php

$title = "Column Organizer";
$jq_version = "http://code.jquery.com/jquery-1.10.2.min.js";
$stylesheet = "";
$script = "";
require_once ("custom-header.php");
?>

<div id="thumbnail-grid"></div>
<div id="hidden-thumbnail-grid" style="overflow:hidden; width:0; height:0; position:absolute;"></div>
<script>
// (function($) {
//   var cache = [];
//   // Arguments are image paths relative to the current page.
//   $.preLoadImages = function() {
//     var args_len = arguments.length;
//     for (var i = args_len; i--;) {
//       var cacheImage = document.createElement('img');
//       cacheImage.src = arguments[i];
//       cache.push(cacheImage);
//     }
//   }
// })(jQuery)



        var thumbnails = ["warsaw/10219.jpg",
                            "warsaw/115503.jpg",
                            "warsaw/12541_3_800_000_1.jpg",
                            "warsaw/17409.jpg",
                            "warsaw/18068.jpg",
                            "warsaw/19072.jpg",
                            "warsaw/1977_Fiat_126-3.jpg",
                            "warsaw/309405.jpg",
                            "warsaw/312076.jpg",
                            "warsaw/314776.jpg",
                            "warsaw/330645.jpg",
                            "warsaw/355969.jpg",
                            "warsaw/365369.jpg",
                            "warsaw/Binder.pdf",
                            "warsaw/DSC2189.jpg",
                            "warsaw/a3e448eb8f888fddmed.jpg",
                            "warsaw/maly-fiat1.jpg",
                            "warsaw/maly-fiat2.jpg",
                            "warsaw/maly-fiat3.jpg",
                            "warsaw/pap_sezam_waw_600.jpeg",
                            "warsaw/sezam.jpg",
                            "warsaw/sierakowski-sezam-karpinski-12335353-o.jpg",
                            "warsaw/tumblr_m1etfqjmo71qzq84io1_500.jpg",
                            "warsaw/warszawa8-1.jpg",
                            "warsaw/z11361374Q.jpg"];

        var grid = $("#hidden-thumbnail-grid");

        var columns = 3;

        var gridFrag = "";

        for(var i = 0; i < columns; i++){
            gridFrag += "<ul id='col"+i+"'></ul>";

            

        }
        grid.append(gridFrag);

        var cache = [];
        var thumb_grid = document.getElementById("thumbnail-grid");
        for(var j = 0; j < thumbnails.length; j++){

                var img = new Image(); 
                img.src = thumbnails[j];

                //thumb_grid.appendChild( img.cloneNode(true) );
                grid.append($(img));

                // img.onload = function(i){
                    
                //    console.debug(img.height);

                   
                //  };
                 
                 $(img).on("load",function(){
                         console.debug($(this).height());
                         cache.push({"src" : $(this).attr("src"), "height" : $(this).height(), "width": $(this).width()});
                        console.log(JSON.stringify(cache));
                    });

            // var cacheImage = document.createElement('img');
            // cacheImage.src = thumbnails[j];
            // cache.push(cacheImage);
    
            
            //$("#col0").append(cacheImage);
            
        }



        // var div = document.getElementById("thumbnail-grid");

        // var fragment = document.createDocumentFragment();
        // for ( var e = 0; e < cache.length; e++ ) {
        //     fragment.appendChild( cache[e] );
        // }
         
        // div.appendChild( fragment.cloneNode(true) );

        // grid.find("img").on("load",function(){
        //     console.log($(this).height());
        //     cache.push({"src" : $(this).attr("src"), "height" : $(this).height()});
        //     console.log(cache);
        // });
            
        

        
</script>
<?php require_once ("sandbox-footer.php"); ?>
