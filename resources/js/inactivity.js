    /**
     * @type {NodeJS.Timeout}
     */
var inactivityTimeout;

var inactivityTime = function() {
    /**
     * @type {NodeJS.Timeout}
     */
    // DOM Events
    document.onmousemove = resetTimer;
    document.onkeydown = resetTimer;
    document.onmousedown = resetTimer;

    function goToTime() {
        location.href = '/time'
    }

    function resetTimer() {
        clearTimeout(inactivityTimeout);
        inactivityTimeout = setTimeout(goToTime, 10000)
    }
};

window.addEventListener('load', function () {
    inactivityTime();
});
