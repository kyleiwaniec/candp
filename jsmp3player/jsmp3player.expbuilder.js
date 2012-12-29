///////////////////////////////////////////////////////\\
///////////////////////////////////////////////////////\\
//***************************************************\\\\
//                 JSMP3 Player v1.0                 \\\\
//                  ExpBuilder.com                   \\\\
//                elkadrey@gmail.com                 \\\\
//              Auther: Ahmed Elkadrey               \\\\
//***************************************************\\\\
///////////////////////////////////////////////////////\\
///////////////////////////////////////////////////////\\
function setplayingbytes(me, played, from, songbytes, playingbytes, getBytesLoaded, getBytesTotal)
{
    $("#" + me).find(songbytes).html(from);
    $("#" + me).find(playingbytes).html(played);
    $("#" + me + "_getBytesLoaded").html(getBytesLoaded);
    $("#" + me + "_playingbytes").html(played);
    $("#" + me + "_songbytes").html(from);
    $("#" + me + "_getBytesTotal").html(getBytesTotal);
}


jQuery.fn.jsmp3 = function(srcPath, options)
{
    var me;
    var hiddenname;
    var playlistArray = new Array();
    var flashObj;                                             
    var selectedID = 0;
    var playing = false;
    var started = false;

    $(this).map(function()
    {
        me = this;
    })
    var Config = {
                     songtitle              : '.songtitle',
                     volumeClass            : '.volume',
                     volincrease            : '.volincrease',
                     voldecrease            : '.voldecrease',
                     songs                  : '.songs',
                     playlist               : 'playlist.txt',
                     playbutton             : '.play',
                     stopbutton             : '.stop',
                     pause                  : '.pause',
                     volume                 : '100',
                     selectedSongClass      : 'selectedsong',
                     playingbytes           : '.positiontime',
                     songbytes              : '.durationtime'
                };
    if(options)
    {
		jQuery.extend(Config, options);
	};



    function setOption(key, val)
    {
        flashObj.setOption(key, val);
    }

    function setPlayer()
    {
        var htm = '';
        htm += '<object id="'+ hiddenname + '_player_main" height="1" width="1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">';
        htm += '<param value="' + hiddenname + '_player" name="id"/><param value="middle" name="align"/>';
        htm += '<param value="always" name="allowScriptAccess"/>';
        htm += '<param value="high" name="quality"/>';
        htm += '<param value="jsmp3player.swf" name="src"/>';
        htm += '<embed src="jsmp3player.swf" height="1" width="1" allowscriptaccess="always" quality="high" type="application/x-shockwave-flash" id="' + hiddenname + '_player"/>';
        htm += '</object>';
        $("body").append(htm);
        flashObj = document.getElementById(hiddenname + '_player');
        if(flashObj == null)
        {
            flashObj = document.getElementById(hiddenname + '_player_main');
        }

    }

    function playsong()
    {
        started = true;
        $(me).find("." + Config.selectedSongClass).removeClass(Config.selectedSongClass);
        $(me).find("#jsmp3player_expbuilder_song_" + selectedID).addClass(Config.selectedSongClass);

        flashObj.loadSong(playlistArray[selectedID]['src'], me.id, Config.songbytes, Config.playingbytes);

        $(me).find(Config.playbutton).hide();
        $(me).find(Config.pause).show();
        playing = true;
    }
    function loadsongs()
    {
        var playlists = "";
        for(var ii = 0; ii < playlistArray.length; ii++)
        {
            playlists += '<div><a class="playsong" id="jsmp3player_expbuilder_song_' + ii + '" href="javascript: void(0);">' + playlistArray[ii]['name'] + '</a></div>';
        }
        $(me).find(Config.songs).html(playlists);
        $(me).find(Config.songtitle).html(playlistArray[0]['name']);

        setPlayer();


        $(".playsong").each(function()
        {
            $(this).click(function()
            {
                selectedID = (this.id).replace('jsmp3player_expbuilder_song_', '');
                playsong();
                return false;
            });
        });

        $(me).find(Config.volincrease).click(function()
        {
            if(Config.volume < 100)
            {
               Config.volume += 5;
            }

            if(Config.volume > 100)
            {
                Config.volume = 100;
            }
            $(me).find(Config.volumeClass).html(Config.volume + " %");
            setOption("volume", Config.volume);
            return false;
        });

        $(me).find(Config.voldecrease).click(function()
        {
            if(Config.volume > 0)
            {
               Config.volume -= 5;
            }

            if(Config.volume < 0)
            {
                Config.volume = 0;
            }
            $(me).find(Config.volumeClass).html(Config.volume + " %");
            setOption("volume", Config.volume);
            return false;
        });

        $(me).find(Config.pause).click(function()
        {
            setOption("pause", 1);
            $(me).find(Config.playbutton).show();
            $(me).find(Config.pause).hide();
            playing = false;
            return false;
        });
        $(me).find(Config.playbutton).click(function()
        {
           if(!started)
           {
                playsong();
           }
           else
           {
              setOption("play", 1);
              $(me).find(Config.playbutton).hide();
              $(me).find(Config.pause).show();
              playing = true;
           }
            return false;
        });

        $(me).find(Config.stopbutton).click(function()
        {
            $(me).find(Config.playingbytes).html(0);
            setOption("stop", 1);
            $(me).find(Config.playbutton).show();
            $(me).find(Config.pause).hide();
            playing = false;
            return false;
        });
        $(me).find(Config.playbutton).show();
    }


    $(document).ready(function()
    {
        hiddenname = 'jsmp3Player_ExpBuilder_' + me.id;
        $("body").append('<div style="display: none;" id="' + hiddenname + '">done</div>');
        $(me).find(Config.playbutton).hide();
        $(me).find(Config.pause).hide();
        $(me).find(Config.volumeClass).html(Config.volume + " %");
        $(me).find(Config.songbytes).html(0);


        $(me).find(Config.playingbytes).html(0);


         var name = (srcPath).split("/");
         var names = (name[name.length - 1]).split(".");
         playlistArray[0] = new Array();
         playlistArray[0]['name'] = names[names.length - 2];
         playlistArray[0]['src']     = srcPath;
         loadsongs();




        $("body").append('<div style="display: none;" id="' + me.id + '_playingbytes"></div>');
        $("body").append('<div style="display: none;" id="' + me.id + '_songbytes"></div>');
        $("body").append('<div style="display: none;" id="' + me.id + '_getBytesLoaded"></div>');
        $("body").append('<div style="display: none;" id="' + me.id + '_getBytesTotal"></div>');
    });
}