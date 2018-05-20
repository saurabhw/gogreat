<?php
echo 'curl extension/module loaded/installed: ';
echo ( !extension_loaded('curl')) ? 'no' : 'yes';
echo "<br />\n";
phpinfo(INFO_MODULES); // just to be sure
?>