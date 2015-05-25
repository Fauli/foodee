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

function testiii() {
	id = 'show_participants_';
	var children = document.body.getElementsByTagName('*');
	for (var i = 0,
	    length = children.length; i < length; i++) {
		child = children[i];
		if (child.id.substr(0, id.length) == id)
			child.title = showParticipants(1);
	}
}


