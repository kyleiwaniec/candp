<?php

$title = "Column Organizer";
$jq_version = "http://code.jquery.com/jquery-1.10.2.min.js";
$stylesheet = "";
$script = "";
require_once ("custom-header.php");
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
<script>

var thumb_array_org = [{"src":"http://www.candpgeneration.com/toys/warsaw/10219.jpg","height":638,"width":900},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/12541_3_800_000_1.jpg","height":400,"width":400},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/19072.jpg","height":638,"width":920},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/1977_Fiat_126-3.jpg","height":1200,"width":1600},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/309405.jpg","height":1200,"width":877},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/312076.jpg","height":912,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/314776.jpg","height":947,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/330645.jpg","height":826,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/355969.jpg","height":1083,"width":970},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/365369.jpg","height":582,"width":1100},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/17409.jpg","height":661,"width":1203},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/a3e448eb8f888fddmed.jpg","height":326,"width":500},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/115503.jpg","height":729,"width":1066},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/maly-fiat1.jpg","height":599,"width":795},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/maly-fiat2.jpg","height":375,"width":500},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/maly-fiat3.jpg","height":484,"width":832},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/12541_3_800_000_1.jpg","height":400,"width":400},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/19072.jpg","height":638,"width":920},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/1977_Fiat_126-3.jpg","height":1200,"width":1600},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/309405.jpg","height":1200,"width":877},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/312076.jpg","height":912,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/314776.jpg","height":947,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/330645.jpg","height":826,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/355969.jpg","height":1083,"width":970},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/365369.jpg","height":582,"width":1100},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/17409.jpg","height":661,"width":1203},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/a3e448eb8f888fddmed.jpg","height":326,"width":500},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/115503.jpg","height":729,"width":1066},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/309405.jpg","height":1200,"width":877},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/312076.jpg","height":912,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/314776.jpg","height":947,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/330645.jpg","height":826,"width":1300},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/355969.jpg","height":1083,"width":970},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/365369.jpg","height":582,"width":1100},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/17409.jpg","height":661,"width":1203},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/115503.jpg","height":729,"width":1066},
                            {"src":"http://www.candpgeneration.com/toys/warsaw/a3e448eb8f888fddmed.jpg","height":326,"width":500}
                            ]; 


var winWidth = $(window).width();
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
