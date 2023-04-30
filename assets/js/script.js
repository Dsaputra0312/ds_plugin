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
$('#iconCopyText').on('click', function() {
	var temp = $("<input>");
    $("body").append(temp);
    temp.val($.trim($('#textCopyText').text())).select();
    document.execCommand("copy");
    temp.remove();
});
