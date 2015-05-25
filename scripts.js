function showParticipants(str) {
    if (str.length == 0) { 
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "interactive_content.php?event_id=" + str, false);
        xmlhttp.send();
        return xmlhttp.responseText;
    }
}
