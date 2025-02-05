<footer class="gweb-footer footer-sticky">
    <div class="footer-colours">
        @if(env('APP_ENV') == 'production')
            <div class="footer-colour" id="aston"></div>
            <div class="footer-colour" id="solihull"></div>
            <div class="footer-colour" id="george"></div>
            <div class="footer-colour" id="hotten"></div>
        @else
            <div class="footer-colour has-text-centered" id="george">Inwall is running in developer mode - some features may not act as expected.</div>
        @endif
    </div>
</footer>
