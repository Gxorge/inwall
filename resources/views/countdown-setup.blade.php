<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotten Inwall</title>

    @vite(['resources/scss/app.scss'])

    <script>
        var selected;

        window.addEventListener('load', function () {
            selected = document.getElementById("time");
        });

        function keypadClick(number) {
            selected.value = selected.value + number;
        }

        function clearInput() {
            selected.value = "";
        }

        function removeLast() {
            var value = selected.value;
            selected.value = value.substring(0, value.length-1);
        }

        function selectTime() {
            selected = document.getElementById("time");
        }

        function selectWarning() {
            selected = document.getElementById("warning");
        }
    </script>
</head>
<body class="gweb-site">
    <main class="gweb-container">
        <section class="content">
            <div class="gweb-text-layout is-centered">
                <div class="columns is-multiline">
                    <div class="column is-full">
                        <h1>Setup Countdown</h1>
                    </div>
                    <div class="column columns is-multiline is-half">
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(7)">7</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(8)">8</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(9)">9</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(4)">4</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(5)">5</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(6)">6</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(1)">1</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(2)">2</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(3)">3</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="clearInput()">CLEAR</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="keypadClick(0)">0</button>
                        </div>
                        <div class="column is-one-third">
                            <button class="button is-primary is-outlined is-fullwidth" onclick="removeLast()">DEL</button>
                        </div>
                    </div>
                    <div class="column is-half is-centered">
                        <form action="/countdown" method="get">
                            <div class="field">
                                <label class="label" for="time">Time</label>
                                <div class="control">
                                    <input class="input" type="number" id="time" name="time" onfocus="selectTime()">
                                    @error('time')<p class="help is-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="field">
                                <label class="label" for="unit">Unit</label>
                                <div class="control">
                                    <div class="select">
                                        <select id="unit" name="unit">
                                            <option>Seconds</option>
                                            <option>Minutes</option>
                                            <option>Hours</option>
                                        </select>
                                    </div>
                                    @error('unit')<p class="help is-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="field">
                                <label class="label" for="warning">Warning Time (seconds)</label>
                                <div class="control">
                                    <input class="input" type="number" id="warning" name="warning" value="30" onfocus="selectWarning()">
                                    @error('warning')<p class="help is-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="field">
                                <p class="control">
                                    <button class="button is-success is-outlined is-fullwidth">Start Countdown</button>
                                </p>
                                @error('start')<p class="help is-danger">{{ $message }}</p>@enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="bottom-button footer-sticky">
            <a class="button is-fullwidth is-danger is-outlined" href="/">Cancel</a>
        </div>
    </main>
</body>
@include('footer')
</html>
