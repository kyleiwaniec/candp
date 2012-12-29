<?php

require_once 'quickmysql.php';


connect();
$array;

    $query = "SELECT *  FROM  `votes`";
    $result = mysql_query($query) or die(mysql_error());
    $rows = mysql_num_rows($result);
    if ($rows > 0) {

        while ($data = mysql_fetch_assoc($result)) {
            $color = $data['color'];
            $voteCount = $data['voteCount'];

            $array[] = array($color => intval($voteCount));
        }
    }

echo json_encode($array);

disconnect();
