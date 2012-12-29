<!DOCTYPE HTML>
<html>
<head>
    <title>SLIDESHOW CSS3 | HTML5</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Author" content="Alexander Bell" />
    <meta http-equiv="Copyright" content="2011 Infosoft International Inc" />
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="Cache-control" content="no-cache">
    <meta name="Robots" content="all" />
    <meta name="Distribution" content="global" />
    <meta name="Keywords" content="APPLE iPAD 2, SLIDE SHOW CSS 3, DARKBOX CSS 3,
    LIGHTBOX CSS 3, Apple Store Manhattan NY,
    RIA, HTML 5, NO Javascript, NO jQuery />
    <meta name="Description" content ="APPLE iPAD 2 SLIDE SHOW WITH DARKBOX EFFECT,
    CSS 3, HTML 5, NO Javascript, Apple Store in Manhattan NY" />
    <style type="text/css">
        html, body {
            font-family:Arial, Calibri;
            background-color:#bababa;
            margin:0;
            padding:0;
            text-align:center;
            overflow:hidden;
        }
        
        @-webkit-keyframes resize {
	0% {
		width: 0%;
                height: 0%;
                left: 50%;
                top: 50%;
                
            }
	50% {
		width: 25%;
                height: 30%;
                left: 37.5%;
                top: 30%;
/*		background-color:rgba(0,0,0,0.2);		*/
            }
	100% {
		width: 50%;
                height: 60%;
                left: 25%;
                top: 10%;
/*		background-color:rgba(0,0,0,0.9);*/
            }
        }
	
       
        
        /*** horizontal list applied to thumbnails, nav controls ***/
         ul {
            float:left;
            width:100%;
            margin: 0px 0px 20px 0px;
            padding:0;
            list-style-type:none;
        }
        li {display:inline; margin-right:5px;}
        /*** pop-up div to cover entire area ***/
        .divDarkBox  {
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            /*! critical !*/
            display:none;
            /* last attribute set darkness on scale: 0...1.0 */
            background-color:rgba(0,0,0,0.8);
            text-align:center;
            z-index:101;
        }
        /*** ! target attribute does the job ! ***/
        .divDarkBox:target  { 
            display:block; 
           
       }
        /*** virtual frame containing controls, image and caption ***/
        .divDarkBox div  {
           /* either absolute or fixed */
            position:fixed;
            top:10%;
            left:25%;
            width:50%;
            height:60%;
            /* rounded corners */
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            z-index:102;
            
        }
        
        .divDarkBox div:nth-child(3){
            
            -webkit-animation: resize 5s;
        }
        /*** header used as main image caption  ***/
        .divDarkBox div h1  {
            font-size:0.9em;
            color:#bababa;
            font-weight:normal;
            margin-top:20px;
            z-index:103;
            /* add shadows to text */
            -moz-text-shadow: 10px 3px 4px 6px rgba(10,10,10,0.9);
            -webkit-text-shadow: 3px 4px 6px rgba(10,10,10,0.9);
            text-shadow: 3px 4px 6px rgba(10,10,10,0.9);
        }
        /*** div serves as thumbnais container  ***/
        #divThumbnails {
            position:relative;
            margin: 60px 0 0 0;
            height:150px;
            padding-top:30px;
            background-color:#cacaca;
             /* add shadows */
            -moz-box-shadow: 5px 5px 10px rgba(0,0,0,0.7);
            -webkit-box-shadow: 5px 5px 10px rgba(0,0,0,0.7);
            box-shadow: 5px 5px 10px rgba(0,0,0,0.7);
             /* gradient effect with color-stop */
            background: -moz-linear-gradient(top, #f0f0f0, #bababa 10%, #cacaca 49%, #909090 50%, #cacaca 50%, #cacaca 90%, #ababab);
            background: -webkit-gradient(linear, center top, center bottom, from(#f0f0f0), color-stop(0.1, #bababa ), color-stop(0.49, #cacaca), color-stop(0.50, #909090), color-stop(0.50, #cacaca), color-stop(0.90, #cacaca), to(#ababab));
        }
        
        /*** thumbnails/relate div share image style ***/
        #divThumbnails img
        {
            padding:10px;
            border: solid 1px gray;
            /* rounded corners */
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            /* add shadows */
            -moz-box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
            -webkit-box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
            box-shadow: 5px 5px 10px rgba(0,0,0,0.5);
            
            min-width:50px;
            max-width:100px;
            height:100px;
            
            z-index:1;
        }
       
        /*** main image style ***/
        .divDarkBox img {
            
            z-index:105;
            padding:20px;
            border: solid 1px gray;/*
             rounded corners 
*/            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;/*
             gradient effect with color-stop 
*/            background: -moz-linear-gradient(top, #dadada, #505050 5%, #bababa 50%, #303030 50%, #101010);
            background: -webkit-gradient(linear, center top, center bottom, from(#dadada), color-stop(0.05, #505050),
                color-stop(0.5, #bababa), color-stop(0.5, #303030), to(#101010));
            /* this causes some rendering diff */
/*            min-height:300px;
            min-width:300px;*/
            height:100%;
            width:100%;
        }
        /*** hover effects increase visual responsiveness ***/
        img:hover, .divDarkBox ul a:hover  {
            background:#505050;
            /* gradient effect with color-stop */
            background: -moz-linear-gradient(top, #eaeaea, #505050 50%, #303030 50%, #404040);
            background: -webkit-gradient(linear, left top, left bottom, from(#eaeaea),
                color-stop(0.5, #505050), color-stop(0.5, #303030), to(#404040));
        }
        /*** navigation controls style: highest z-index ! ***/
        .divDarkBox ul a  {
            padding:5px;
            font-size:22px;
            font-weight:bold;
            color:Yellow;
            text-decoration:none;
            border: solid 1px Gray;
            /* rounded corners */
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            z-index:110;
        }
        /* optional text stamp: 45 Degree */
        .divDarkBox .divDemo  {
            position: absolute;
            top:15%;
            left:0%;
            font-size:4em;
            color:Olive;
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
        }
        /* page footer/header: fixed */
        #footer, #header {
            position:fixed;
            padding:0;
            width:100%;
            height:60px;
            text-align:center;
            background-color:#606060;
            color: #cacaca;
            /* add shadows to text */
            -moz-text-shadow: 10px 3px 4px 6px rgba(10,10,10,0.6);
            -webkit-text-shadow: 3px 4px 6px rgba(10,10,10,0.6);
            text-shadow: 3px 4px 6px rgba(10,10,10,0.6);
        }
        #header {top:0; }
        #footer { bottom:0; line-height: 60px;}
    </style>
</head>

<body>
    <div id="header">
        <h3>APPLE<sup>®</sup> iPAD 2 SLIDE SHOW WITH DARK BOX EFFECT IMPLEMENTED AS PURE CSS 3 SOLUTION (NO JAVASCRIPT)</h3>
    </div>
    <!-- NAV THUMBNAILS -->
    <div id="divThumbnails">
        <ul>
            <li><a href="#divDarkBox1" ><img src="http://www.webinfocentral.com/iPad2/Apple-GEDC3429_small.JPG"
                alt="APPLE® STORE" /></a></li>
            <li><a href="#divDarkBox2" ><img src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3474_small.JPG"
                alt="iPAD 2 PRICING" /></a></li>
            <li><a href="#divDarkBox3" ><img src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3477_small.JPG"
                alt="iCIRCUIT" /></a></li>
            <li><a href="#divDarkBox4" ><img src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3446_small.JPG"
                alt="ZENO-5000" /></a></li>
            <li><a href="#divDarkBox5" ><img src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3453_small.JPG"
                alt="FRACTION CALCULATOR" /></a></li>
            <li><a href="#divDarkBox6" ><img src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3455_small.JPG"
                alt="YOUTUBE PLAYER" /></a></li>
            <li><a href="#divDarkBox7" ><img src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3458_small.JPG"
                alt="SILVERLIGHT" /></a></li>
            <li><a href="#divDarkBox8" ><img src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3465_small.JPG"
                alt="BING MAP" /></a></li>
            <li><a href="#divDarkBox9" ><img src="http://www.webinfocentral.com/iPad2/Prize_Amphora_small.JPG"
                alt="SURPRISE: NY QUIZ" /></a></li>
        </ul>
    </div>
   
    <!--1st SLIDE -->
    <div id="divDarkBox1" class="divDarkBox">
       
        <!--OPTIONAL TEXT 45 DEG-->
        <div class="divDemo">COOL DEMO!</div>
        <div><ul class="navigation">
                <li><a href="#">⊗</a></li> <!--CLOSE SYMBOL-->
                <li><a href="#divDarkBox9">⇦</a></li> <!--BACK ARROW: MOVE BACK|LAST-->
                <li><a href="#divDarkBox2">⇨</a></li> <!--FORWARD ARROW: MOVE NEXT-->
                <li><a href="#divDarkBox9">►▮</a></li> <!--MOVE LAST-->
            </ul>
        </div>
        <div>
            
            <!--FULL SIZE IMAGE: ON CLICK MOVE NEXT-->
            <a href="#divDarkBox2"><img
                src="http://www.webinfocentral.com/iPad2/Apple-GEDC3429.JPG"
                alt="APPLE® STORE IN MANHATTAN NY" /></a>
        </div>
    </div>
    <!--2nd SLIDE -->
    <div id="divDarkBox2" class="divDarkBox">
        <div class="divDemo">iPad 2 PRICING</div>
        <div>
            <ul class="navigation">
                <li><a href="#">⊗</a></li> <!--CLOSE-->
                <li><a href="#divDarkBox1">▮◄</a></li> <!--MOVE FIRST-->
                <li><a href="#divDarkBox1">⇦</a></li> <!--MOVE BACK-->
                <li><a href="#divDarkBox3">⇨</a></li> <!--MOVE NEXT-->
                <li><a href="#divDarkBox9">►▮</a></li> <!--MOVE LAST-->
            </ul>
            <a href="#divDarkBox3"><img
                src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3474.JPG"
                alt="iPAD 2 PRICING MODEL" /></a>
            <h1>iPAD 2 PRICING MODEL STAYS PRETTY MUCH THE SAME, STARTING FROM $499</h1>
        </div>
    </div>
    <!--3rd SLIDE -->
    <div id="divDarkBox3" class="divDarkBox">
        <div class="divDemo">WOW, CIRCUIT!</div>
        <div>
            <ul class="navigation">
                <li><a href="#">⊗</a></li>
                <li><a href="#divDarkBox1">▮◄</a></li> <!--MOVE FIRST-->
                <li><a href="#divDarkBox2">⇦</a></li>
                <li><a href="#divDarkBox4">⇨</a></li>
                <li><a href="#divDarkBox9">►▮</a></li> <!--MOVE LAST-->
            </ul>
            <a href="#divDarkBox4"><img
                src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3477.JPG"
                alt="iCIRCUIT SCHEMATIC DIAGRAM" /></a>
            <h1>iCIRCUIT SCHEMATIC DIAGRAM EDITOR, GREAT APP!</h1>
        </div>
    </div>
    <!--4th SLIDE -->
    <div id="divDarkBox4" class="divDarkBox">
        <div class="divDemo">VERY NICE!</div>
        <div>
            <ul class="navigation">
                <li><a href="#">⊗</a></li>
                <li><a href="#divDarkBox1">▮◄</a></li> <!--MOVE FIRST-->
                <li><a href="#divDarkBox3">⇦</a></li>
                <li><a href="#divDarkBox5">⇨</a></li>
                <li><a href="#divDarkBox9">►▮</a></li>
                <li><a href="../MATH/zeno.htm" target="_blank">LINK</a></li>
            </ul>
            <a href="#divDarkBox5"><img
                src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3446.JPG"
                alt="ZENO-5000" /></a>
            <h1>FREE ONLINE SCIENTIFIC CALCULATOR <strong>ZENO-5000</strong> (TESTING MY STUFF :)</h1>
        </div>
    </div>
    <!--5th SLIDE -->
    <div id="divDarkBox5" class="divDarkBox">
        <div class="divDemo">VERY USEFUL!</div>
        <div>
            <ul class="navigation">
                <li><a href="#">⊗</a></li>
                <li><a href="#divDarkBox1">▮◄</a></li> <!--MOVE FIRST-->
                <li><a href="#divDarkBox4">⇦</a></li>
                <li><a href="#divDarkBox7">⇨</a></li>
                <li><a href="#divDarkBox9">►▮</a></li><!--MOVE LAST-->
                <li><a href="http://www.webinfocentral.com/Mobile/Fractions.aspx"
                    target="_blank">LINK</a></li><!--EXT LINK TO APP-->
            </ul>
            <a href="#divDarkBox6"><img
                src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3453.JPG"
                alt="FRACTION CALCULATOR" /></a>
            <h1>MOBILE ONLINE FRACTION CALCULATOR (ALSO MY STUFF :)</h1>
        </div>
    </div>
    <!--6th SLIDE -->
    <div id="divDarkBox6" class="divDarkBox">
        <div class="divDemo">YouTube Player</div>
        <div>
            <ul class="navigation">
                <li><a href="#">⊗</a></li>
                <li><a href="#divDarkBox1">▮◄</a></li>
                <li><a href="#divDarkBox5">⇦</a></li>
                <li><a href="#divDarkBox7">⇨</a></li>
                <li><a href="#divDarkBox9">►▮</a></li><!--MOVE LAST-->
                <li><a href="http://www.webinfocentral.com/RESOURCES/VideoAudio.aspx"
                    target="_blank">LINK</a></li><!--EXT LINK TO APP-->
            </ul>
            <a href="#divDarkBox7"><img
                src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3455.JPG"
                alt="YOUTUBE PLAYER" /></a>
            <h1>EMBEDDED YOUTUBE PLAYER SEEMINGLY WORKING...</h1>
        </div>
    </div>
    <!--7th SLIDE -->
    <div id="divDarkBox7" class="divDarkBox">
        <div class="divDemo">SILVERLIGHT?</div>
        <div>
            <ul class="navigation">
                <li><a href="#">⊗</a></li>
                <li><a href="#divDarkBox1">▮◄</a></li>
                <li><a href="#divDarkBox6">⇦</a></li>
                <li><a href="#divDarkBox8">⇨</a></li>
                <li><a href="#divDarkBox9">►▮</a></li><!--MOVE LAST-->
            </ul>
            <a href="#divDarkBox8"><img
                src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3458.JPG"
                alt="SILVERLIGHT" /></a>
            <h1>MICROSOFT SILVERLIGHT<sup>®</sup> APPLICATION IS NOT WORKING...</h1>
        </div>
    </div>
    <!--8th SLIDE: -->
    <div id="divDarkBox8" class="divDarkBox">
        <div class="divDemo">MS BING</div>
        <div>
           <ul class="navigation">
                <li><a href="#">⊗</a></li>
                <li><a href="#divDarkBox1">▮◄</a></li>
                <li><a href="#divDarkBox7">⇦</a></li>
                <li><a href="#divDarkBox9">⇨</a></li> <!--MOVE NEXT-->
                <li><a href="#divDarkBox9">►▮</a></li><!--MOVE LAST-->
                <li><a href="http://www.webinfocentral.com/RESOURCES/WeatherMap.aspx"
                    target="_blank">LINK</a></li><!--EXT LINK TO APP-->
            </ul>
            <a href="#divDarkBox9"><img
                src="http://www.webinfocentral.com/iPad2/iPad2-GEDC3465.JPG"
                alt="BING MAP" /></a>
            <h1>MICROSOFT INTERACTIVE BING<sup>®</sup> MAP AND 7-DAY WEATHER FORECAST WORK FINE</h1>
        </div>
    </div>
    <!--9th SLIDE: LAST ONE -->
    <div id="divDarkBox9" class="divDarkBox">
        <div class="divDemo">HAVE FUN!</div>
        <div>
           <ul class="navigation">
                <li><a href="#">⊗</a></li>
                <li><a href="#divDarkBox1">▮◄</a></li> <!--MOVE FIRST-->
                <li><a href="#divDarkBox8">⇦</a></li>
                <li><a href="#divDarkBox1">⇨</a></li> <!--MOVE NEXT-->
                <li><a href="#divDarkBox9">►▮</a></li><!--MOVE LAST-->
                <li><a href="http://exm.nr/NYipad" target="_blank">☺</a></li><!--EXT LINK TO APP-->
            </ul>
            <a href="http://exm.nr/NYipad" target="_blank"><img
                src="http://www.webinfocentral.com/iPad2/Prize_Amphora.JPG"
                alt="New York FUN-QUIZ" /></a>
            <h1>SURPRISE: NEW YORK FUN-QUIZ :)</h1>
        </div>
    </div>
    <div id="footer">
        Copyright© 2011 Infosoft International Inc | Author: Alexander Bell, NY |
        <a href="http://www.webinfocentral.com" target ="_blank" >HOME</a> |
    </div>
</body>
</html>