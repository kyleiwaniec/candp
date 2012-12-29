 // preload images
            var req = new XMLHttpRequest();
            req.open('GET', 'http://www.kyle-hamilton.com/get_images_in_dir.php?dir=EE/images/', true);
            req.onreadystatechange = function (aEvt) {
              if (req.readyState == 4) {
                 if(req.status == 200){
                  
                  var imgArr = req.responseText;
                  var newImgArr = imgArr.split(",");
                  
                  // console.log(newImgArr);
                  
                  var images = [ ];
                  var len = newImgArr.length;
                    for ( var i = 0; i < len; i++ ) { 
                    images.push( "http://www.kyle-hamilton.com/EE/images/" + newImgArr[i]);
                    }      

                 $({}).imageLoader({
                    images: images,
                    async: true,
                    allcomplete: function(e, ui) {
                      // console.log("all images have finished uploading");
                        }
                    });
                  
                 }//else{
                 // console.log("Error loading page\n");
                 //}
                 }
              };
           
            req.send(null);