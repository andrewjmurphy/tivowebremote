function sendtotivo(IRCODE) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open('GET', "ircodesender.php?IRCOMMAND=" + IRCODE, true);
    xmlHttp.send( null );
}

function sendteleport(COMMAND) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open('GET', "ircodesender.php?TELEPORT=" + COMMAND, true);
    xmlHttp.send( null );
}
