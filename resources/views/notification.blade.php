<script>
    function closeNotification() {
        document.getElementById("inwall-notification").style.display = "none";
    }

    function showNotification(title, content) {
        document.getElementById("inwall-notification-title").innerHTML = title;
        document.getElementById("inwall-notification-content").innerHTML = content;
        document.getElementById("inwall-notification").style.display = "block";
    }
</script>

<div class="modal" id="inwall-notification">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title" id="inwall-notification-title">Modal title</p>
        </header>
        <section class="modal-card-body">
            <p id="inwall-notification-content"></p>
        </section>
        <footer class="modal-card-foot">
            <div class="buttons">
                <button class="button is-success" onclick="closeNotification()">OK</button>
            </div>
        </footer>
    </div>
</div>
