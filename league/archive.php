<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<?php

   include $_SERVER['DOCUMENT_ROOT'].'/scripts/functions_page.php';

   $filename = "http://www.turkiball.com" . $_SERVER["PHP_SELF"];
   // Removes the slash if there is one
   if (substr($filename, (strlen($filename) - 1), 1) == '/')
   {  $filename = substr($filename, 0, (strlen($filename) - 1));
   }

   head(1); // Means we're in the feed

?>																								

</head>

<body>

<?php

   title();
   
   newsbar(1); // Means we're in the feed
   
   navbarleft();
   
   content(1, 8, 9999, 2, $filename); // for the fn entries, filename for echoContent
   
   bottom($filename);

?>			

</body>

</html>