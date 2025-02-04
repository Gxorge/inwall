window.addEventListener("DOMContentLoaded", function() {
    Echo.private("notifications.terminal." + terminalId)
        .listen("TerminalNotificationSent", (e) => {
            showNotification(e.title, e.message);
        });
}, false);
