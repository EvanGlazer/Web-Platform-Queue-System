/**
 * @author Evan Glazer
 */
require 'init.php';
require 'QueueList.php';
require 'QueueUpdate.php';
require 'QueueCheck.php';

function inactivity() {
    var timer;
    window.onload = checkactivity;
    window.onmousemove = checkactivity;
    window.onmousedown = checkactivity; // catches touchscreen presses
    window.onclick = checkactivity;     // catches touchpad clicks
    window.onscroll = checkactivity;    // catches scrolling with arrow keys
    window.onkeypress = checkactivity;

    function relocate() {
        window.location.href = ''; // facebook
        updateActivity();
    }
    
    function checkactivity() {
        clearTimeout(timer);
        timer = setTimeout(relocate, 600000);  // 5 minutes then relocate
}
inactivity();
 