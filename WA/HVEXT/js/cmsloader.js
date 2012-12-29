function getRequest()
{
      http_request = false;
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
         http_request = new XMLHttpRequest();
         if (http_request.overrideMimeType) {
         	// set type accordingly to anticipated content type
            //http_request.overrideMimeType('text/xml');
            http_request.overrideMimeType('text/html');
         }
      } else if (window.ActiveXObject) { // IE
         try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
      }
      if (!http_request) {
         alert('Cannot create XMLHTTP instance');
         return false;
      }
      return http_request;
}
        
function TDE_CMS_LoadContent(contentId)
{
    var path = "/TDE_CMS/cmsloader.php?action=get_tde_content&content_id="+contentId;
    http_request = getRequest();   
    http_request.open("GET", path, false);
    http_request.send(null);
    document.write (http_request.responseText);
}

function TDE_CMS_LoadTitle(contentId)
{
    var path = "/TDE_CMS/cmsloader.php?action=get_tde_title&content_id="+contentId;
    http_request = getRequest();   
    http_request.open("GET", path, false);
    http_request.send(null);
    document.write (http_request.responseText);    
}