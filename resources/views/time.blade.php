<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotten Inwall</title>

    @vite(['resources/scss/app.scss'])

    <script>
        var time = "waiting..."
        var date = "waiting..."

        var updater = setInterval(function() {

            var now = new Date();

            time = "" + prependZero(now.getHours()) + ":" + prependZero(now.getMinutes()) + ":" + prependZero(now.getSeconds());
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
        <section class="content">
            <div class="gweb-text-layout is-centered">
                <div class="columns">
                    <div class="column is-full">
                        <p class="has-text-centered is-size-1" id="inwall-time"></p>
                        <p class="has-text-centered" id="inwall-date"></p>
                    </div>
                </div>
            </div>
        </section>
        <div class="bottom-button footer-sticky">
            <a class="button is-fullwidth is-primary is-outlined" href="/home">Home</a>
        </div>
    </main>
</body>
@include('footer')
</html>
