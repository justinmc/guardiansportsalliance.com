<?php include("/usr/local/pem/vhosts/200877/webspace/httpdocs/password_protect.php"); ?>

<?php
require_once('board/SSI.php');
$_SESSION['login_url'] = 'http://www.guardiansportsalliance.com/board' . $_SERVER['PHP_SELF'];
$_SESSION['logout_url'] = 'http://www.guardiansportsalliance.com' . $_SERVER['PHP_SELF'];
?>

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
   
   content(1, 0, 1, 0, $filename); // in feed, for the fn entries, filename for echoContent
   
   if (!$_GET["num"])
   {  // Makes $num be the newest news item of any type
      $num = end(getposts(0));
   }
   else 
   {  $num = $_GET["num"];
   }
   
   bottom($num);

?>			

</body>

</html>
