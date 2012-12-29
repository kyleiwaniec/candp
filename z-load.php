<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="utf-8" />
   <title></title>
   <script src="http://code.jquery.com/jquery-latest.min.js"></script>
   <script>
     $(function(){

       var slideShow = $("#slideShow");
       var path = "images/portfolio/500/";
       var images = [
            "al_0home_fl.jpg",
            "al_1description_fl.jpg",
            "al_2grounds_fl.jpg",
            "al_3gallery_fl.jpg"
       ];
       var numImages = images.length;
       //var maxIndex = images.length - 1;
       var interval = 5000;
       var index = 0; // memory

       if (localStorage.lastImage){
         index = localStorage.lastImage;
       }

       var img = $("<img>", {
         src : path + images[index % numImages]
       });


       img.load(function(){
         begin();
         slideShow.html(img);
         img.unbind("load");
         //img.load(///
       });

       var nextImage = new Image();


       var loop; // better name
       var startTime = +new Date(); // milliseconds since epoch
       var currTime = 0;
       var timer = 0;
       var times = 0;
       var lastTime = 1;
       var currInteral = 0;
       var changeTime = 0;
       var currInterval = 0;
       var loopInterval = 100;
       var checkNextImage;

       function showNext(){
         return currInterval > interval - loopInterval && nextImage.complete;
       }
       function begin(){
         localStorage.lastImage = index;
         index++;
         nextImage.src = path + images[index % numImages];
         loop = setInterval(function(){

           currTime = +new Date();
           timer = currTime - startTime;
           times = parseInt(currTime / interval);

           if (times > lastTime ){
             changeTime = currTime;
           }

           currInterval = +new Date() - changeTime;

           //console.log(showNext());

           if (showNext()){

             // show loaded image
             //console.log("show loaded image");
             img.attr("src", nextImage.src);
             localStorage.lastImage = index;
             index++;

             nextImage.src = path + images[index % numImages];
             //console.log("start load for next image");
             changeTime = currTime;
           }

           lastTime = times;

         }, loopInterval); // run function every 100 ms
       }


       function doSlide(){
         localStorage.lastImage = index;
         index++;
         if (index > maxIndex){
           index = 0;
         }
         img.attr("src", path + images[index]);
       }


     });
   </script>
 </head>
 <body>

   <div id="slideShow">loading...</div>
 </body>
</html>