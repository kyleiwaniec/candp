<!DOCTYPE HTML>
<html>
<head>
<style>
*{margin:0;
padding:0;
}
.product{

}

.image{
	display:block;
	float:left;
}
.swatches{
	float:left;
	display:none;
}
.swatches div{
	width:30px;
	height:30px;
	
}
.swatches .black{
	background-color:#000000;
}

.swatches .blue{
	background-color:#1b95ce;
}

.swatches .aqua{
	background-color:#5fc3c6;
}

.swatches .green{
	background-color:#b0dd8c;
}

.swatches .yellow{
	background-color:#edd011;
}

.swatches .red{
	background-color:#df6f6e;
}


</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
$(function(){
   
   var product = $(".product");
   var image = $(".image");
   var swatches = $(".swatches");
   
   var pathToImages = "images/"; // change this to where ever your images are...
   
   product.mouseenter(function(){
   		swatches.show();
   }).mouseleave(function(){
   		swatches.hide();
   });
   
   swatches.children("div").each(function(){
   
   	var color = $(this).attr("class");
    $(this).mouseenter(function(){
    //alert(color);
    
    $(this).parents(".swatches").siblings(".image").attr("src", pathToImages + color+".jpg");
    });
   
   });
   
   
   
   });

</script>
</head>

<body>

<div id="container">

<div class="product">
	<img src="images/black.jpg" class="image"/>
	<div class="swatches">
	<div class="black"></div>
	<div class="blue"></div>
	<div class="aqua"></div>
	<div class="green"></div>
	<div class="yellow"></div>
	<div class="red"></div>
	
	</div>
</div>


   </div>

</body>
</html>