<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <title>Hotten Inwall</title>

    @vite(['resources/js/app.js'])
    @vite(['resources/scss/app.scss'])
    @vite(['resources/js/notification-manager.js'])
    <!--@vite(['resources/js/inactivity.js'])-->

    <script>
        var siteId = {{session()->get('rid')}};
        var terminalId = {{session()->get('rid')}};

        var time = "00:00";
        var date = "Thursday, 1st January 1970"

        var updater = setInterval(function() {

            var now = new Date();

            time = "" + prependZero(now.getHours()) + ":" + prependZero(now.getMinutes());
            date = now.toLocaleDateString('en-uk', { weekday:"long", year:"numeric", month:"long", day:"numeric"})

            document.getElementById('inwall-time').innerHTML = time;
            document.getElementById('inwall-date').innerHTML = date;
        }, 1000);

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
    @include('notification')
    <header class="hero is-primary">
        <div class="hero-body hero-text-padding">
            <h1 class="title">
                Main Menu
            </h1>
            <h2 role="doc-subtitle" class="subtitle">
                Hotten Inwall
            </h2>
        </div>
    </header>

    <section class="content">
        <div class="gweb-text-layout">
            <div class="columns">
                <div class="column">
                    <a class="button is-primary is-outlined is-fullwidth" href="/time">Time</a>
                </div>
                <div class="column">
                    <a class="button is-primary is-outlined is-fullwidth" href="/countdown/setup">Countdown</a>
                </div>
                <div class="column">
                    <a class="button is-primary is-outlined is-fullwidth" href="/auth?redirect=settings">Settings</a>
                </div>
            </div>
            <div class="is-centered">
                <p class="has-text-centered" id="inwall-date"></p>
                <p class="has-text-centered" id="inwall-time"></p>
                <br><br><br><br>
                <p class="has-text-centered is-size-7">{{$sitedata}}</p>
            </div>
        </div>
    </section>
</main>
</body>
@include('footer')
</html>
