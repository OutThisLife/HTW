# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /

# -------------------------------------------------------

# Redirect all URI's to their static HTML files

# 1 lvl
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{QUERY_STRING} ^$
RewriteRule ^([^/]+)/?$ /wp-content/plugins/i-static/content/$1.html [L]

# 2 lvl
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{QUERY_STRING} ^$
RewriteRule ^([^/]+)/([^/]+)/?$ /wp-content/plugins/i-static/content/$1-$2.html [L]

# 3 lvl
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{QUERY_STRING} ^$
RewriteRule ^([^/]+)/([^/]+)/([^/]+)/?$ /wp-content/plugins/i-static/content/$1-$2-$3.html [L]

# -------------------------------------------------------

# Homepage goes to index.html
RewriteCond %{REQUEST_FILENAME} /index.php
RewriteCond %{QUERY_STRING} ^$
RewriteRule . /wp-content/plugins/i-static/content/index.html [L]

# -------------------------------------------------------

# Enable viewing the WP-generated files if ?dynamic is passed
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{QUERY_STRING} ^dynamic
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
