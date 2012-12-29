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
/*	display:none;*/
}
.swatches div{
	width:40px;
	height:40px;
	
}
.swatches .black{
	background-color:#000000;
}

.swatches .blue{
	background:url(images/blue-swatch.png) center center no-repeat;
}

.swatches .light-blue{
	background:url(images/light-blue-swatch.png) center center no-repeat;
}

.swatches .green{
	background:url(images/green-swatch.png) center center no-repeat;
}

.swatches .yellow{
	background:url(images/yellow-swatch.png) center center no-repeat;
}

.swatches .red{
	background:url(images/red-swatch.png) center center no-repeat;
}


</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script>
$(function(){
   
   var product = $(".product");
   var image = $(".image");
   var swatches = $(".swatches");
   
   var pathToImages = "images/"; // change this to where ever your images are...
   
//   product.mouseenter(function(){
//   		swatches.show();
//   }).mouseleave(function(){
//   		swatches.hide();
//   });
   
   swatches.children("div").each(function(){
   
   	var color = $(this).attr("class");
    $(this).mouseenter(function(){
    //alert(color);
    
    $(this).parents(".swatches").siblings(".image").attr("src", pathToImages + color+".png");
    });
   
   });
   
   
   
   });

</script>
</head>

<body>

<div id="container">

<div class="product">
	<img src="images/blue.png" class="image"/>
	<div class="swatches">
	<div class="blue"></div>
	<div class="light-blue"></div>
	<div class="green"></div>
	<div class="yellow"></div>
	<div class="red"></div>
	
	</div>
</div>


   </div>

</body>
</html>