
function loadData() {

    var $body = $('body');
    var $wikiElem = $('#wikipedia-links');
    
    // clear out old data before new request
    $wikiElem.text("");

    var inputStr = $('#input').val();

    // load wikipedia data
    var wikiUrl = 'http://id.wikipedia.org/w/api.php?action=opensearch&search=' + inputStr + '&format=json&callback=wikiCallback';
    var wikiRequestTimeout = setTimeout(function(){
        $wikiElem.text("failed to get wikipedia resources");
    }, 8000);

    $.ajax({
        url: wikiUrl,
        dataType: "jsonp",
        jsonp: "callback",
        success: function( response ) {
            var articleList = response[1];

            for (var i = 0; i < articleList.length; i++) {
                articleStr = articleList[i];
                var url = 'http://id.wikipedia.org/wiki/' + articleStr;
                $wikiElem.append('<li><a href="' + url + '">' + articleStr + '</a></li>');
            };

            clearTimeout(wikiRequestTimeout);
        }
    });

    return false;
};

$('#form-container').submit(loadData);
