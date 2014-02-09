<?php
$title = "CSS3 transitions - animated dropdown menu without javascript";
require_once ("sandbox-header.php");
?>

<style>
    

    /* Written by Kyle Hamilton of candpgeneration.com
       CSS3 transitions - animated dropdown menu without javascript that plays nice in IE7+, FF, CHROME, SAFARI
       The original bare bones version can be found at: http://candpgeneration.com/CSS-dropdowns/CSS3-dropdown.html
       You are free to use this code any way you like. 
       Please do not remove this comment. */

    /* the main menu */
    .navigation {
        display:block;
        position:absolute;
        width:600px;
        z-index:1000;

    }
    .navigation > ul{
        display: -webkit-box;
        -webkit-box-orient: horizontal;

        display: -moz-box;
        -moz-box-orient: horizontal;

        display: box;
        -moz-box-orient: horizontal;
    }
    .navigation ul{
        list-style :none;
        margin:0; 
        padding:0; /* gets rid of any inherited margins and padding */
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: normal;
        position:relative;
        z-index:1000;
        width:600px;
    }
    .navigation > ul > li { 
        position : relative;
        float : left;

        font-size: 15px; /* this is here and not above, so that the subs can be made smaller using a % if desired */

        -webkit-box-flex: 1;
        -moz-box-flex: 1;
        box-flex: 1;
    }

    .navigation > ul > li + li{
        margin-left:5px;
    }
    .navigation > ul > li > a {
        background-color: #2c2c2c; /*  grey */
        display:block;
        padding:8px 14px;
        text-decoration:none;
        color:#aaaaaa; 

        /* make the background-color fade in on roll-over */
        -webkit-transition: background-color 0.3s ease;
        -moz-transition: background-color 0.3s ease;
        -o-transition: background-color 0.3s ease;
        -ms-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;


    }
    .navigation > ul > li > a:hover{
        background-color:#666666; /* grey */
        color:#eeeeee; /* light grey */
    }


    /* the show/hide effects */
    /* the drop-down box */

    .navigation ul ul{

        /* background-color:#e6056f;  remove. this is for illustration purposes only */
        width:340px; /* you need a width to accomodate tertiary menus */

        position:absolute;
        z-index:100;

        height: 0;
        overflow: hidden;
        -webkit-transition: height 0.3s ease-in;
        -moz-transition: height 0.3s ease-in;
        -o-transition: height 0.3s ease-in;
        -ms-transition: height 0.3s ease-in;
        transition: height 0.3s ease-in;
    }


    /* don't display tertiary box yet */
    .navigation > ul > li:hover ul ul, .navigation > ul > li > a:hover ul ul{
        height:0;

    }
    /* tertiary drop-down box */
    .navigation ul ul ul{
        left:170px;
        width:170px;
    }

    .navigation > ul > li:hover ul, .navigation > ul > li > a:hover ul,
    .navigation ul ul li:hover > ul, .navigation ul ul li a:hover > ul{
        height:220px;

    }

    /* drop-down item styles */
    .navigation ul ul li{
        background-color:#eaeaea; /* grey */
        width:170px;

        /* make the background-color fade in on roll-over */
        -webkit-transition: background-color 0.3s ease;
        -moz-transition: background-color 0.3s ease;
        -o-transition: background-color 0.3s ease;
        -ms-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;

    }
    /* unfortunate ie7 gap fix */
    .ie7 .navigation ul ul li{
        margin-bottom:-3px;
    }
    .navigation ul ul li:hover {
        background-color:#999;
    }




    .navigation ul ul li a {
        display:block;
        text-decoration:none;
        margin:0 12px;
        padding:5px 0;
        color:#4c4c4c; /* grey */

    }

    /* The following six rules set the lines in between menu items.
       To make this play nice in IE, we will not be using nth-child
       but the "+" sibling slector.
    */
    .navigation ul ul ul li a{
        border:none !important;
    }
    .navigation ul ul ul li + li a{
        border-top:1px dotted #999 !important;
    }
    .navigation ul ul li + li a{
        border-top:1px dotted #999;
    }
    .navigation ul ul li:hover + li a{
        border-top:1px solid #eaeaea;
    }
    .navigation ul ul ul li:hover + li a{
        border: 0 !important;
    }
    .navigation ul ul ul li:hover + li{
        border-top:1px solid #999 !important;
    }


    .navigation ul ul li a:hover, .navigation ul ul li:hover > a {
        color:#ffffff; /* white */

    }

    /* ************************** Gallery ************************************* */
    .item
    {
        width:600px;
        height:475px;
        background:url(images/church-and-state.jpg);
        background-repeat:no-repeat;
        position:absolute;
        animation:fader 17s cubic-bezier(.9, 1, .001, 1.0) infinite;
        -moz-animation:fader 17s cubic-bezier(.9, 1, .001, 1.0) infinite; /*Firefox*/
        -webkit-animation:fader 17s cubic-bezier(.9, 1, .001, 1.0) infinite; /*Safari and Chrome*/
    }

    @keyframes fader
    {

        0%   {background:url(../CSS-dropdowns/images/church-and-state.jpg);}
    25%  {background:url(../CSS-dropdowns/images/church-and-state2.jpg);}
    50%  {background:url(../CSS-dropdowns/images/soul2.jpg);}
    75%  {background:url(../CSS-dropdowns/images/church-and-state3.jpg);}
    100% {background:url(../CSS-dropdowns/images/church-and-state.jpg);}

    }


    @-moz-keyframes fader /*Firefox*/
    {
        0%   {background:url(../CSS-dropdowns/images/church-and-state.jpg);}
    25%  {background:url(../CSS-dropdowns/images/church-and-state2.jpg);}
    50%  {background:url(../CSS-dropdowns/images/soul2.jpg);}
    75%  {background:url(../CSS-dropdowns/images/church-and-state3.jpg);}
    100%  {background:url(../CSS-dropdowns/images/church-and-state.jpg);}
    }

    @-webkit-keyframes fader /*Safari and Chrome*/
    {
        0%   {background:url(../CSS-dropdowns/images/church-and-state.jpg);}
    25%  {background:url(../CSS-dropdowns/images/church-and-state2.jpg);}
    50%  {background:url(../CSS-dropdowns/images/soul2.jpg);}
    75%  {background:url(../CSS-dropdowns/images/church-and-state3.jpg);}
    100%  {background:url(../CSS-dropdowns/images/church-and-state.jpg);}
    }

    /* *************************************************************** */

    .arrow{background:url(../CSS-dropdowns/arrow.png) right center no-repeat;}
    .header{width: 600px; height:50px; background-color: white;}
    .content{position:relative; width: 600px; height:500px; color:white; background-color: white; overflow:hidden;}
    /*        .item{position:absolute; top:50px; left:20px; width: 400px; height:400px; background-color: grey;}*/


</style>

<h1>Look Ma! No Javascript!</h1>
<h2>CSS3 drop-down menus</h2> 
<p><em>The CSS3 slideshow below only works in Chrome.<br/>
        Everybody else gets a still image.</em></p>
<div class="header">
    <div class="navigation">
        <ul>
            <li><a href="#">Once</a>
                <ul>
                    <li><a href="#">Lions</a></li>
                    <li><a href="#">And Tigers</a></li>
                    <li><a href="#">And Bears</a></li>
                    <li><a href="#">Oh My!</a></li>
                </ul>
            </li>
            <li><a href="#">Upon</a>
                <ul>
                    <li>
                        <ul>
                            <li><a href="#">Apples</a></li>
                            <li><a href="#">Pears</a></li>
                            <li><a href="#">Oranges</a></li>
                            <li><a href="#">Dragon Fruit</a></li>
                            <li><a href="#">Pineapple</a></li>
                        </ul>
                        <a href="#" class="arrow">All</a>

                    </li>
                    <li>
                        <ul>
                            <li><a href="#">Lions</a></li>
                            <li><a href="#">Tigers</a></li>
                            <li><a href="#">Bears</a></li>
                            <li><a href="#">Elephants</a></li>
                            <li><a href="#">Grandma</a></li>
                        </ul>
                        <a href="#" class="arrow">Students</a></li>
                    <li>
                        <ul>
                            <li><a href="#">Little</a></li>
                            <li><a href="#">Dragons</a></li>
                            <li><a href="#">Play</a></li>
                            <li><a href="#">With</a></li>
                            <li><a href="#">Matches</a></li>
                        </ul>
                        <a href="#" class="arrow">Take</a></li>
                    <li><a href="#">Calculus</a></li>
                </ul>
            </li>
            <li><a href="#">A Time</a></li>
            <li><a href="#">Last Night</a></li>
        </ul>
    </div> <!-- navigation -->
</div><!-- header -->


<div class="content">

    <div class="item">
    </div>

</div>
<div class="tut">
    <div class="first">
        <h2 class="subtitle">The Drop-down menus<br/>
            HOW TO:</h2>
        <p><em>[ For the slideshow, view source ]</em></p>
        We're going to be using CSS3 transitions to make the menus slide down gently, and the background colors fade softly in and out.<br><br>This is a barebones multi-level drop down menu made entirely in CSS, that plays nice in all browsers and degrades gracefully to regular CSS2 hover effects in IE.<br><br>We're also going to address a couple of typical layout challenges in IE. <br><br>The goal of this tutorial is to provide only the most fundamental code necessary for the implementation of the drop-down menu, which can then be used as a template for styling to your heart's content.<br><br>[We will not be using the usual display:none, display:block technique, so don't look for it]<br><br><b>Step 1.</b><br>Let's set up our html. We're going to put our menu inside a header, and we're also going to create a "content" area below the header. <br><br><b>A little explanation:</b><br><i>This part of the process addresses IE's stacking order, and will ensure that our menu doesn't render behind the Content area, an issue I have seen often. A typical scenario is to have some kind of image scroller under the header, which requires the scroller container to have relative positioning, and causing the menu to render behind the scroller in IE. In order to fix this, our Header MUST must have position:static.</i><br><br>
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-1">&lt;!DOCTYPE HTML&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
&lt;meta  charset="UTF-8" /&gt;
&lt;title&gt;CSS3 Horizontal sliding menu&lt;/title&gt;
&lt;style&gt;
.header{
	width: 600px; 
	height:50px; 
	border:1px dotted grey;
}
.content{
	position:relative; 
	width: 600px; 
	height:500px; 
	color:white; 
	background-color: #e6056f; 
	overflow:hidden;
	}
.item{
	position:absolute; 
	top:50px; 
	left:20px; 
	width: 600px; 
	height:400px; 
	background-color: grey;
	}
&lt;/style&gt;
&lt;body&gt;
    &lt;div class="header"&gt;
        &lt;div class="navigation"&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    
    &lt;div class="content"&gt;
    	&lt;div class="item"&gt;
    	&lt;/div&gt;
    &lt;/div&gt;

&lt;/body&gt;
&lt;/html&gt;</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br><br><b>Step 2.</b><br>We're going to use an unordered list to create the menu structure and place it inside the navigation div:<br>(make sure you replace the #'s with actual links, for example: <i>&lt;a href="#"&gt;</i> becomes <i>&lt;a href="mypage.html"&gt;</i>)<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-2">&lt;ul&gt;
                &lt;li&gt;&lt;a href="#"&gt;Main - 1&lt;/a&gt;
                    &lt;ul&gt;
                        &lt;li&gt;&lt;a href="#"&gt;Level 2 - 1&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a href="#"&gt;Level 2 - 2&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a href="#"&gt;Level 2 - 3&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a href="#"&gt;Level 2 - 4&lt;/a&gt;&lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/li&gt;
                &lt;li&gt;&lt;a href="#"&gt;Main - 2&lt;/a&gt;
                    &lt;ul&gt;
                        &lt;li&gt;
                            &lt;ul&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 1&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 2&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 3&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 4&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 5&lt;/a&gt;&lt;/li&gt;
                            &lt;/ul&gt;
                            &lt;a href="#"&gt;Level 2 - 1&lt;/a&gt;
                        &lt;/li&gt;
                        &lt;li&gt;
                            &lt;ul&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 1&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 2&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 3&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 4&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 5&lt;/a&gt;&lt;/li&gt;
                            &lt;/ul&gt;
                            &lt;a href="#"&gt;Level 2 - 2&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;
                            &lt;ul&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 1&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 2&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 3&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 4&lt;/a&gt;&lt;/li&gt;
                                &lt;li&gt;&lt;a href="#"&gt;Level 3 - 5&lt;/a&gt;&lt;/li&gt;
                            &lt;/ul&gt;
                            &lt;a href="#"&gt;Level 2 - 3&lt;/a&gt;&lt;/li&gt;
                        &lt;li&gt;&lt;a href="#"&gt;Level 2 - 4&lt;/a&gt;&lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/li&gt;
                &lt;li&gt;&lt;a href="#"&gt;Main - 3&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="#"&gt;Main - 4&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br><br><b>Step 3.</b><br>To position the menu horizontally we'll use float:left on the menu items and a couple of basic styles to make it presentable:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-3">.navigation {
            width:600px;
        }
        .navigation ul{
        /* positioning */
        	position:relative;
            z-index:1000;
        /* remove the dots next to list items: */
            list-style:none; 
        /* get rid of any default or inherited margins and padding: */
            margin:0; 
            padding:0; 
            
        /* styling: */
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: normal;
            font-size: 15px;
        }
        
        /* we're using the direct descendant selectors &gt; to ONLY affect the main menu items */
        .navigation &gt; ul &gt; li {
        /* positioning */ 
            position: relative;
            float: left;
        /* styling: */
            margin-right: 10px;
        }
        .navigation &gt; ul &gt; li &gt; a {
        /* positioning */ 
            display:block;
        /* styling: */
            background-color: #2c2c2c; /*  grey */
            padding:8px 14px;
            text-decoration:none;
            color:#aaaaaa; 
            
        }
        .navigation &gt; ul &gt; li &gt; a:hover{
        /* styling: */
            background-color:#666666; /* grey */
            color:#eeeeee; /* light grey */
        }</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br>&nbsp; &nbsp; &nbsp; &nbsp; <br><b>Step 4.</b><br>The drop-down boxes. We are going to apply the same styles to secondary and tertiary drop-downs, but you can choose to add additional styles to differentiate them.<br><br>&nbsp; &nbsp; &nbsp; &nbsp; 
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-4">.navigation ul ul{
            
            background-color:#e6056f; /* remove. this is for illustration purposes only */
            width:340px; /* you need a width to accommodate tertiary menus */
            
            position:absolute;
            z-index:100;
            
            height: 0;
            overflow: hidden;
        }
        

        /* don't display tertiary box yet */
        .navigation &gt; ul &gt; li:hover ul ul, .navigation &gt; ul &gt; li &gt; a:hover ul ul{
            height:0;
            
        }
        /* tertiary drop-down box */
        .navigation ul ul ul{
            left:170px;
            width:170px;
        }
        
        .navigation &gt; ul &gt; li:hover ul, .navigation &gt; ul &gt; li &gt; a:hover ul,
        .navigation ul ul li:hover &gt; ul, .navigation ul ul li a:hover &gt; ul{
            height:220px; /* need a height to accommodate any tertiary menus */
        }
        
        /* drop-down item styles */
        /* if you want different styling for tertiary menus, just copy the 4 rules below and insert an additional ul: for example: ".navigation ul ul li", becomes: ".navigation ul ul ul li" */
        
        .navigation ul ul li{
            background-color:#eaeaea; /* grey */
            width:170px;
        }
        
        .navigation ul ul li:hover {
            background-color:#999; /* grey */
        }
        
        .navigation ul ul li a {
            display:block;
            text-decoration:none;
            margin:0 12px;
            padding:5px 0;
            color:#4c4c4c; /* grey */
        }
        .navigation ul ul li a:hover, .navigation ul ul li:hover &gt; a {
            color:#ffffff; /* white */
        }</code>
                </pre>
            </div>
        </div>

    </div>
    <div>
        <br>&nbsp; &nbsp; &nbsp; &nbsp; <br><b>Step 5 - optional</b><br>I like to have separator lines between menu items, but only BETWEEN menu items. And I don't want them to go all the way to the edges of the drop-down box either, which means more CSS tweaking, but I think it looks nicer. <br><br>Normally we could use :last-child to remove the last line in the list, but since IE doesn't recognize :last-child, we'll use the + selector instead. The following rules insert lines between each menu item, and make sure we don't have any extraneous unwanted lines either. It's a little hairy to get your head around at first, but it works across the board. And since the lines don't go all the way to the edges, it also makes sure there are no weird gaps when you hover over an item.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-5">.navigation ul ul ul li a{
            border:0 !important;
        }
        .navigation ul ul ul li + li a{
            border-top:1px dotted #999 !important;
        }
        .navigation ul ul li + li a{
            border-top:1px dotted #999;
        }
        .navigation ul ul li:hover + li a{
            border-top:1px solid #eaeaea;
        }
        .navigation ul ul ul li:hover + li a{
            border: 0 !important;
        }
        .navigation ul ul ul li:hover + li{
            border-top:1px solid #999 !important;
        }</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br>&nbsp; &nbsp; &nbsp; &nbsp; <br><b>Step 6.<br>THE MAGIC</b><br><br>So by now you should have a plain vanilla CSS drop-down menu. Let's add the magic.<br>It's actually going to be really easy. <br><br>Add these properties to the <i>.navigation ul ul</i> rule:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-6">-webkit-transition: height 0.3s ease-in;
            -moz-transition: height 0.3s ease-in;
            -o-transition: height 0.3s ease-in;
            -ms-transition: height 0.3s ease-in;
            transition: height 0.3s ease-in;</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br><br>And these, to the <i>.navigation ul ul li</i> rule:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-7">-webkit-transition: background-color 0.3s ease;
            -moz-transition: background-color 0.3s ease;
            -o-transition: background-color 0.3s ease;
            -ms-transition: background-color 0.3s ease;
            transition: background-color 0.3s ease;</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br>&nbsp; &nbsp; <br><b>Step 7</b>.<br>Just one more thing if you care about IE 7.<br><br>To remove the gaps between menu items in IE 7, I'm going to add some conditional statements into the top of the file:<br><br>Replace these two lines<br>
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-8">&lt;!DOCTYPE HTML&gt;
&lt;html lang="en"&gt;</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br>&nbsp;at the top of your file with this:<br>
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-9">&lt;!DOCTYPE HTML&gt;
&lt;!--[if lt IE 7 ]&gt; &lt;html class="ie6" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 7 ]&gt;    &lt;html class="ie7" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 8 ]&gt;    &lt;html class="ie8" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if (gte IE 9)|!(IE)]&gt;&lt;!--&gt; &lt;html lang="en"&gt; &lt;!--&lt;![endif]--&gt;</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br><br>and add this rule to the css:<br><br>
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-10">/* unfortunate ie7 gap fix */
        .ie7 .navigation ul ul li{
            margin-bottom:-3px;
        }</code>
                </pre>

            </div>
        </div>

    </div>
    <div>
        <br>&nbsp; &nbsp;<br><b>That's it!</b><br><br><b>An optional enhancement:</b><br>I'm going to add a little arrow to the items that have tertiary menus:<br><br>make an arrow.png graphic, and add this rule to your css:<br>
    </div>
    <div class="attachment embedded">
        <div class="snippet">
            <div>
                <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10316-11">.arrow{background:url(arrow.png) right center no-repeat;}</code>
                </pre>
                <pre class="line-numbers">1:
                </pre>
            </div>
        </div>

    </div>
    <div>
        &nbsp;<br><br>add the arrow class to the links that have tertiary menus:<br>ie: &lt;a href="#" class="arrow"&gt;Level 2 - 1&lt;/a&gt; &nbsp; <br><br>Also, you'll want to remove the background-color in <i>.navigation ul ul</i>. It was meant for illustration purposes only.<br><br>Enjoy!<br><br>The file is here for your perusal (view source):<br>
    </div>

</div>
<?php

require_once ("sandbox-footer.php");
?>