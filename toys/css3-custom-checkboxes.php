<?php
$next = "throbbing-heart.php";
$prev = "CSS3-dropdown-tut.php";
$title = "CSS3 custom checkboxes";
require_once ("sandbox-header.php");
?>

<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Varela::latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>

<script src="http://modernizr.com/downloads/modernizr-latest.js"></script>
<script>
Modernizr.addTest('csschecked', function () {
		  return Modernizr.testStyles("#modernizr input {margin-left:0px;} #modernizr input:checked {margin-left: 20px;}", function (elem) {
		    var chx = document.createElement('input');
		    chx.type = "checkbox";
		    chx.checked = "checked";
		    elem.appendChild(chx);
		    return elem.lastChild.offsetLeft >= 20;
		  });
		});
</script>
<style>

.checkbox-group {
  margin: 20px 0;
}
.checkbox-group ul {
  display: inline-block;
  *display: inline;
  margin-bottom: 0;
  margin-left: 0;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  *zoom: 1;
 -webkit-padding-start: 0;
}

.checkbox-group ul > li {
  display: inline;
}

.csschecked .checkbox-group ul > li > label {
	float: left;
	padding: 5px 12px 2px 12px;
	line-height: 20px;
	text-decoration: none;
	background-color: transparent;
	color: #444;
	border: 1px solid #ccc;
	border-left-width: 0;
	font-family:helvetica;
	font-size:12px;
        
        -webkit-transition: background .5s ease;
           -moz-transition: background .5s ease;
            -ms-transition: background .5s ease;
             -o-transition: background .5s ease;
                transition: background .5s ease;
}
.csschecked .checkbox-group ul > li:first-child > label {

  border-left-width: 1px;
  -webkit-border-bottom-left-radius: 4px;
          border-bottom-left-radius: 4px;
  -webkit-border-top-left-radius: 4px;
          border-top-left-radius: 4px;
  -moz-border-radius-bottomleft: 4px;
  -moz-border-radius-topleft: 4px;
}

.csschecked .checkbox-group ul > li:last-child > label {
  -webkit-border-top-right-radius: 4px;
          border-top-right-radius: 4px;
  -webkit-border-bottom-right-radius: 4px;
          border-bottom-right-radius: 4px;
  -moz-border-radius-topright: 4px;
  -moz-border-radius-bottomright: 4px;
}

.csschecked .checkbox-group ul > li > :checked + :hover, 
.csschecked .checkbox-group ul > li > :checked + label:focus{
	background-color: #39c;
	background-image: none;
}


.csschecked .checkbox-group ul > li > label:hover, 
.csschecked .checkbox-group ul > li > label:focus{
	color:white;
	background-color: #ccc;
	background-image: none;
	cursor: pointer;
}

.checkbox-group ul > li > label {
	float: left;
	padding:0 8px 0 2px;
}
.csschecked .checkbox-group ul > li > :checked + label{
	background-color: #39C;
	color: white;
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255, 255, 255, 0)), to(rgba(0, 0, 0, 0.2)));
	background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.2) 100%);
	background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.2) 100%);
	background-image: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.2) 100%);
	background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.2) 100%);
	background-image: linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(0, 0, 0, 0.2) 100%);
}
.checkbox-group input{
	float:left;
}
.csschecked .checkbox-group input{
	display:none;
}
.csschecked .checkbox-group ul > li:first-child > label {
  		  border-left-width: 1px;
  -webkit-border-bottom-left-radius: 4px;
          border-bottom-left-radius: 4px;
  -webkit-border-top-left-radius: 4px;
          border-top-left-radius: 4px;
     -moz-border-radius-bottomleft: 4px;
     -moz-border-radius-topleft: 4px;
}

.csschecked .checkbox-group ul > li:last-child > label {
  -webkit-border-top-right-radius: 4px;
          border-top-right-radius: 4px;
  -webkit-border-bottom-right-radius: 4px;
          border-bottom-right-radius: 4px;
     -moz-border-radius-topright: 4px;
     -moz-border-radius-bottomright: 4px;
}

/* flat */


.checkbox-group.flat ul {
  display: inline-block;
  *display: inline;
  margin-bottom: 0;
  margin-left: 0;
  -webkit-border-radius: 0;
     -moz-border-radius: 0;
          border-radius: 0;
  *zoom: 1;
  -webkit-padding-start: 0;
}

.checkbox-group.flat ul > li {
  display: inline;
}

.csschecked .checkbox-group.flat ul > li > label {
	float: left;
	padding: 5px 12px 2px 12px;
	line-height: 20px;
	text-decoration: none;
	background-color: #eee;
	color: #444;
	border: 0;
	border-left-width: 0;
	font-family:'Varela', sans-serif;
	font-size:12px;
        margin-right: 3px;
}

.csschecked .checkbox-group.flat ul > li > :checked + :hover, 
.csschecked .checkbox-group.flat ul > li > :checked + label:focus{
	background-color: #f06;
}


.csschecked .checkbox-group.flat ul > li > label:hover, 
.csschecked .checkbox-group.flat ul > li > label:focus{
	color:white;
	background-color: #ccc;
	cursor: pointer;
}

.checkbox-group.flat ul > li > label {
	float: left;
	padding:0 8px 0 2px;
}
.csschecked .checkbox-group.flat ul > li > :checked + label{
	background-color: #f06;
	color: white;
	background-image: none;
	background-image: none;
	background-image: none;
	background-image: none;
	background-image: none;
	background-image: none;
}
.checkbox-group.flat input{
	float:left;
}
.csschecked .checkbox-group.flat input{
	display:none;
}
.csschecked .checkbox-group.flat ul > li:first-child > label {
  		  border-left-width: 0;
  -webkit-border-radius: 0;
     -moz-border-radius: 0;
          border-radius: 0;
}

.csschecked .checkbox-group.flat ul > li:last-child > label {
  -webkit-border-radius: 0;
     -moz-border-radius: 0;
          border-radius: 0;
}

/* Single Checkbox */

.csschecked .single-checkbox{
    position:relative;
    min-height:22px;
}

.csschecked .single-checkbox input{
    position:absolute;
    opacity:0;
    filter: alpha(opacity = 0);
}
.csschecked .single-checkbox label{
    position:absolute;
    cursor:pointer;
    padding-left:20px;
    padding-top: 2px;
    background:url(images/checkbox.png) 0 0 no-repeat;
}
.csschecked .single-checkbox :checked + label{
    background-position:0 -30px;
}

/* toggle button */

.toggle{
	position:relative;
	display: inline-block;
	border-radius: 4px;
	min-width: 50px;
	height: 18px;
	color: whitesmoke;
	position: relative;
	cursor:pointer;

	-webkit-box-sizing:border-box;
   -moz-box-sizing:border-box;
    -ms-box-sizing:border-box;
		box-sizing:border-box;

	 -webkit-transition: background-image, background-color .3s ease;
           -moz-transition: background-image, background-color .3s ease;
             -o-transition: background-image, background-color .3s ease;
                transition: background-image, background-color .3s ease;
        -webkit-transform-style: preserve-3d;
           -moz-transform-style: preserve-3d;
             -o-transform-style: preserve-3d;
                transform-style: preserve-3d;
}
.csschecked .toggle input{ visibility:hidden; }
.toggle label{ display:none; }
.csschecked .toggle label{ display:block; } 
.toggle label{
	cursor: pointer;
	min-width:20px;
	height:18px;
	position: absolute;
	top: 0;
	left: 0;
-webkit-border-radius:3px;
   -moz-border-radius:3px;
    -ms-border-radius:3px;
		border-radius:3px;
	font-size: 10px;
}

.toggle input:checked + label{
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255, 255, 255, 0)), to(rgba(0, 0, 0, 0.2)));
	background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%,  rgba(0, 0, 0, 0.2) 100%);
	background-image:    -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%,  rgba(0, 0, 0, 0.2) 100%);
	background-image:     -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%,  rgba(0, 0, 0, 0.2) 100%);
	background-image:      -o-linear-gradient(top, rgba(255, 255, 255, 0) 0%,  rgba(0, 0, 0, 0.2) 100%);
	background-image:         linear-gradient(top, rgba(255, 255, 255, 0) 0%,  rgba(0, 0, 0, 0.32) 100%);
	background-color:#5b9547;
	padding-left: 5px;
	padding-right:25px;
	color: #fff;
}
.toggle input + label .toggle-on,
.toggle input:checked + label .toggle-off{
	display:none;
}
.toggle input + label .toggle-off,
.toggle input:checked + label .toggle-on{
	display:block;
}

.toggle input + label{
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(0, 0, 0, 0.2)), to(rgba(255, 255, 255, .2)));
	background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.2) 0%,  rgba(255, 255, 255, .2) 100%);
	background-image:    -moz-linear-gradient(top, rgba(0, 0, 0, 0.2) 0%,  rgba(255, 255, 255, .2) 100%);
	background-image:     -ms-linear-gradient(top, rgba(0, 0, 0, 0.2) 0%,  rgba(255, 255, 255, .2) 100%);
	background-image:      -o-linear-gradient(top, rgba(0, 0, 0, 0.2) 0%,  rgba(255, 255, 255, .2) 100%);
	background-image:         linear-gradient(top, rgba(0, 0, 0, 0.2) 0%,  rgba(255, 255, 255, .2) 100%);
	background-color:#222;
	padding-left: 25px;
	padding-right:5px;
	font-weight: bold;
	color: #aaa;
        font-family: helvetica;
        line-height: 18px;
}

.toggle input + label:after{
	content: "|||";
	position: absolute;
	top: 0;
	left: 0;
	width: 18px;
	height: 18px;
	background-color: rgb(197, 197, 197);
	line-height: 20px;
	text-align: center;
	font-size: 11px;
	font-weight:normal;
	color: #999;
	text-shadow: -1px -1px 1px white;
	border:1px solid rgba(0,0,0,.2);
-webkit-box-sizing:border-box;
   -moz-box-sizing:border-box;
	-ms-box-sizing:border-box;
		box-sizing:border-box;
	border-radius:2px 0 0 2px;
}
.toggle input:checked + label:after{
	content: "|||";
	position: absolute;
	top: 0;
	left: 100%;
	margin-left:-18px;
	width: 18px;
	height: 18px;
	background-color: rgb(197, 197, 197);
	line-height: 20px;
	text-align: center;
	font-size: 11px;
	font-weight:normal;
	color: #999;
	text-shadow: -1px -1px 1px white;
	border:1px solid rgba(0,0,0,.2);
-webkit-box-sizing:border-box;
   -moz-box-sizing:border-box;
	-ms-box-sizing:border-box;
		box-sizing:border-box;
	border-radius:0 2px 2px 0;
}

</style>
<h1>CSS3 Custom checkboxes</h1>
<p>Works in: Chrome, FF, Safari, Opera, IE9+</p>
<p>Using <cite>modernizr.js</cite> to check for <code>:checked</code> pseudo class, else falling back to plain old checkboxes (IE8 and below)</p>
<p>Each week day below is an <code>input type="checkbox"</code> with corresponding <code>label</code></p>
<h2>"Bootstrap-ish":</h2>
<div class="checkbox-group">
              <ul>
                <li>
                	<input type="checkbox" id="mon" checked />
	                <label for="mon">MON</label>
                </li>
                <li>
                	<input type="checkbox" id="tue" checked />
	                <label for="tue">TUE</label>
                </li>
                <li>
                	<input type="checkbox" id="wed"/>
	                <label for="wed">WED</label>
                </li>
                <li>
                	<input type="checkbox" id="thur"/>
	                <label for="thur">THUR</label>
                </li>
                <li>
                	<input type="checkbox" id="fri"/>
	                <label for="fri">FRI</label>
                </li>
                <li>
                	<input type="checkbox" id="sat"/>
	                <label for="sat">SAT</label>
                </li>
                <li>
                	<input type="checkbox" id="sun"/>
	                <label for="sun">SUN</label>
                </li>
              </ul>
		</div>
<h2>"Flat-ish":</h2>
		<div class="checkbox-group flat">
              <ul>
                <li>
                	<input type="checkbox" id="mon-f" checked />
	                <label for="mon-f">MON</label>
                </li>
                <li>
                	<input type="checkbox" id="tue-f" checked />
	                <label for="tue-f">TUE</label>
                </li>
                <li>
                	<input type="checkbox" id="wed-f"/>
	                <label for="wed-f">WED</label>
                </li>
                <li>
                	<input type="checkbox" id="thur-f"/>
	                <label for="thur-f">THUR</label>
                </li>
                <li>
                	<input type="checkbox" id="fri-f"/>
	                <label for="fri-f">FRI</label>
                </li>
                <li>
                	<input type="checkbox" id="sat-f"/>
	                <label for="sat-f">SAT</label>
                </li>
                <li>
                	<input type="checkbox" id="sun-f"/>
	                <label for="sun-f">SUN</label>
                </li>
              </ul>
		</div>
<p>Screenshot of IE8:</p>
<img src="images/checkbox-group-IE8.png" style="border:1px solid grey"/>


<h2>Single checkbox</h2>

<div class="single-checkbox">
    <input type="checkbox" id="chk1"> 
    <label for="chk1">Check it!</label>
</div>
<h2>Toggle checkbox</h2>

<div class='toggle'>
    <input type='checkbox' id='tbtn' />
    <label for='tbtn'>
        <span class='toggle-on'>ON</span>
        <span class='toggle-off'>OFF</span>
    </label>
</div>
    <?php

require_once ("sandbox-footer.php");
?>
