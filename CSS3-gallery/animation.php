<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style type="text/css"> 
div
{
width:10px;
height:10px;
background:red;
position:relative;
}
div:hover
{
animation:myfirst 5s;
-moz-animation:myfirst 5s; /* Firefox */
-webkit-animation:myfirst 5s; /* Safari and Chrome */
}

@keyframes myfirst
{
0%   {background:red; left:0px; top:0px; width:10px;}
25%  {background:yellow; left:200px; top:0px; width:100px;}
50%  {background:blue; left:200px; top:200px;width:150px;}
75%  {background:green; left:0px; top:200px;width:100px;}
100% {background:red; left:0px; top:0px;width:100px;}
}

@-moz-keyframes myfirst /* Firefox */
{
0%   {background:red; left:0px; top:0px;}
25%  {background:yellow; left:200px; top:0px;}
50%  {background:blue; left:200px; top:200px;}
75%  {background:green; left:0px; top:200px;}
100% {background:red; left:0px; top:0px;}
}

@-webkit-keyframes myfirst /* Safari and Chrome */
{
0%   {background:red; left:0px; top:0px; width:10px; height:10px;}
25%  {background:yellow; left:200px; top:0px; width:100px;height:100px;}
50%  {background:blue; left:200px; top:200px;width:150px;height:150px;}
75%  {background:green; left:0px; top:200px;width:100px;}
100% {background:red; left:20px; top:20px;width:100px;}
}
</style>
</head>
<body>

<p><b>Note:</b> This example does not work in Internet Explorer and Opera.</p>

<div></div>

</body>
</html>

