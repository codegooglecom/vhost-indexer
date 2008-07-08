<?php
/**
 * @file Generate an index page which includes a list of virtual hosts 
 * on this system
 * @author Alister Lewis-Bowen [alister@different.com]
 * ----------------------------------------------------------------------------
 * This software is distributed under the the MIT License.
 * 
 * Copyright (c) 2008 Alister Lewis-Bowen
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * ----------------------------------------------------------------------------
 */

function setVar($server_var,$default=null) {
  return isset($_SERVER[$server_var]) ? $_SERVER[$server_var] : $default;
}

$vhost_conf = setVar('VHOSTINDEXER_VHOST_CONFIG', '/etc/httpd/conf.d/vhost.conf');
$title = setVar('VHOSTINDEXER_TITLE', 'Virtual hosts on '. $_SERVER['HTTP_HOST']);
$header_content = setVar('VHOSTINDEXER_HEADER_CONTENT');
$pre_content = setVar('VHOSTINDEXER_PRE_CONTENT', '<p>These are the web servers that are hosted on this web server.</p>');
$post_content = setVar('VHOSTINDEXER_POST_CONTENT');
$footer_content = setVar('VHOSTINDEXER_FOOTER_CONTENT');
$style_file = setVar('VHOSTINDEXER_CSS_FILE', 'style.css');

$fh = fopen($vhost_conf, 'r');
$vhost_raw = fgets($fh);
fclose($fh);
print var_dump($vhost_raw);

?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr">
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
