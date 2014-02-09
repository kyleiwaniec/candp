<?php

$title = "Column Organizer";
$jq_version = "http://code.jquery.com/jquery-1.10.2.min.js";
$stylesheet = "";
$script = "";
require_once ("custom-header.php");

$images = array();
$filenames = glob("ireland/*.JPG");
$count = 0;
foreach($filenames as $file){

    //array_push($images, $file);

    $imageSize = getimagesize($file);
    $width = $imageSize[0];
    $height = $imageSize[1];

    $images[$count] = [
        'src'=>$file,
        'src_lg'=>'ireland_lg/'.$file,
        'width'=>$width,
        'height'=>$height
        ];
    // array_push($images, [
    //     'src'=>$file,
    //     'width'=>$width,
    //     'height'=>$height
    //     ]
    // );
    $count++;    
}

// $file = fopen('data.json','w+');
// fwrite($file, stripslashes(json_encode($images)));
// fclose($file);

?>       
 <style>
    body, html{
        background-color: #eee;
        color:#444;
        font-family: helvetica;
        font-weight: normal;
    }
    .wrapper {
        margin: 0 auto;
        width:100%;
        max-width: 100%;
        text-align: center;
    }
    #thumbnail-grid{
        margin: 0 auto;
    }
    .column {
        padding: 10px;
        border: 1px solid #ccc;
        margin: 10px 5px;
        background-color: #fff;
        box-shadow: 0 0 3px #ccc;
        border-radius: 3px;
    }
    .column img{
        max-width: 100%;
        display:block;
    }
    ul{
        float:left;
        margin:0;
        padding:0;
        list-style: none;
        width: 300px;
        box-sizing:border-box;
    }
    li{
        margin:0;
        padding:0;
    }
    li .caption{
        height:30px;
        padding-top:10px;
        box-sizing:border-box;
        font-size: .8rem;
    }
    .truncate{
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
</style>
<link rel="stylesheet" href="colorbox/colorbox.css">
<script src="colorbox/jquery.colorbox-min.js"></script>
<div class="wrapper">
<h1>Column Organizer</h1>
    
<div id="thumbnail-grid"></div>
<?php echo "<script> var config = {}; config.thumb_array_org = ".stripslashes(json_encode($images))."</script>"; ?> 
<script>

    config.colWidth = 300;
    config.padding = 30;
    config.columns = parseInt($(window).width()/config.colWidth);


var initColumns = function(){
    var thumb_array = config.thumb_array_org.slice(0);
    var thumbColumns = [];
    for(var i = 0; i < config.columns; i++){
        var thumb = thumb_array.shift();
        var relativeHeight = (config.colWidth*(thumb.height/thumb.width))+config.padding;
        thumbColumns[i] = {"thumbs": [thumb], "height" : relativeHeight};
    }
    var length = thumb_array.length;
    for(var i = 0; i < length; i++){
        var thumb = thumb_array.shift();
        var relativeHeight = (config.colWidth*(thumb.height/thumb.width))+config.padding;
        var shortest = getShortestCol(thumbColumns);
        thumbColumns[shortest]["thumbs"].push(thumb);
        thumbColumns[shortest]["height"] += (relativeHeight);
    }
    function getShortestCol(array){
        var idx = 0;
        var temp = array[0].height; 
        var curr;
        for(var i = 1; i < array.length; i++){
            curr = array[i].height; 
            if(curr < temp){
                idx = i;
                temp = curr;
            }
        }
        return idx;
    }
    var grid = $("#thumbnail-grid").html("").width(config.columns*config.colWidth);
    var gridFrag = "";
    for(var i = 0; i < config.columns; i++){
        gridFrag += "<ul id='col"+i+"'></ul>";
    }
    grid.append(gridFrag);
    for(var i = 0; i < config.columns; i++){
        var frag = "";
        for(var j = 0; j < thumbColumns[i]["thumbs"].length; j++){
            frag += "<li class='column'><a class='gallery' href='"+thumbColumns[i]["thumbs"][j]["src_lg"]+"'><img src='"+thumbColumns[i]["thumbs"][j]["src"]+"' title='"+thumbColumns[i]["thumbs"][j]["src"]+"'/></a>"
                    //+"<div class='caption truncate'>"+thumbColumns[i]["thumbs"][j]["src"]+"</div></li>"
                    ;
        }
        $("#col"+i).append(frag);
    }
}

$(window).on("resize", function(){
    config.columns = parseInt($(window).width()/config.colWidth);
    initColumns();
});  

initColumns();

$('a.gallery').colorbox({rel:'gal', scalePhotos:true, maxWidth:"95%"});
</script>
        </div><!-- #wrapper -->
    </body>
</html>
