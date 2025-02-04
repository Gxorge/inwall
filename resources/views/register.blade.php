<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <title>Hotten Inwall</title>

        @vite(['resources/scss/app.scss'])
    </head>
    <body class="gweb-site">
        <main class="gweb-container">
{{--            <header class="hero is-primary">
                <div class="hero-body hero-text-padding">
                    <h1 class="title">
                    Test
                    </h1>
                    <h2 role="doc-subtitle" class="subtitle">
                        Test 2
                    </h2>
                </div>
            </header>--}}
            <div class="columns is-centered is-vcentered is-multiline">
                <div class="column is-full">
                    <div class="block has-text-centered">
                        <figure class="image is-inline-block">
                            <img src="/img/inwall-trans.png" />
                        </figure>
                    </div>
                </div>
                <div class="column has-text-centered is-half">
                    <form action="/register" method="post">
                        @csrf
                        <div class="field">
                            <label class="label" for="secret">Registration Secret</label>
                            <div class="control">
                                <input class="input" type="text" id="secret" name="secret" placeholder="your location's secret">
                                @error('secret')<p class="help is-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        <br>
                        <div class="field">
                            <p class="control">
                                <button class="button is-primary is-outlined is-fullwidth">Submit</button>
                            </p>
                            @error('submit')<p class="help is-danger">{{ $message }}</p>@enderror
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </body>
    @include('footer')
</html>
