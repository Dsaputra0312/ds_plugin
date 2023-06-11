/* Widget Music Player */
$(document).ready(function () {
    $('#play').show();
    $('#pause').hide();
});

$('#play').on('click', function() {
    $('#play').hide();
    $('#pause').show();
    audio.play();
});

$('#pause').on('click', function() {
    $('#play').show();
    $('#pause').hide();
    audio.pause();
});

// Widget Copy Text
$('.iconCopyText').on('click', function() {
    var TempText = document.createElement("input");
    TempText.value = $.trim($(this).parent().children('span').text());
    document.body.appendChild(TempText);
    TempText.select();
    document.execCommand("copy");
    document.body.removeChild(TempText);
    
    alert("Copied the text: " + TempText.value);
});