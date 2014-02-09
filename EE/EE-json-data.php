<?php
function homecalendar() {

$myCalAllQuery	= "http://api.serviceu.com/rest/events/occurrences?orgKey=71183f75-55d3-469a-a2fd-249795eba51a&format=json";
$myCacheFileCalAll 		= "/path/to/scripts/json/calall.json"; 	
$myCacheCycleCalAll 	= "60";

//  technically we don't need this really, but if you ever need other header info, this is the way
$setContextOptionsIn = array(
	'http'=> array(
    'method'=>"GET"
	)
);
$createContextCalAll = stream_context_create($setContextOptionsIn);

//  let's get our cache file, returns false if file does not exist
$getCacheFileModTimeCalAll = @filemtime( $myCacheFileCalAll );

if ( !$getCacheFileModTimeCalAll || ( time() - $getCacheFileModTimeCalAll >= $myCacheCycleCalAll) )
{
	//  go get me some json, returns false if error
	$getInstagramCalAll = file_get_contents($myCalAllQuery, false, $createContextCalAll);
	
	if ($getInstagramCalAll) {
		
		// write the JSON to file, return it to the caller
		file_put_contents( $myCacheFileCalAll, $getInstagramCalAll );
		$outputJSONIn = $getInstagramCalAll;
	}
	else {
		//  uh oh, we have a problem, write some simple error json to tell us on the frontend
		$errorArrayCalAll = array('error' => 'There was a problem getting data from the Calendar API, please try again.');
		$outputJSONCalAll = json_encode($errorArray);
	}
} 
else 
{
	//  get the cache file
	$outputJSONCalAll = file_get_contents($myCacheFileCalAll);
}


$json_CalAll=json_decode($outputJSONCalAll);

foreach($json_CalAll as $p) {
	
$publicurl = $p->PublicEventUrl;
$regurl = $p->RegistrationUrl;
$title = $p->Name;

$pattern = "/&/i";
$replace = "&amp;";
$newtitle = preg_replace($pattern,$replace,$publicurl);
$newregcurl = preg_replace($pattern,$replace,$regurl);
$newtitle = preg_replace($pattern,$replace,$title);

$CalAll[] = array('eventid'=> $p->EventId, 'title'=> $newtitle, 'starttime'=> $p->OccurrenceStartTime, 'endtime'=> $p->OccurrenceEndTime, 'cat'=> $p->DepartmentName, 'publicurl'=> $newpublicurl, 'regurl'=> $newregcurl);
}

$i=0; ?>
<ul class="nobullets home_calendar">
<?php foreach($CalAll as $d) { if($i==4) break; 
$regurl = $d['regurl'];
?>        	
    <li id="event_<?php echo $d['eventid'];?>">
	<div class="date left">
    	<div class="day">
        	<?php echo reformat_date($d['starttime'], "j"); ?>
        </div>
        <div class="month">
        	<?php echo reformat_date($d['starttime'], "M"); ?>
        </div>
    </div>
    <div class="details left">
    	<span class="news_title"><a href="<?php echo $d['publicurl']; ?>" title="<?php echo $d['title']; ?>"><?php $tit = $d['title']; echo substr($tit, 0, 28); if (strlen($tit) > 28) echo " ...";?></a></span>
   		<span class="news_text"><?php echo reformat_date($d['starttime'], "g:ia"); ?><?php if (!empty($regurl)) { ?>  &ndash; <a href="<?php echo $d['regurl']; ?>" title="register">Register</a><?php } ?> </span>
    </div>
    <div class="clear"> </div>
    </li>
<?php $i++; } ?>          
</ul>
<?php
}