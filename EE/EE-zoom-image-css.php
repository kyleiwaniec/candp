<!DOCTYPE html>
<html>
    <head runat="server">
        <title>Galley</title>

        <style>
            .zoom {
                height:400px;
                margin:auto;
            }
            .zoom p {
                text-align:center;
            }
            .zoom img {
                width:300px;
                height:225px;
            }
            .zoom img:hover {
                width:400px;
                height:300px;
            }
            .message{
                position:absolute;
                width:200px;
                height:200px;
                top:50px;
                left:50%;
                color:white;
            }
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script>
            var message = "You do not have permission to copy these images";
            $(function() {
                $("img").bind("contextmenu", function(e) {
                    e.preventDefault();
                    $(this).parent().append("<span class='message'>"+message+"</span>"); 
                });
                $("img").mouseleave(function(){
                    $(".message").hide();
                });
                });
        </script>
    </head>
    <body bgcolor="#000000">
        
        <table width="650px" align="center" >
            <tr>
                <td align="center">
                    <div class="zoom">               
                        <img alt="" src="ImagesJpg/site26.jpg" />
                    </div>
            <asp:HiddenField ID="hdfld1"  Value="ImagesJpg/site26.jpg" runat="server" />

        </td >
    </tr>
    <tr>
                <td align="center">
                    <div class="zoom">               
                        <img alt="" src="ImagesJpg/site26.jpg" />
                    </div>
            <asp:HiddenField ID="hdfld1"  Value="ImagesJpg/site26.jpg" runat="server" />

        </td >
    </tr>
</table>
</body>
</html>