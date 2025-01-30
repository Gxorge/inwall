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
            selected = document.getElementById("pin");
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
    </script>
</head>
<body class="gweb-site">
    <main class="gweb-container">
        <section class="content">
            <div class="gweb-text-layout is-centered">
                <div class="columns is-multiline">
                    <div class="column is-full">
                        <h1>Enter your pin to continue</h1>
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
                        <form action="/auth" method="post">
                            <div class="field">
                                <label class="label" for="pin">PIN</label>
                                <div class="control">
                                    <input class="input" type="password" id="pin" name="pin">
                                    @error('pin')<p class="help is-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="field">
                                <p class="control">
                                    <button class="button is-success is-outlined is-fullwidth">Authenticate</button>
                                </p>
                                @error('submit')<p class="help is-danger">{{ $message }}</p>@enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="bottom-button footer-sticky">
            <a class="button is-fullwidth is-danger is-outlined" href="/home">Cancel</a>
        </div>
    </main>
</body>
@include('footer')
</html>
