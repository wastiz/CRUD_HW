$(document).ready(function () {
    // https://stackoverflow.com/questions/13932653/increase-displaying-time-of-django-messages 
    setTimeout(function () {
        $('.alert').fadeOut('slow');
    }, 5000); // <-- time in milliseconds, 1000 =  1 sec
});

// Puhasta otsingukast peale seda, kui lahtris hiirega klikitakse
function clearField() {
    document.getElementById('phrase').value = "";
}
