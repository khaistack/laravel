<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://apis.google.com/js/client:platform.js?onload=startApp"></script>
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app" class="container-fluid">
        <nav class="navbar sticky-top  navbar-expand-md navbar-light shadow-sm bg-white">
            <button class="navbar-toggler edit-buttun-slick" type="button" data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" style="" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon edit-icon-slick"></span>
            </button>
            <div class="container-fluid">
                <div class="container p-2">
                    <div class="col-md-4">
                        <div class="logo-edit">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="34pt" height="34pt" viewBox="0 0 34 34" version="1.1">
                                <g id="surface1">
                                    <path
                                        style=" stroke:none;fill-rule:nonzero;fill:rgb(33.72549%,23.921569%,48.627451%);fill-opacity:1;"
                                        d="M 34 28.332031 C 34 31.449219 31.449219 34 28.332031 34 L 5.667969 34 C 2.550781 34 0 31.449219 0 28.332031 L 0 5.667969 C 0 2.550781 2.550781 0 5.667969 0 L 28.332031 0 C 31.449219 0 34 2.550781 34 5.667969 Z M 34 28.332031 " />
                                    <path
                                        style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,100%,100%);fill-opacity:1;"
                                        d="M 9.238281 7.390625 L 18.878906 7.390625 C 20.65625 7.390625 22.082031 7.792969 23.15625 8.609375 C 24.226562 9.429688 24.765625 10.65625 24.765625 12.304688 C 24.765625 13.304688 24.523438 14.160156 24.035156 14.871094 C 23.542969 15.582031 22.84375 16.140625 21.933594 16.527344 L 21.933594 16.582031 C 23.15625 16.84375 24.082031 17.421875 24.710938 18.316406 C 25.339844 19.214844 25.65625 20.339844 25.65625 21.695312 C 25.65625 22.472656 25.515625 23.199219 25.238281 23.871094 C 24.960938 24.550781 24.527344 25.132812 23.933594 25.621094 C 23.339844 26.109375 22.582031 26.5 21.65625 26.789062 C 20.726562 27.078125 19.628906 27.222656 18.351562 27.222656 L 9.238281 27.222656 Z M 12.710938 15.695312 L 18.378906 15.695312 C 19.210938 15.695312 19.90625 15.460938 20.460938 14.984375 C 21.015625 14.503906 21.292969 13.828125 21.292969 12.9375 C 21.292969 11.9375 21.042969 11.234375 20.542969 10.828125 C 20.042969 10.421875 19.320312 10.214844 18.378906 10.214844 L 12.710938 10.214844 Z M 12.710938 24.390625 L 18.851562 24.390625 C 19.90625 24.390625 20.726562 24.117188 21.304688 23.566406 C 21.890625 23.023438 22.183594 22.246094 22.183594 21.246094 C 22.183594 20.261719 21.894531 19.511719 21.304688 18.976562 C 20.714844 18.445312 19.90625 18.1875 18.851562 18.1875 L 12.710938 18.1875 Z M 12.710938 24.390625 " />
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="collapse col-md-8  navbar-collapse" id="navbarTogglerDemo01">
                        <div class="">
                            <ul class="nav justify-content-end">
                               
                                <li class="nav-item">
                                    <a class="nav-link mp-2" href="#">Menu 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mp-2" href="#">Menu 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mp-2" href="#">Menu 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mp-2" href="#">Menu 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mp-2" href="#">Menu 1</a>
                                </li>
                            </ul>
                        </div>
                        <div class="">
                        <a href="{{url('login')}}" type="button" class="button  button--one  header__button">Log in</a>
                        <a href="{{url('register')}}" type="button" class="button button--secondary header__button">Sing Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="footer">
            <div class="footer__container container">
                <div class="row">
                    <div class="footer__logo col-md-2 col-12">
                        <a class="rw-logo" href="http://railsware.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="108" height="105" viewBox="0 0 108 105">
                                <path class="border" fill="none" stroke="#616870" stroke-width="1"
                                    stroke-miterlimit="10"
                                    d="M4.146.657C5.794.407 7.474.535 9.13.514 31.967.51 54.796.52 77.63.51c1.672.03 3.417-.154 5.02.438 1.5.48 2.055 2.098 3.113 3.113 4.986 5.01 9.967 10.017 14.953 15.025 1.467 1.43 2.81 3.016 4.51 4.188 1.552 1 1.79 3.042 1.795 4.738-.004 23.608-.01 47.216 0 70.823-.004 1.62-.212 3.516-1.546 4.605-1.755 1.253-4.017.978-6.045 1.008-24.524-.01-49.048-.01-73.57 0-1.705-.034-3.495.174-5.113-.49-1.435-.487-2.028-2.02-3.063-3.01-4.57-4.584-9.13-9.18-13.7-13.764-1.05-1.086-2.63-1.743-3.17-3.25-.3-1.127-.294-2.305-.314-3.455C.52 55.504.485 30.53.515 5.557.388 3.302 1.702.852 4.145.658z">
                                </path>
                                <path class="logo-text" fill="#FFF"
                                    d="M92.695 75.538c-.087.25-.214.483-.372.697-.856 1.152-2.372 1.59-3.76 1.71-2.013.173-2.713.417-2.733 1.097-.016.604.78 1.15 2.2 1.15h4.06v2.15h-3.947c-2.318-.017-4.618-1.25-4.618-3.306v-3.74c0-1.27-.087-2.118 1.012-3.077.887-.773 2.244-1.203 3.607-1.21 1.673-.012 3.352.51 4.184 1.558.222.28.354.562.433.846.17.616.146 1.54-.058 2.124h-.007zm-46.248 6.806H41.55v-2.15h5.98c.266 0 .51-.1.698-.258.493-.42.453-1.012.128-1.4-.13-.157-.333-.272-.56-.36-.48-.18-1.136-.282-1.656-.393l-.913-.193c-1.23-.265-2.404-.596-3.072-1.508-.92-1.252-.788-2.835.322-3.942a3.314 3.314 0 0 1 2.34-.962h4.86v2.15h-4.86c-.837 0-1.343.97-.853 1.57.31.38.9.52 1.402.63l1.583.346c1.39.302 2.632.363 3.466 1.864.962 1.73.036 3.782-1.74 4.41-.208.077-.42.13-.637.16-.495.063-1.084.036-1.593.036zm-12.67-11.167v11.17h2.21V72.73c0-.9-.158-1.556-1.395-1.556h-.814v.003zm0-3.462v2.146h2.21v-.594c0-.9-.158-1.552-1.395-1.552h-.814zm-9.672 8.483c.838-.53 1.918-.77 2.89-.854.848-.07 1.455-.157 1.87-.28.928-.27.915-.993.3-1.367-.35-.213-.99-.37-1.635-.37h-3.38v-2.15h3.27c2.558.017 4.617 1.163 4.617 3.82v3.225c0 1.275.09 2.12-1.01 3.078-.946.823-2.474 1.24-3.97 1.205-1.6-.038-3.602-.505-4.246-2.117-.16-.41-.24-.854-.236-1.3.003-1.19.5-2.233 1.534-2.89h-.002zm.993 1.95c-.497.56-.423 1.345.167 1.812.938.745 4.562.66 4.562-1.272v-1.883c-1.163.503-2.32.445-3.39.684-.49.11-1 .272-1.34.657zM22.78 71.22h-.937c-2.8 0-5.095 2.233-5.095 4.96v6.164h2.21V76.18c0-1.54 1.303-2.81 2.885-2.81h.937v-2.15zm15.022-3.505v14.63h2.21V69.268c0-.902-.158-1.555-1.395-1.555h-.815zm20.453 7.014l2.148 7.613h2.255l3.267-11.167h-2.21l-2.187 7.78-2.18-7.78-1.094.017-1.088-.017-2.182 7.78-2.187-7.78h-2.21l3.266 11.17h2.253l2.146-7.614.003-.003zm24.54-3.51h-.94c-2.802 0-5.096 2.23-5.096 4.96v6.164h2.21V76.18c0-1.54 1.3-2.81 2.882-2.81h.94v-2.15h.003zM68.29 75.696a7.736 7.736 0 0 1 1.756-.35c.85-.073 1.456-.158 1.87-.282.93-.27.915-.99.3-1.366-.347-.214-.99-.37-1.633-.37h-3.776v-2.15h3.666c2.56.017 4.62 1.162 4.62 3.82v3.224c0 1.275.087 2.12-1.01 3.08-.95.822-2.48 1.24-3.975 1.204-1.03-.025-2.136-.237-2.988-.78-.69-.442-1.21-1.11-1.376-2.01-.244-1.3.19-2.512 1.185-3.307.403-.32.874-.55 1.362-.716v.005zm.046 2.33c-.632.552-.623 1.397.01 1.9.94.747 4.536.742 4.536-1.188v-1.933c-1.172.505-2.282.446-3.342.688-.43.1-.875.242-1.206.533h.002zm21.256-2.32c1.655-.615 1.413-2.26-.627-2.478a7.095 7.095 0 0 0-.667-.035c-1.15-.002-2.563.342-2.563 1.7v1.573c1.387-.595 2.624-.303 3.857-.76z">
                                </path>
                                <path class="logo-sign" fill="#04C4C4"
                                    d="M17.115 48.07L29.88 60.593H17.13l-.015-12.525zM71.31 34.155L91.26 53.74a3.976 3.976 0 0 1 .062 5.622c-.02.02-.04.042-.062.062-1.57 1.54-4.14 1.565-5.738.05l-.052-.05-25.738-25.268h11.58zm-13.673 0H46.06l25.74 25.27c1.57 1.54 4.138 1.563 5.735.05l.053-.05a3.978 3.978 0 0 0 .06-5.625l-.06-.06-19.95-19.584zm-13.674 0H32.387l25.734 25.27c1.574 1.54 4.145 1.562 5.743.046l.05-.047a3.98 3.98 0 0 0 .06-5.626l-.06-.06-19.95-19.584zm-13.67 0h-11.58L33.597 48.77c1.57 1.545 4.138 1.566 5.738.05.017-.015.035-.03.052-.05a3.98 3.98 0 0 0 .055-5.627l-.055-.055-9.096-8.932zM17.112 46.01l14.87 14.584h11.574L17.13 34.76l-.015 11.25z">
                                </path>
                                <path class="label" fill="none" d="M17.02 17.042h54.5v7h-54.5v-7z"></path><text
                                    transform="translate(17.02 22.77)" fill="#FFF" font-family="'ArialNarrow'"
                                    font-size="8" letter-spacing="1.5">CRAFTED BY</text>
                            </svg>

                        </a>
                    </div>
                    <div class="footer__content col-md-10  col-12">
                        <div class="footer-menu">
                            <div class="footer-menu__section footer-menu__section--mobile-off">
                                <h4 class="footer-menu__title">Products</h4>
                                <ul class="footer-list">
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="https://www.coupler.io/" target="_blank"
                                            rel="noopener noreferrer">Сoupler</a>
                                    </li>
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="https://jirachecklist.com" target="_blank"
                                            rel="noopener noreferrer">Jira Smart Checklist</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-menu__section footer-menu__section--mobile-off">
                                <h4 class="footer-menu__title">Experience</h4>
                                <ul class="footer-list">
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="https://railsware.com/open-source/">Open
                                            Source</a>
                                    </li>
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="https://railsware.com/blog">Railsware
                                            Blog</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-menu__section">
                                <h4 class="footer-menu__title footer-menu__title--pale">Mailtrap</h4>
                                <ul class="footer-list">
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="/pricing">Pricing</a>
                                    </li>
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="/changelog">Changelog</a>
                                    </li>
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="http://status.mailtrap.info">Status</a>
                                    </li>
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="/terms">Terms of Service</a>
                                    </li>
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="/privacy">Privacy Policy</a>
                                    </li>
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="/navigational-info">Navigational
                                            Information</a>
                                    </li>
                                    <li class="footer-list__item">
                                        <a class="footer-list__link" href="/dpa">DPA</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-menu__section footer-menu__section--mobile">
                                <h4 class="footer-menu__title footer-menu__title--pale">Contact</h4>
                                <ul class="footer-list">
                                    <li class="footer-list__item">email: <a class="footer-list__link"
                                            href="mailto:%73%75%70%70%6f%72%74@%6d%61%69%6c%74%72%61%70.%69%6f">support[at]mailtrap.io</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <br>
                        <div class="footer-copyright">
                            <div class="footer-copyright__company">
                                <p>
                                    © Railsware Products, Inc.
                                </p>
                            </div>
                            <div class="footer-copyright__text">
                                <p>What is Mailtrap?</p>
                                <p>
                                </p>
                                <p>Mailtrap is a test mail server solution that allows testing email notifications
                                    without
                                    sending them to the real users of your application. Not only does Mailtrap work
                                    as a
                                    powerful email test tool, it also lets you view your dummy emails online,
                                    forward
                                    them
                                    to your regular mailbox, share with the team and more! Mailtrap is a mail server
                                    test
                                    tool built by Railsware Products, Inc., a premium software development
                                    consulting
                                    company.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>

<script>

</script>