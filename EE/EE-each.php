<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>
<style>
    .item, .item2{
        display:block;
        width:100px;
        height:100px;
        background-color: hotpink;
        line-height:100px;
        text-align:center;
        color:white;
        margin:5px;
    }
    .item2{
        background-color:orange;
    }
    
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script>
$(function(){
    
//    var text = "old";
//    
//        $('#wrapper .item').each(function(){
//             text = $(this).text();
//             $(this).text(text);
//             alert(text);
//        });
//   
//    alert(text); // gives you the last value (4)
    
    function nt(element){
        if($(element).attr("class") == "item"){
            $(element).text("pink");
        }else{
            $(element).text("orange");
        }
    };
    
    nt(".item, .item2");
   
});
</script>
<body>

    <div id="wrapper">
        <div class="item">1</div>
        <div class="item">2</div>
        <div class="item2">3</div>
        <div class="item2">4</div>
    </div>

</body>
</html>