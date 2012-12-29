<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6 nojs" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 nojs" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 nojs" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9 nojs" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="nojs"> <!--<![endif]-->
<head>
  <meta charset="utf-8">


    <title>Intellectual Property Law - Copyrights</title>
    
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if IE 8 ]> 
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->           
            
<style>
    /*  accordion */
    .panels{
        width:650px;
    }
   
    .panels > h4{
        display:block;
        color:#00aedb;
        padding:20px 55px 0 0; 
        margin:0;
       border-top:1px solid lightgrey;
       clear: both;
        
     }
    
    
    .panelContent {position:relative; height:40px; overflow:hidden; }
    .panelContent > p {height:auto; overflow-y:auto; padding:5px 5px 0 0; margin:0 5px; background-color:white; }
    .panelContent p{margin-top:0;}
    
    
    .readmore{float:right; margin-bottom:20px;}
    
    .nojs .panelContent{height:auto; padding-bottom:20px;}
    .nojs .readmore{display:none;}
/* end accordion */
</style> 



</head>

<body>

  <div id="container">
    <div id="main" role="main">
    

    <div id="content">
        <h1>COPYRIGHTS: Frequently Asked Questions</h1>
        <div class="panels">
            <h4>What is copyright?</h4>
            <div class="panelContent">
            <p>A copyright  protects an original artistic or literary work that is expressed in a tangible medium of expression, but does not protect the idea or inventive concept. Some examples of products that may be copyrighted are: software, websites, poems, stories, books, paintings, maps and building plans.
            </p>
            </div>
            <a class="readmore" href="#" >read more</a>
            
            <h4>What does copyright protect?</h4>
            <div class="panelContent">
               <p> 
               Protects original works of authorship including literary, dramatic, musical, and artistic works, such as poetry, novels, movies, songs, computer software, and architecture. Copyright does not protect facts, ideas, systems, or methods of operation, although it may protect the way these things are expressed. 
               </p>
            </div>
               <a class="readmore" href="#" >read more</a>
               
             <h4>How is a copyright different from a patent or a trademark?</h4>
            <div class="panelContent">
            
               <p> Copyright protects original works of authorship, while a patent protects inventions or discoveries. Ideas and discoveries are not protected by the copyright law, although the way in which they are expressed may be. A trademark protects words, phrases, symbols, or designs identifying the source of the goods or services of one party and distinguishing them from those of others.
               </p>
            
            </div>
             <a class="readmore" href="#" >read more</a>
            
             <h4>When is my work protected?</h4>
            <div class="panelContent">
            
                <p>Your work is under copyright protection the moment it is created and fixed in a tangible form that it is perceptible either directly, or with the aid of a machine or device.
                </p>
            
            </div><a class="readmore" href="#" >read more</a>
            <h4>Do I have to register with the copyright office to be protected?</h4>
            <div class="panelContent">
            
               <p>No. In general, registration is voluntary. Copyright exists from the moment the work is created. You will have to register, however, if you wish to bring a lawsuit for infringement of a U.S. work.  
               </p>
            
            </div><a class="readmore" href="#" >read more</a>
            <h4>Why should I register my work if copyright protection is automatic?</h4>
            <div class="panelContent">
            
             <p>Registration is recommended for a number of reasons. Many choose to register their works because they wish to have their copyright on the public record and a certificate of registration. Registered works may be eligible for statutory damages and attorney's fees in successful litigation. 
                 
             </p>
            
                
            </div><a class="readmore" href="#" >read more</a>
            <h4>I've heard about a "poor man's copyright." What is it?</h4>
            <div class="panelContent">
            
                <p>The practice of sending a copy of your own work to yourself is sometimes called a "poor man's copyright." There is no provision in the copyright law regarding any such type of protection, and it is not a substitute for registration.
                </p>
            
            </div><a class="readmore" href="#" >read more</a>
            
        </div><!-- end panels -->
    
    </div><!--! end of #content -->




    </div><!--! end of #main -->
   
  </div> <!--! end of #container -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> 


<script>
$(function(){
       
    $("html").removeClass("nojs");
    
        
    $('.panels > .readmore').click(function(e){
        e.preventDefault();
        var me = $(this);
        me.toggleClass("moveme");
        
        if (me.hasClass("moveme")) {
            
          me.text("read less"); 
          var h =  me.prev().children("p").outerHeight();
          //h += 30;
          
          me.prev().animate({height:h}, 500).siblings('.panelContent').animate({height:'40px'}, 500);
          me.siblings(".readmore").removeClass("moveme").text("read more");
          
           }else{
               me.prev().animate({height:'40px'}, 500);
               $(".readmore").removeClass("moveme"); 
               me.text("read more");
                }
            });
       
      
          
    $('.panels > .readmore').click(function(e){ 
        e.preventDefault();
     });  
    
 
    
    
});
</script>

</body>
</html>