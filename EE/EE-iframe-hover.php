
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="http://dl.dropbox.com/u/5594292/iframe_test/css/megamenu.css" type="text/css" media="screen" /><!-- Menu -->
    <script type="text/javascript" src="http://dl.dropbox.com/u/5594292/iframe_test/js/jquery.js"></script>
    <script type="text/javascript" src="js/mobile.js"></script>
    <style>
        #theFrame{
            display:none;
            position:absolute;
            width:670px;
            height:620px;
            background-color: #4592FA;
            right:18px;
            top:33px;
            -webkit-border-radius:5px 0 5px 5px;
            -moz-border-radius:5px 0 5px 5px;
            border-radius:5px 0 5px 5px;
            border: 1px solid #444;
            z-index:100;
        }

        .dropFrameHover{
            background-color: #4c9cff !important;
            border-top:1px solid #444444;
            border-left:1px solid #444444;
            border-right:1px solid #444444;
            -webkit-border-radius:5px 5px 0 0;
            -moz-border-radius:5px 5px 0 0;
            border-radius:5px 5px 0 0;
            margin:4px -1px 0 0 !important;
            text-shadow: none !important;
        }
        .dropFrame{
            background: url("http://dl.dropbox.com/u/5594292/iframe_test/img/arrow_down1.png") no-repeat right 13px;
            color: black;
            font-weight: bold;
            outline: 0;
            padding: 5px 30px 3px 10px;
            margin-top:5px;
            right:19px;
            text-decoration: none;
            display: block;
            text-shadow: 1px 1px 1px #FF8B8B;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 21px;
            text-align: left;
            z-index:1000;
            position:absolute;
            cursor:pointer;
        }
        #showFrame{
            float:right;
        }
    </style>
    <script>
        $(function(){
            $("#showFrame").mouseenter(function(){
                $("#theFrame").show();
                $(".dropFrame").addClass("dropFrameHover");
       
            }).mouseleave(function(){
                $("#theFrame").hide();
                $(".dropFrame").removeClass("dropFrameHover");
            });











        });

    </script>
    <title>Iframe Test</title>

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="css/ie/ie.css" />
    <![endif]-->

</head>
<body>

    <div class="wrapper_menu menu_light_theme">
        <ul class="menu menu_red">   
            <li><a href="#" class="drop">Home</a>
                <div class="dropdown_2columns">
                    <div class="col_2 firstcolumn">
                        <div style="height:500px; color:#FFFFFF; font-size:100px; font-weight:bold; text-align:center; padding-top:30px;">Home</div>                               
                    </div>
                </div>
            </li>
            <li></li>
            <div id="showFrame">
                <div id="theFrame" class="">
                    <div style="height:650px; color:#FFFFFF; font-size:100px; font-weight:bold; text-align:center; padding-top:10px;">
                        <iframe width="650" height="600" frameborder="0" scrolling="auto" marginheight="0" marginwidth="0" src="http://lowpriceskates.info/open.php"></iframe>
                    </div>
                
                </div>
                <span class="dropFrame">Contact</span>
            </div>
        </ul>
    </div>

</body>
</html>
