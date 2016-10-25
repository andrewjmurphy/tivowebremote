function sendtotivo(IRCODE) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open('GET', "ircodesender.php?IRCOMMAND=" + IRCODE, true);
    xmlHttp.send( null );
}
