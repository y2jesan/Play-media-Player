jQuery(document).ready(function(){
    var scripts = document.getElementsByTagName("script");
    var jsFolder = "";
    for (var i= 0; i< scripts.length; i++)
    {
        if( scripts[i].src && scripts[i].src.match(/initaudioplayer-1\.js/i))
            jsFolder = scripts[i].src.substr(0, scripts[i].src.lastIndexOf("/") + 1);
    }
    jQuery("#amazingaudioplayer-1").amazingaudioplayer({
        jsfolder:jsFolder,
        skinsfoldername:"",
        titleinbarwidthmode:"fixed",
        timeformatlive:"%CURRENT% / LIVE",
        volumeimagewidth:24,
        barbackgroundimage:"",
        showtime:true,
        titleinbarwidth:80,
        showprogress:true,
        random:false,
        titleformat:"%TITLE%",
        height:1000,
        loadingformat:"Loading...",
        prevnextimage:"prevnext-24-24-0.png",
        showinfo:false,
        imageheight:100,
        skin:"BarTitle",
        loopimage:"loop-24-24-0.png",
        loopimagewidth:24,
        showstop:false,
        prevnextimageheight:24,
        infoformat:"By %ARTIST% %ALBUM%<br />%INFO%",
        stopotherplayers:true,
        showloading:false,
        forcefirefoxflash:false,
        showvolumebar:true,
        imagefullwidth:false,
        width:1000,
        showtitleinbar:true,
        showloop:true,
        volumeimage:"volume-24-24-0.png",
        playpauseimagewidth:24,
        loopimageheight:24,
        tracklistitem:10,
        tracklistitemformat:"%ID%. %TITLE% <span style='position:absolute;top:100;right:0;'>%DURATION%</span>",
        prevnextimagewidth:24,
        tracklistarrowimage:"tracklistarrow-16-16-0.png",
        forceflash:false,
        playpauseimageheight:24,
        showbackgroundimage:false,
        imagewidth:100,
        stopimage:"stop-24-24-0.png",
        playpauseimage:"playpause-24-24-0.png",
        forcehtml5:false,
        showprevnext:true,
        backgroundimage:"",
        autoplay:false,
        volumebarpadding:8,
        progressheight:8,
        showtracklistbackgroundimage:false,
        titleinbarscroll:true,
        showtitle:false,
        defaultvolume:100,
        tracklistarrowimageheight:16,
        heightmode:"auto",
        titleinbarformat:"%TITLE%",
        showtracklist:true,
        stopimageheight:24,
        volumeimageheight:24,
        stopimagewidth:24,
        volumebarheight:80,
        noncontinous:false,
        tracklistbackgroundimage:"",
        showbarbackgroundimage:false,
        showimage:false,
        tracklistarrowimagewidth:16,
        timeformat:"%CURRENT% / %DURATION%",
        showvolume:true,
        fullwidth:true,
        loop:1,
        preloadaudio:true
    });
});