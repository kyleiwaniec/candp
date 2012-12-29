<?php
  
  $search = "polar bear";
  
  if (isset($_POST["search"])){
      $search = urlencode($_POST["search"]);
  }
  
  $file = simplexml_load_file("http://search.twitter.com/search.atom?rpp=20&q=$search");
  
  //echo "<pre>";
  //print_r($file);
  
  foreach($file->entry as $entry){
    $content = $entry->content;
    // printr($content);
    // profile link
    $profile = $entry->link[0]["href"];
    // avatar image
    $img = $entry->link[1]["href"];
    // change this to your liking
    echo "<div class='entry'>";
    echo "<img src='$img' class='profilePic'/>";
    echo "<div class='content'>$content</div>";
    echo "</div>";
  }