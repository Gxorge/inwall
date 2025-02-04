window.addEventListener("DOMContentLoaded", function() {
    Echo.private("notifications.terminal." + terminalId)
        .listen("TerminalNotificationSent", (e) => {
            showNotification(e.title, e.message);
        });
    Echo.private("notifications.site." + siteId)
        .listen("SiteNotificationSent", (e) => {
            showNotification(e.title, e.message)
        })
}, false);
