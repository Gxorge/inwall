<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotten Inwall</title>

    @vite(['resources/scss/app.scss'])

    <script>
        var timeRemaining = "Get ready!";
        var time = {{ $time }};
        var unit = "{{ $unit }}";
        if (unit === "Minutes") {
            time = time*60;
        } else if (unit === "Hours") {
            time = time*3600;
        }
        var musicIntro = {{ $warning }};
        var introMusic = new Audio("https://hotten.uk/inwall/timer-intro.mp3");
        var loopMusic = new Audio("https://hotten.uk/inwall/timer-loop.mp3");
        var timerEnd = new Audio("https://hotten.uk/inwall/timer-end.mp3");
        loopMusic.loop = true;
        timerEnd.loop = true;

        introMusic.addEventListener('ended', function() {
            loopMusic.play();
        });

        var updater = setInterval(function() {
            if (time == 0) {
                timeRemaining = "Times up!";
                document.getElementById('inwall-remaining').innerHTML = timeRemaining;
                introMusic.pause();
                loopMusic.pause();
                timerEnd.play();
                clearInterval(updater);
                return;
            }
            timeRemaining = format();

            if (time == musicIntro) {
                introMusic.play();
            }

            document.getElementById('inwall-remaining').innerHTML = timeRemaining;
            time--;
        }, 1000);

        function format() {
            if (time < 60) {
                return prependZero(time) + " seconds";
            }

            var minutes = Math.floor(time / 60);
            var seconds = time - minutes * 60;

            return minutes + "m " + prependZero(seconds) + "s";
        }

        function prependZero(number) {
            if (number < 10)
                return "0" + number;
            else
                return number;
        }
    </script>
</head>
<body class="gweb-site">
    <main class="gweb-container">
        <section class="content">
            <div class="gweb-text-layout is-centered">
                <div class="columns">
                    <div class="column is-full">
                        <p class="has-text-centered is-size-1" id="inwall-remaining"></p>
                        <p class="has-text-centered">remaining</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="bottom-button footer-sticky">
            <a class="button is-fullwidth is-primary is-outlined" href="/">Home</a>
        </div>
    </main>
</body>
@include('footer')
</html>
