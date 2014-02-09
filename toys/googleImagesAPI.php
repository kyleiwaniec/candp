<!--
You are free to copy and use this sample in accordance with the terms of the
Apache license (http://www.apache.org/licenses/LICENSE-2.0.html)
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google AJAX Search API Sample</title>
    <script src="http://www.google.com/jsapi?key=AIzaSyA5m1Nc8ws2BbmPRwKu5gFradvD_hgq6G0" type="text/javascript"></script>
    <script type="text/javascript">
    /*
    *  How to search for images and filter them by color.
    */
    
    google.load('search', '1');
    
    function OnLoad() {
      var searchControlDiv = document.getElementById("content");
      var control = new GSearchControl();
      control.setResultSetSize(GSearch.LARGE_RESULTSET);
      control.setLinkTarget(GSearch.LINK_TARGET_PARENT);
    
      var options = new GsearcherOptions();
      options.setExpandMode(GSearchControl.EXPAND_MODE_OPEN);
    
      var isearcher;
      var colors = [
        GimageSearch.COLOR_RED,
        GimageSearch.COLOR_ORANGE,
        GimageSearch.COLOR_YELLOW,
        GimageSearch.COLOR_GREEN,
        GimageSearch.COLOR_TEAL,
        GimageSearch.COLOR_BLUE,
        GimageSearch.COLOR_PURPLE,
        GimageSearch.COLOR_PINK,
        GimageSearch.COLOR_WHITE,
        GimageSearch.COLOR_GRAY,
        GimageSearch.COLOR_BLACK,
        GimageSearch.COLOR_BROWN
      ];
      
      for (var i=0; i < colors.length; i++) {
        var colorSearcher = new google.search.ImageSearch();
        colorSearcher.setRestriction(GimageSearch.RESTRICT_COLORFILTER,
                                     colors[i]);
        var colorName = colors[i].substring(0,1).toUpperCase() + colors[i].substring(1);
        colorSearcher.setUserDefinedLabel(colorName);
        control.addSearcher(colorSearcher, options);
      };
    
      // tell the searcher to draw itself and tell it where to attach
      var drawOptions = new google.search.DrawOptions();
      drawOptions.setDrawMode(google.search.SearchControl.DRAW_MODE_TABBED);
      control.draw(searchControlDiv, drawOptions);
      control.execute("Tree");
    }
    
    google.setOnLoadCallback(OnLoad);
    </script>
    <style type="text/css" media="screen">
      body, table, p{
        background-color: white;
        font-family: Arial, sans-serif;
        font-size: 13px;
      }

      .gsc-trailing-more-results {
        display : none;
      }

      .gsc-resultsHeader {
        display : none;
      }

      .gsc-results {
        padding-left : 20px;
      }

      .gsc-control {
        width : 800px;
      }

      .gsc-tabsArea {
        margin-bottom : 5px;
      }
    </style>
  </head>
  <body style="font-family: Arial;border: 0 none;">
    <div id="content">Loading...</div>
  </body>
</html>​