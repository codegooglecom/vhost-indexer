<?php
/**
 * @file Generate an index page which includes a list of virtual hosts 
 * on this system
 * @author Alister Lewis-Bowen [alister@different.com]
 * 
 * StickyVariable function taken from http://bytes.com/forum/thread4089.html
 */

function StickyVariable($name, $default = null) {
  if(isset($_REQUEST[$name])) {
    $GLOBALS[$name] = $_SESSION[$name] = $_REQUEST[$name];
  }
  else if(isset($_SESSION[$name])) {
    $GLOBALS[$name] = $_SESSION[$name];
  }
  else {
    $GLOBALS[$name] = $default;
  }
}

StickyVariable("VHOSTINDEXER_TITLE", '**Virtual hosts on this server');
print var_dump($VHOSTINDEXER_TITLE);

$title = $VHOSTINDEXER_TITLE;
$header_content = $_ENV["VHOSTINDEXER_HEADER_CONTENT"];
$pre_content = $_ENV["VHOSTINDEXER_PRE_CONTENT"];
$post_content = $_ENV["VHOSTINDEXER_POST_CONTENT"];
$footer_content = $_ENV["VHOSTINDEXER_FOOTER_CONTENT"];
$style_file = $_ENV["VHOSTINDEXER_CSS_FILE"];

$language = $HTTP_ACCEPT_LANGUAGE;

$fh = fopen($vhost_conf, 'r');
$vhost_raw = fgets($fh);
fclose($fh);

?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language; ?>" lang="<?php print $language; ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>
            <?php print $title ?>
        </title>
        <?php if ($style_file): ?>
        <style type="text/css" media="all">@import "<?php print $style_file ?>"
        </style>
        <?php endif; ?>
    </head>
    <body>
        <div id="header">
            <h1>
                <?php print $title ?>
            </h1>
            <?php if ($header_content): ?>
            <div id="header_content">
            </div>
            <?php endif; ?>
        </div>
        <div id="main">
            <?php if ($pre_content): ?>
            <div id="pre_content">
            </div>
            <?php endif; ?>
            <?php if ($vhosts): ?>
            <div id="content">
                <?php print $vhosts ?>
            </div>
            <?php endif; ?>
            <?php if ($post_content): ?>
            <div id="post_content">
            </div>
            <?php endif; ?>
        </div>
        <div id="footer">
            <?php if ($footer_content): ?>
            <div id="footer_content">
            </div>
            <?php endif; ?>
            <div id="credit">
                Powered by vhost-indexer, written by Alister Lewis-Bowen
            </div>
        </div>
    </body>
</html>
