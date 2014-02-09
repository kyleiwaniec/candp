<?php

function drawImages($images) {
    $filenames = glob($images);
    $z = 100;
    $i = 0;
    foreach ($filenames as $file) {
        echo "<div style='z-index:" . $z-- . "; margin-left:".$i++."00%;'><img class='lazy' data-original='$file' src='/images/placeholder.png'/></div>";
    };
}
