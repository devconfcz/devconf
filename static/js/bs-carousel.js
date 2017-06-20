window.addEventListener('load', function() {
    var video = document.querySelector('#pretzel-video');

    function checkLoad() {
        if (video.readyState === 4) {
            $('.carousel').carousel({ interval: 8500 }, 'cycle');
        } else {
            setTimeout(checkLoad, 100);
        }
    }

    checkLoad();
}, false);
