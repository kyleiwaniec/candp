<script type="text/javascript">
var obj;
function JSONscriptRequest(fullUrl){
this.fullUrl=fullUrl;
this.noCacheIE='&noCacheIE=' + (new Date()).getTime();
if(document.getElementsByTagName("head").item(0) == null){
this.headLoc=document.getElementsByTagName("html").item(0);}else{
this.headLoc=document.getElementsByTagName("head").item(0);}
this.scriptId='JscriptId' + JSONscriptRequest.scriptCounter++;
}
JSONscriptRequest.scriptCounter=1;
JSONscriptRequest.prototype.buildScriptTag=function(){
this.scriptObj=document.createElement("script");
this.scriptObj.setAttribute("type", "text/javascript");
this.scriptObj.setAttribute("charset", "utf-8");
this.scriptObj.setAttribute("src", this.fullUrl + this.noCacheIE);
this.scriptObj.setAttribute("id", this.scriptId);
}
JSONscriptRequest.prototype.removeScriptTag=function(){
this.headLoc.removeChild(this.scriptObj);
}
JSONscriptRequest.prototype.addScriptTag=function(){
this.headLoc.appendChild(this.scriptObj);
}
function addScript(){
obj=new JSONscriptRequest('http://www.experts-exchange.com/shared/async/expertBadgesJSON.jsp?q=gagNVWlAGzs=&bs=qronwr908hn0gttFnx7AuKM=&fzn=rTwknf9iqfQ=&szn=hP3B0vIzMtk=&tzn=hP3B0vIzMtk=');
obj.buildScriptTag();
obj.addScriptTag();
}
</script>
<link type="text/css" rel="stylesheet" href="http://www.experts-exchange.com/shared/expertBadgesCss.jsp" />
<!--[if lte IE 6]><div class="IE"><![endif]-->
<div id="pageMain">
<div id="smallCustomImage" class="smallCustomImage">
<div class="smallBadgeContainer">
<div id="certifiedExpertName" class="certifiedExpertName"></div>
<div id="certifiedExpertMemberSince" class="certifiedExpertMemberSince"></div>
<div id="certifiedExpertEEple" class="certifiedExpertEEple"></div>
<div id="certifiedExpertZoneRank" class="certifiedExpertZoneRank"></div>
<div id="certifiedExpertZones" class="certifiedExpertZones">
<div class="certifiedExpertZonesRanks">
<div class="maginBottom"><span id="certifiedExpertZoneRank1" class="certifiedExpertZoneRankTd">#1  </span><span id="certifiedExpertZone1" class="certifiedExpertZoneRankTdData"></span></div>
<div class="maginBottom"><span id="certifiedExpertZoneRank2" class="certifiedExpertZoneRankTd">#2  </span><span id="certifiedExpertZone2" class="certifiedExpertZoneRankTdData"></span></div>
<div class="maginBottom"><span id="certifiedExpertZoneRank3" class="certifiedExpertZoneRankTd">#3  </span><span id="certifiedExpertZone3" class="certifiedExpertZoneRankTdData"></span></div>
</div>
</div>
<div class="certifiedExpertStatistics">
<div id="certifiedExpertQuestionsAnswered" class="certifiedExpertFloatedContent" style="display:none;">
<div class="certifiedExpertFloatLeft">Questions Answered</div>
<div id="certifiedExpertQuestionsAnsweredData" class="certifiedExpertFloatRight"></div>
<div class="certifiedExpertClearBoth"></div>
</div>
<div id="certifiedExpertArticlesWritten" class="certifiedExpertFloatedContent" style="display:none;">
<div class="certifiedExpertFloatLeft">Articles Written</div>
<div id="certifiedExpertArticlesWrittenData" class="certifiedExpertFloatRight"></div>
<div class="certifiedExpertClearBoth"></div>
</div>
<div id="certifiedExpertPoints" class="certifiedExpertFloatedContent">
<div class="certifiedExpertFloatLeft">Overall Points</div>
<div id="certifiedExpertPointsData" class="certifiedExpertFloatRight"></div>
<div class="certifiedExpertClearBoth"></div>
</div>
</div>
</div>
<div id="expertBadgesBottomLogoSmall"><a target="_blank" href="http://www.experts-exchange.com?cid=2289"><img src="http://www.experts-exchange.com/xp/images/150_CustomBottomLogo.gif" border="0" /></a></div>
</div>
</div><!--[if lte IE 6]></div><![endif]-->
<script type="text/javascript">
function take(data){
if(data==null){alert('Error accessing data');}

document.getElementById('certifiedExpertName').innerHTML="<a class='expertBadgesLinks' target='_blank' href='http://www.experts-exchange.com/M_5962534.html?cid=2289'>" + data.memberName + "</a>";
document.getElementById('certifiedExpertArticlesWrittenData').innerHTML=data.memberArticlesWritten;
document.getElementById('certifiedExpertPointsData').innerHTML=data.memberTotalPoints;
document.getElementById('certifiedExpertQuestionsAnsweredData').innerHTML=data.memberQuestionsAnswered;
document.getElementById('certifiedExpertMemberSince').innerHTML='MEMBER SINCE ' + data.memberSinceDate;
document.getElementById('certifiedExpertZoneRank').innerHTML=data.memberZoneRank;
document.getElementById('certifiedExpertEEple').innerHTML=data.eeple;
document.getElementById('certifiedExpertZone1').innerHTML="<a class='expertBadgesLinksForZones' target='_blank' href='http://www.experts-exchange.com" + data.memberZoneDefaultPath1 + "?cid=2289'>" + data.memberZoneRank1 + "</a>";
document.getElementById('certifiedExpertZone2').innerHTML="<a class='expertBadgesLinksForZones' target='_blank' href='http://www.experts-exchange.com" + data.memberZoneDefaultPath2 + "?cid=2289'>" + data.memberZoneRank2 + "</a>";
document.getElementById('certifiedExpertZone3').innerHTML="<a class='expertBadgesLinksForZones' target='_blank' href='http://www.experts-exchange.com" + data.memberZoneDefaultPath3 + "?cid=2289'>" + data.memberZoneRank3 + "</a>";

}
addScript();
</script>
