<!DOCTYPE html>
<html>

<head>
    <title>Stream monitoring</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-color: black;
            color: white;
            font-family: sans-serif;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 0;
            width: 100vw;
            height: 100%;
        }

        /* Responsive layout - makes a two column-layout instead of three columns on mobile phone */
        @media (max-width: 1000px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .overlay {
                pointer-events: all !important;
                width: 75% !important;
            }

        }

        .grid-item {
            position: relative;
            padding-bottom: 56.25%;
            overflow: hidden;
        }

        .youtube-player {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 40%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px;
            transition: opacity 0.3s ease;
            opacity: 1;
            pointer-events: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            font-size: 400%;
        }

        .unmuted .overlay {
            background-color: red;
        }

        .settings {
            padding: 20px;
            padding-top: 300px;
        }

        #clock {
            padding: 20px;
        }

        input[type="number"] {
            width: 10%;
        }
    </style>
</head>

<body>
    <div class="grid-container">
        <div class="grid-item">
            <div id="player1" class="youtube-player"></div>
            <div class="overlay">D105</div>
        </div>
        <div class="grid-item">
            <div id="player2" class="youtube-player"></div>
            <div class="overlay">D0206</div>
        </div>
        <div class="grid-item">
            <div id="player3" class="youtube-player"></div>
            <div class="overlay">D0207</div>
        </div>
        <div class="grid-item">
            <div id="player4" class="youtube-player"></div>
            <div class="overlay">E112</div>
        </div>
        <div class="grid-item">
            <div id="player5" class="youtube-player"></div>
            <div class="overlay">E104</div>
        </div>
        <div class="grid-item">
            <div id="player6" class="youtube-player"></div>
            <div class="overlay">E105</div>
        </div>
        <div class="grid-item">
            <div id="player7" class="youtube-player"></div>
            <div class="overlay">A113</div>
        </div>
        <div class="grid-item">
            <div id="player8" class="youtube-player"></div>
            <div class="overlay">A113</div>
        </div>
        <div class="grid-item">
            <div class="overlay" id="clock"></div>
            <div class="settings">
                <label for="delay">Delay in seconds</label>
                <input type="number" value="10" min="1" name="delay">
                <input type="checkbox" name="autowitch" id="autoswitch">
                <label for="autoswitch">Auto switch?</label>
            </div>
        </div>
    </div>
    <script src="https://www.youtube.com/player_api"></script>
</body>
<script>
    // Define an array of YouTube video URLs
    const videoUrls = [
        'https://www.youtube.com/watch?v=QTNCw9srUpM',
        'https://www.youtube.com/watch?v=QFC1-MNHe-g',
        'https://www.youtube.com/watch?v=FfT38q_meLs',
        'https://www.youtube.com/watch?v=nIDHYXkeaB8',
        'https://www.youtube.com/watch?v=62CaWYi0TRQ',
        'https://www.youtube.com/watch?v=UUuorawVSgM',
        'https://www.youtube.com/watch?v=V30nFAIoGvc',
        'https://www.youtube.com/watch?v=m9YBXT_xMuE',
    ];

    // Array to store the player instances
    let players = [];

    // Initialize the YouTube Player API
    function onYouTubeIframeAPIReady() {
        // Create YouTube player for each video URL
        for (let i = 0; i < videoUrls.length; i++) {
            const player = createPlayer(`player${i + 1}`, getVideoIdFromUrl(videoUrls[i]));
            players.push(player);
            populateOverlayText(i + 1, getVideoTitle(i));

            // Add event listeners to detect mouseover and mouseleave events
            const playerElement = document.getElementById(`player${i + 1}`);
            const overlayElement = document.querySelector(`#player${i + 1} + .overlay`);
            playerElement.addEventListener('mouseover', () => unmutePlayer(player));
            playerElement.addEventListener('mouseleave', () => mutePlayer(player));
            overlayElement.addEventListener('click', () => mobileUnmute(i));
        }
    }

    function mobileUnmute(i) {
        console.log("Mobile unmute", i);
        const player = players[i];
        players.forEach(muteme => {
            mutePlayer(muteme);
        });
        unmutePlayer(player);
    }

    // Unmute the specified player
    function unmutePlayer(player) {
        player.unMute();
        const playerElement = player.getIframe();
        playerElement.parentNode.classList.add('unmuted');
    }

    // Mute the specified player
    function mutePlayer(player) {
        player.mute();
        const playerElement = player.getIframe();
        playerElement.parentNode.classList.remove('unmuted');
    }


    // Create a YouTube player with the specified video ID
    function createPlayer(playerId, videoId) {
        return new YT.Player(playerId, {
            videoId: videoId,
            playerVars: {
                autoplay: 0,
                controls: 1,
                showinfo: 0,
                rel: 0,
                modestbranding: 1,
                mute: 1 // Mute the player by default
            }
        });
    }

    // Get the video ID from the YouTube URL
    function getVideoIdFromUrl(url) {
        const regex = /v=([^?&]+)/;
        const match = url.match(regex);
        if (match) {
            return match[1];
        }
        return null;
    }

    // Get the video title based on the index
    function getVideoTitle(index) {
        const titles = [
            'D105',
            'D0206',
            'D0207',
            'E112',
            'E104',
            'E105',
            'A112',
            'A113',
        ];
        return titles[index];
    }

    // Populate the text overlay with the specified title
    function populateOverlayText(playerNumber, title) {
        const overlayElement = document.querySelector(`#player${playerNumber} + .overlay`);
        overlayElement.textContent = title;
    }

    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const currentTime = `${hours}:${minutes}:${seconds}`;

        document.getElementById('clock').textContent = currentTime;
    }

    // Update the clock once to avoid initial delay
    updateClock();

    // Update the clock every second
    setInterval(updateClock, 100);

    let autoSwitchIndex = 0;

    function autoSwitchFunc() {
        const delay = parseInt(document.querySelector('input[name="delay"]').value, 10);
        const autoSwitch = document.querySelector('input[name="autowitch"]').checked;
        console.error("Autoswich", autoSwitch, delay);
        if (autoSwitch) {
            console.error("Players lenght ", players.length);
            mobileUnmute((++autoSwitchIndex) % players.length);
            console.error("Switching to ", autoSwitchIndex % players.length);
        }
        setTimeout(autoSwitchFunc, delay * 1000);
    }

    console.log(setTimeout(autoSwitchFunc, 10000));

</script>

</html>
