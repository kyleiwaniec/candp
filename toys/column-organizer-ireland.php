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

echo "<script> var thumb_array_org = ".stripslashes(json_encode($images))."</script>";
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
<div class="wrapper">
<h1>Column Organizer</h1>
    
<div id="thumbnail-grid"></div>
<script>var winWidth = $(window).width();
var columns = parseInt(winWidth/300);

                       


var init = function(){
    var thumb_array = thumb_array_org.slice(0);
    var thumbColumns = [];
    for(var i = 0; i < columns; i++){
        var thumb = thumb_array.shift();
        var relativeHeight = (300*(thumb.height/thumb.width))+60;
        thumbColumns[i] = {"thumbs": [thumb], "height" : relativeHeight};
    }
    var length = thumb_array.length;
    for(var i = 0; i < length; i++){
        var thumb = thumb_array.shift();
        var relativeHeight = (300*(thumb.height/thumb.width))+60;
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
    var grid = $("#thumbnail-grid").html("").width(columns*300);
    var gridFrag = "";
    for(var i = 0; i < columns; i++){
        gridFrag += "<ul id='col"+i+"'></ul>";
    }
    grid.append(gridFrag);
    for(var i = 0; i < columns; i++){
        var frag = "";
        for(var j = 0; j < thumbColumns[i]["thumbs"].length; j++){
            frag += "<li class='column'><img src='"+thumbColumns[i]["thumbs"][j]["src"]+"'/><div class='caption truncate'>"+thumbColumns[i]["thumbs"][j]["src"]+"</div></li>";
        }
        $("#col"+i).append(frag);
    }
}

$(window).on("resize", function(){
    winWidth = $(window).width();
    columns = parseInt(winWidth/300);
    init();
});  

init();
</script>
     
        </div><!-- #wrapper -->

       
    </body>
</html>
