<?php
$extensions = array("jpg","gif","png");
$all_files = scandir($_GET["dir"]);
$images = array();
for ($i=0;$i<count($all_files);$i++)
	{
	$is_image = false;
	for ($x=0;$x<count($extensions);$x++)
		{
		if (substr_count(strtolower($all_files[$i]),$extensions[$x]) != 0)
			{
			$is_image = true;
			break;
			}
		}
	if ($is_image) array_push($images,$all_files[$i]);
	}
if (count($images) != 0) echo(implode(',',$images));
?>