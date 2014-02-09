<?php

$title = "Column Organizer";
$jq_version = "http://code.jquery.com/jquery-1.10.2.min.js";
$stylesheet = "";
$script = "";
require_once ("custom-header.php");
?>
<style>
    .wrapper {
        margin: 0 auto;
        max-width: 100%;
        text-align: center;
    }
    .column{
        width:200px;

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
    }
    li{
        margin:0;
        padding:0;
    }
</style>
<div id="thumbnail-grid"></div>
<script>
var grid = $("#thumbnail-grid");
var thumb_array = [{"src":"warsaw/10219.jpg","height":638,"width":900},
                            {"src":"warsaw/12541_3_800_000_1.jpg","height":400,"width":400},
                            {"src":"warsaw/19072.jpg","height":638,"width":920},
                            {"src":"warsaw/1977_Fiat_126-3.jpg","height":1200,"width":1600},
                            {"src":"warsaw/309405.jpg","height":1200,"width":877},
                            {"src":"warsaw/312076.jpg","height":912,"width":1300},
                            {"src":"warsaw/314776.jpg","height":947,"width":1300},
                            {"src":"warsaw/330645.jpg","height":826,"width":1300},
                            {"src":"warsaw/355969.jpg","height":1083,"width":970},
                            {"src":"warsaw/365369.jpg","height":582,"width":1100},
                            {"src":"warsaw/17409.jpg","height":661,"width":1203},
                            {"src":"warsaw/a3e448eb8f888fddmed.jpg","height":326,"width":500},
                            {"src":"warsaw/115503.jpg","height":729,"width":1066},
                            {"src":"warsaw/maly-fiat1.jpg","height":599,"width":795},
                            {"src":"warsaw/maly-fiat2.jpg","height":375,"width":500},
                            {"src":"warsaw/maly-fiat3.jpg","height":484,"width":832},
                            {"src":"warsaw/12541_3_800_000_1.jpg","height":400,"width":400},
                            {"src":"warsaw/19072.jpg","height":638,"width":920},
                            {"src":"warsaw/1977_Fiat_126-3.jpg","height":1200,"width":1600},
                            {"src":"warsaw/309405.jpg","height":1200,"width":877},
                            {"src":"warsaw/312076.jpg","height":912,"width":1300},
                            {"src":"warsaw/314776.jpg","height":947,"width":1300},
                            {"src":"warsaw/330645.jpg","height":826,"width":1300},
                            {"src":"warsaw/355969.jpg","height":1083,"width":970},
                            {"src":"warsaw/365369.jpg","height":582,"width":1100},
                            {"src":"warsaw/17409.jpg","height":661,"width":1203},
                            {"src":"warsaw/a3e448eb8f888fddmed.jpg","height":326,"width":500},
                            {"src":"warsaw/115503.jpg","height":729,"width":1066},
                            {"src":"warsaw/309405.jpg","height":1200,"width":877},
                            {"src":"warsaw/312076.jpg","height":912,"width":1300},
                            {"src":"warsaw/314776.jpg","height":947,"width":1300},
                            {"src":"warsaw/330645.jpg","height":826,"width":1300},
                            {"src":"warsaw/355969.jpg","height":1083,"width":970},
                            {"src":"warsaw/365369.jpg","height":582,"width":1100},
                            {"src":"warsaw/17409.jpg","height":661,"width":1203},
                            {"src":"warsaw/115503.jpg","height":729,"width":1066},
                            {"src":"warsaw/a3e448eb8f888fddmed.jpg","height":326,"width":500}
                            ]; 

var columns = 4;
var thumbColumns = [];
for(var i = 0; i < columns; i++){
    var thumb = thumb_array.shift();
    var relativeHeight = (thumb.height/thumb.width);
    thumbColumns[i] = {"thumbs": [thumb], "height" : relativeHeight};
}
var length = thumb_array.length;
for(var i = 0; i < length; i++){
    var thumb = thumb_array.shift();
    var relativeHeight = (thumb.height/thumb.width);
    var shortest = getShortestCol(thumbColumns);
    thumbColumns[shortest]["thumbs"].push(thumb);
    thumbColumns[shortest]["height"] += relativeHeight;
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

var gridFrag = "";
for(var i = 0; i < columns; i++){
    gridFrag += "<ul id='col"+i+"'></ul>";
}
grid.append(gridFrag);
for(var i = 0; i < columns; i++){
    var frag = "";
    for(var j = 0; j < thumbColumns[i]["thumbs"].length; j++){
        frag += "<li class='column'><img src='"+thumbColumns[i]["thumbs"][j]["src"]+"'></li>";
    }
    $("#col"+i).append(frag);
}


</script>
     
        </div><!-- #wrapper -->

       
    </body>
</html>
