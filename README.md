# tivowebremote

A web page that displays an image of a Virgin Media TIVO remote control. Any buttons pressed on that image are translated into IRCODE messages and sent to the local TIVO box via TCP.

Also provides a php-cgi backed interface to convert HTTP requests into TIVO IRCODE signals sent over TCP.

### What?

*ircodesender.php* accepts HTTP GET calls with a URI attribute of "IRCOMMAND". It will take the contents of that attribute and send it from the hosting server as a single TCP message to a configured port and IP address. eg:

`http://myremoteserver/tivo/ircodesender.php?IRCOMMAND=PLAY`

will be forwarded on to the tivo server as a single TCP message `IRCODE PLAY`
This allows simple shortcuts to be set up on a smartphone homescreen to command the tivo box. It also provides the back-end to allow the remote control page to work.

*index.html* displays an image of the TIVO remote control, with an javascript backed imagemap sending the corresponding IRCODE to ircodesender.php.



### Why?

I hate cables and I hate boxes, the only thing around a TV should be a nice clean wall. I also hate clutter. As a result my TV is wall mounted and my TIVO is on the other side of that wall, the remote control is in a box and I control the TV using one of the many excellent TIVO remote control android apps in the google play store.

The problem is that anyone else who wants to control the TV needs to install and configure the app, which is a pain. By running this web page on my home server they simply need to navigate to a local URL and start pressing buttons.
