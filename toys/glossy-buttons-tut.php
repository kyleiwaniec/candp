<?php
$next = "throbbing-heart.php";
$prev = "CSS3-dropdown-tut.php";
$title = "Glossy Buttons - Easy Reusable CSS";
require_once ("sandbox-header.php");
?>

<style>

    .first   .subtitle{
        color:black;
        padding-top:15px;
    }
    strong{
        color:#ff0066;
    }

    button, .glossy-button{
        font-family: helvetica, arial, sans-serif;
        font-size:14px;
        letter-spacing: 1px;
        text-transform: capitalize;
        line-height:30px;
        height:30px;
        color:#fff;
        cursor:pointer;
        display: inline-block;
        width:auto;
        text-decoration:none !important;

        position: static;
        /* these rules for the button press effect */
        padding-top:1px;
        padding-bottom:2px;

        margin-top:-1px;
        margin-bottom:1px;

        padding-left:10px;
        padding-right:10px;

        margin-left:-1px;
        margin-right:1px;

        /* default background-color */

        background-color: #010732;

        /* the mighty gradient */

        background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255, 255, 255, 0.6)), color-stop(0.49, rgba(255, 255, 255, 0.3)), color-stop(0.51, rgba(255, 255, 255, 0.0)), to(rgba(255, 255, 255, 0.2))); /* Chrome,Safari4+ */
        background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Chrome10+,Safari5.1+ */
        background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* FF3.6+ */
        background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Opera11.10+ */
        background-image: linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* W3C */


        /* some nice roundy corners */
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -o-border-radius: 5px;
        border-radius: 5px;

        /* for links in chrome */
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -o-box-sizing: border-box; 
        box-sizing: border-box; 


        /* a very subtle drop-shadow that ehances the pressed button effect */
        -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.30);
        -moz-box-shadow:    1px 1px 3px rgba(0, 0, 0, 0.30);
        box-shadow:         1px 1px 3px rgba(0, 0, 0, 0.30); 

        /* remove any inherited or default borders - especially important for the <button> element*/
        border: 0 !important;

        /* a subtle text inset effect which will also help to enhance the pressed button effect */
        text-shadow:  rgba(255, 255, 255, 0.1) -1px 0, rgba(0, 0, 0, 0.3) 1px 1px;


        /* and of course a little animated background-color fade effect */

        -webkit-transition: background-color 0.3s ease;
        -moz-transition: background-color 0.3s ease;
        -o-transition: background-color 0.3s ease;
        -ms-transition: background-color 0.3s ease;
        transition: background-color 0.3s ease;

    }

    /* submit and reset buttons */
    input.glossy-button{
        vertical-align: middle;
        line-height: normal !important;
        padding-bottom: 0;
    }
    /* remove ugly dotted border */
    :focus{
        outline:none;
        border:0;
    }
    ::-moz-focus-inner{
        border:0;
    }

    /* the colors */

    .pinkish:hover{
        background-color: #Ff3366;
    }
    .lime:hover{
        background-color: #59b606;
    }
    .blue:hover{
        background-color: #027bbf;
    }
    .coffee:hover{
        background-color: #832f02;
    }
    .strawberry:hover{
        background-color: #f92020;
    }
    .dark:hover{
        background-color: #000000;
    }

    /* when pressed */
    button:active, .glossy-button:active{
        background-color: #333333;
        border-color: #333333;
        color:#eeeeee;

        padding-top:0;
        padding-bottom:0;

        margin-top:0;
        margin-bottom:0;

        padding-left:10px;
        padding-right:10px;

        margin-left:0;
        margin-right:0;

        box-shadow: none;

        text-shadow: rgba(0, 0, 0, 0.4) 0 -1px, rgba(255, 255, 255, 0.3) 0 1px;
        color:rgba(255, 255, 255, 0.9);

    } 

    .ie9 button:active{
        padding-top:0;
        padding-bottom:2px;

        margin-top:-1px;
        margin-bottom:0;

        padding-left:10px;
        padding-right:10px;

        margin-left:-1px;
        margin-right:0;

        border-top:1px solid white !important;
        border-left:1px solid white !important;

        height:31px;

        border-radius: 5px;
    }


    .ie button, .ie .glossy-button {
        background-image:url(../images/butt-bg_slither.png);
        background-repeat: repeat-x;
        background-position:center center;

    }   
    .ie8 button, .ie8 .glossy-button {
        border:1px solid #ccc !important;
        height:32px;
    }
    .ie7 button{
        height:31px;
    }
    .ie7 .glossy-button{
        height:28px;
    }
    .ie7 .glossy-button:active{
        padding-bottom: 2px;

    }

</style>



<p>buttons: &lt;button&gt;</p><p> <button class="pinkish">Pink</button>&nbsp;<button class="dark">midnight</button>&nbsp;<button class="lime">Lime</button>&nbsp;<button class="blue">blue</button>&nbsp;<button class="coffee">coffee</button>&nbsp;<button class="strawberry">strawberry</button></p>
<p>links: &lt;a href="#"&gt;</p><p><a href="#" class="glossy-button pinkish">Pink</a> <a href="#" class="glossy-button dark">midnight</a> <a href="#" class="glossy-button lime">lime</a> <a href="#" class="glossy-button blue">blue</a> <a href="#" class="glossy-button coffee">coffee</a> <a href="#" class="glossy-button strawberry">strawberry</a> </p>
<p>inputs: &lt;input&gt;</p><p><input type="submit" class="glossy-button lime" value="submit"> <input type="reset" class="glossy-button blue" value="reset"></p>
<div class="first">
    <h2 class="subtitle">Glossy Buttons Using Gradients<br/>
        HOW TO:</h2>
    There are lots of services that will generate fancy gradients for the plethora of browsers out there. However, if you want to change your color scheme you usually have recreate those gradients from scratch in a more or less trial and error manner.<br><br>This tutorial will demonstrate how to make just one gradient that you can use over and over again. <strong>We're going to separate the gradient from the color</strong>.<br><br>In order to demonstrate, we're going to make some buttons. <strong>We'll also normalize the appearance of the buttons so you can use any element</strong>, like &lt;button&gt;, &lt;a&gt;, or &lt;input&gt; and our buttons will all look the same. And to make IE behave, we'll add some IE specific rules and use a 1 pixel background-image. You'll still be able to adjust colors in a single line of CSS in the same way as with the gradients.<br><br><b>Step 1 - The HTML </b><br>Let's set up a nice neat new HTML file with some conditional statements at the top, so we can target a bunch of versions of IE as needed.<br>
</div>
<div class="attachment embedded">
    <div class="snippet">
        <div>
            <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10340-1">&lt;!DOCTYPE HTML&gt;
&lt;!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --&gt;
&lt;!--[if lt IE 7]&gt; &lt;html class="no-js ie6 ie" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 7]&gt;    &lt;html class="no-js ie7 ie" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 8]&gt;    &lt;html class="no-js ie8 ie" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if IE 9 ]&gt;   &lt;html class="no-js ie9 ie" lang="en"&gt; &lt;![endif]--&gt;
&lt;!--[if gt IE 9]&gt;&lt;!--&gt; &lt;html class="no-js" lang="en"&gt; &lt;!--&lt;![endif]--&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;Glossy Buttons&lt;/title&gt;
        &lt;style&gt;&lt;/style&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;/body&gt;
&lt;/html&gt;</code>
            </pre>
        </div>
    </div>

</div>
<div>
    <br><b>Step 2 - The Elements </b><br>We'll add some buttons. Make a row of buttons &lt;button&gt;, a row of links &lt;a&gt;, and a row of inputs &lt;input&gt;. The trick will be to make all the different types of elements look and behave (almost) exactly the same. Most people, namely non-developers or designers, won't even see the "almost" part. Inside the &lt;body&gt; tag, insert:<br>
</div>
<div class="attachment embedded">
    <div class="snippet">
        <div>
            <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10340-2">&lt;p&gt;buttons: &amp;lt;button&amp;gt;&lt;/p&gt;&lt;p&gt; &lt;button class="pinkish"&gt;Pink&lt;/button&gt;&amp;nbsp;&lt;button class="dark"&gt;midnight&lt;/button&gt;&amp;nbsp;&lt;button class="lime"&gt;Lime&lt;/button&gt;&amp;nbsp;&lt;button class="blue"&gt;blue&lt;/button&gt;&amp;nbsp;&lt;button class="coffee"&gt;coffee&lt;/button&gt;&amp;nbsp;&lt;button class="strawberry"&gt;strawberry&lt;/button&gt;&lt;/p&gt;
                &lt;p&gt;links: &amp;lt;a href="#"&amp;gt;&lt;/p&gt;&lt;p&gt;&lt;a href="#" class="glossy-button pinkish"&gt;Pink&lt;/a&gt; &lt;a href="#" class="glossy-button dark"&gt;midnight&lt;/a&gt; &lt;a href="#" class="glossy-button lime"&gt;lime&lt;/a&gt; &lt;a href="#" class="glossy-button blue"&gt;blue&lt;/a&gt; &lt;a href="#" class="glossy-button coffee"&gt;coffee&lt;/a&gt; &lt;a href="#" class="glossy-button strawberry"&gt;strawberry&lt;/a&gt; &lt;/p&gt;
                &lt;p&gt;inputs: &amp;lt;input&amp;gt;&lt;/p&gt;&lt;p&gt;&lt;input type="submit" class="glossy-button lime" value="submit"&gt; &lt;input type="reset" class="glossy-button blue" value="reset"&gt;&lt;/p&gt;</code>
            </pre>

        </div>
    </div>

</div>
<div>
    <br><b>Step 3 - The main CSS </b><br>We'll make one rule for the button element and our .glossy-button class, that resets a bunch of default appearances. And we'll make another rule that adds some additional properties to input elements that have the .glossy-button class. Insert inside the &lt;style&gt; tag:<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
</div>
<div class="attachment embedded">
    <div class="snippet">
        <div>
            <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10340-3">button, .glossy-button{
                font-family: helvetica, arial, sans-serif;
                font-size:14px;
                letter-spacing: 1px;
                text-transform: capitalize;
                line-height:30px;
                height:30px;
                color:#fff;
                cursor:pointer;
                display: inline-block;
                width:auto;
                text-decoration:none !important;
                
                position: static;
                /* these rules for the button press effect */
                padding-top:1px;
                padding-bottom:2px;

                margin-top:-1px;
                margin-bottom:1px;

                padding-left:10px;
                padding-right:10px;

                margin-left:-1px;
                margin-right:1px;
                
                /* default background-color */

                background-color: #010732;
                
                /* the mighty gradient */

                background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255, 255, 255, 0.6)), color-stop(0.49, rgba(255, 255, 255, 0.3)), color-stop(0.51, rgba(255, 255, 255, 0.0)), to(rgba(255, 255, 255, 0.2))); /* Chrome,Safari4+ */
                background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Chrome10+,Safari5.1+ */
                background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* FF3.6+ */
                background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* Opera11.10+ */
                background-image: linear-gradient(top, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0.0) 51%, rgba(255, 255, 255, 0.2) 100%); /* W3C */

                        
                /* some nice roundy corners */
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                -o-border-radius: 5px;
                border-radius: 5px;
                
                /* for links in chrome */
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -o-box-sizing: border-box; 
                box-sizing: border-box; 
                
                
                /* a very subtle drop-shadow that ehances the pressed button effect */
                -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.30);
                -moz-box-shadow:    1px 1px 3px rgba(0, 0, 0, 0.30);
                box-shadow:         1px 1px 3px rgba(0, 0, 0, 0.30); 

                /* remove any inherited or default borders - especially important for the &lt;button&gt; element*/
                border: 0 !important;

                /* a subtle text inset effect which will also help to enhance the pressed button effect */
                text-shadow:  rgba(255, 255, 255, 0.1) -1px 0, rgba(0, 0, 0, 0.3) 1px 1px;
                
                
                /* and of course a little animated background-color fade effect */

                -webkit-transition: background-color 0.3s ease;
                -moz-transition: background-color 0.3s ease;
                -o-transition: background-color 0.3s ease;
                -ms-transition: background-color 0.3s ease;
                transition: background-color 0.3s ease;

            }
/* submit and reset buttons */
            input.glossy-button{
                vertical-align: middle;
                line-height: normal !important;
                padding-bottom: 0;
            }
/* remove ugly dotted border */
            :focus{
                outline:none;
            }
            ::-moz-focus-inner{
                border:0;
            }</code>
            </pre>

        </div>
    </div>

</div>
<div>
    <br><br><b>Step 4 - The Colors </b><br>I chose for my buttons to change color as I hover over them. But you can change these to display whatever colors you like automatically.<br>
</div>
<div class="attachment embedded">
    <div class="snippet">
        <div>
            <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10340-4">/* the colors */
            
            .pinkish:hover{
                background-color: #Ff3366;
            }
            .lime:hover{
                background-color: #59b606;
            }
            .blue:hover{
                background-color: #027bbf;
            }
            .coffee:hover{
                background-color: #832f02;
            }
            .strawberry:hover{
                background-color: #f92020;
            }
            .dark:hover{
                background-color: #000000;
            }</code>
            </pre>

        </div>
    </div>

</div>
<div>
    <br><br><b>Step 5 - Pressed button rules</b> <br>Adjust the margin and padding to create a "physically" pressed button on click.<br>
</div>
<div class="attachment embedded">
    <div class="snippet">
        <div>
            <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10340-5">/* when pressed */
            button:active, .glossy-button:active{
                background-color: #333333;
                border-color: #333333;
                color:#eeeeee;
                
                padding-top:0;
                padding-bottom:0;

                margin-top:0;
                margin-bottom:0;

                padding-left:10px;
                padding-right:10px;

                margin-left:0;
                margin-right:0;
                
                box-shadow: none;
                
                text-shadow: rgba(0, 0, 0, 0.4) 0 -1px, rgba(255, 255, 255, 0.3) 0 1px;
                color:rgba(255, 255, 255, 0.9);

            } </code>
            </pre>

        </div>
    </div>

</div>
<div>
    <br><b>Step 6 - Necessary Adjustments for IE7, 8, and 9</b><br>
</div>
<div class="attachment embedded">
    <div class="snippet">
        <div>
            <pre class="code prettyprint"><code id="viewArticleContentInlineCode30-10340-6">.ie9 button:active{
                padding-top:0;
                padding-bottom:2px;

                margin-top:-1px;
                margin-bottom:0;

                padding-left:10px;
                padding-right:10px;

                margin-left:-1px;
                margin-right:0;
                
                border-top:1px solid white !important;
                border-left:1px solid white !important;
                
                height:31px;
                
                border-radius: 5px;
            }
            

            .ie button, .ie .glossy-button {
                background-image:url(images/butt-bg_slither.png);
                background-repeat: repeat-x;
                background-position:center center;

            }   
            .ie8 button, .ie8 .glossy-button {
                border:1px solid #ccc !important;
                height:32px;
            }
            .ie7 button{
                height:31px;
            }
            .ie7 .glossy-button{
                height:28px;
            }
            .ie7 .glossy-button:active{
                padding-bottom: 2px;
            }</code>
            </pre>

        </div>
    </div>

</div>
<div>
    <br><br>IE7 does leave a little to be desired, but let's hope we don't see much more of IE7.<br><br>Enjoy!
</div>


<?php

require_once ("sandbox-footer.php");
?>
