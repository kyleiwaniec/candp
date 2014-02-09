<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8"/>

<style>
.searchinputbox{
      background-color: transparent;
      text-align: left;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
      font-weight: bold;
      color: #333;
      width: 210px;border:none;
      height:37px;
      text-indent:20px;
      line-height:37px;
      padding:0;
      margin:0;
      float:right;
      background-image: url(/images/search_bg.png);
}

.searchbutton {
      background-color: transparent;
      margin:0;
      padding:0;border:none;
      border:0;
      width:100px;
      padding:0;
      margin:0;
      height:37px;
      float:right;
      background-image: url(/images/search_btn_off.png);
}

.searchbutton:hover {
      background-image: url(/images/search_btn_ovr.png);
}


.searchbutton{
background: url(/images/search_btn_off.png) !important;
border:0 !important;
}
.searchbutton:hover{
background: url(/images/search_btn_ovr.png) !important;
border:0 !important;
}
.searchbutton:focus {

}

.searchinputbox, .searchinputbox:hover, .searchinputbox:focus{
background: transparent !important;
border:0 !important;
}

input:hover, input:focus {
      border-color:#c5c5c5;
      background:#f6f6f6;
}



</style>

<body>
<div class="searchform">
<form name="search" method="POST" action="<?php echo $search_form; ?>">          
<input name="Submit" type="submit" class="searchbutton" id="Submit" value="" />
<input name="keywords" type="integer" class="searchinputbox" id="keywords" value="Find Products" size="15" onclick="clearField(this)" onfocus="clearField(this)">
</form>
</div>

</body>
</html>