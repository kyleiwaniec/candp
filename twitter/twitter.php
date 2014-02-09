<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title></title>
    <style>
      body, html{
        background: #eeeeee;
        padding:25px;
      }
      *{font:12px/20px Helvetica; color:#444444;}
      a{color:hotpink;}
      .profilePic{width:50px; height:50px; border:1px solid #fff; outline:3px solid #cccccc; float:left; margin:0 20px 0 0;}
      .entry{width:400px; padding:25px; border:1px dotted #ccc; outline:3px solid white; margin-bottom:25px; overflow:hidden; background: #ffffff;}
      .content{float:left; width:300px;}
    </style>
    
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>
     $(function(){
       var twit = $("#twitterContent");
       
     $("form").submit(function(e){
         e.preventDefault();
         var searchterm = $("input[name='findSomething']").val();
         
            $.post("search_twitter.php", {search:searchterm}, function(data){
              twit.html(data);
              //var twits = data;
              
              
              
             });
       }).trigger("submit");
       
       
         
     });
    </script>
  </head>
  <body>
    <form>
    <input type="text" name="findSomething" value="polar bear"/> 
    <input type="submit" value="Find It"/>
  </form>
    <br/><br/>
    <div id="twitterContent">Loading...</div>
  </body>
</html>