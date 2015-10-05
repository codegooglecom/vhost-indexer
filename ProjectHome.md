Vhost-indexer is a simple PHP script, `index.php`, that you configure through environment variables in your `.htaccess` file. This results is an auto generated index page listing your configured virtual hosts parsed from your apache configuration as an unordered list of links.

To see examples of how vhost-indexer has been used, look at http://iic-prod.seas.harvard.edu/.

A sample CSS file, style.css, is provided that borrows from the fantastic [BluePrintCSS](http://www.blueprintcss.org/) project.

## Configuration ##

Using the Apache `SetEnv` stanza in your `.htaccess` file, located in the same directory as the `index.php`, you can define the location of the `httpd.conf` or specific vhost configuration file, the CSS file and any content you want to display in the index page.

The sample `.htaccess` file given, provides the following settings:

```
#
# The location of your vhost configuration...
#
#SetEnv VHOSTINDEXER_VHOST_CONFIG '/etc/httpd/conf.d/vhost.conf'

#
# The name of the CSS file used to style the content of the index page...
#
#SetEnv VHOSTINDEXER_CSS_FILE 'style.css'

#
# The text used for the title of the index page...
#
#SetEnv VHOSTINDEXER_TITLE 'Virtual hosts on this server'

#
# The content that should be placed in the header division of the index page after
# the title heading...
#
SetEnv VHOSTINDEXER_HEADER_CONTENT '<strong>More index for your index</strong>'

#
# The content that should be place just before the list of vhosts in the main 
# division of the index page...
#
#SetEnv VHOSTINDEXER_PRE_CONTENT '<p>These are the web servers that are hosted on this web server.</p>'

#
# The content that should be placed just after the list of vhosts in the main
# division of the index page...
#
#SetEnv VHOSTINDEXER_POST_CONTENT '<p>Contact the site administrator for more information.</p>'

#
# The content that should be placed in the footer division of the index page...
#
#SetEnv VHOSTINDEXER_FOOTER_CONTENT '<p>&copy;The division of joy</p>'

```
