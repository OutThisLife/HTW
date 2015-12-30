# What it does
This plugin will generate static HTML files for all of your pages in WordPress and serve them to the client. The speed increase has been measured to be up to 70%+.

# Setup
You'll need to upload the plugin and make the 'content' folder writable and then apply the htaccess or nginx configs per your server setup below.

# Nginx conf setup
Add this to your server config.

```
location / {
	\# Redirect all URI's to their static HTML files
	if (!-e $request_filename){
		rewrite ^/([^/]+)/(.*?)/?$ /wp-content/plugins/i-static/content/$1.html break;
	}

	\# Homepage goes to index.html
	if (-e $request_filename){
		rewrite ^(.*)$ /wp-content/plugins/i-static/content/index.html break;
	}
}
```

# Apache .htaccess setup
Just replace the default WP htaccess block with the below.

```
\# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On

\# Redirect all URI's to their static HTML files
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{QUERY_STRING} ^$
RewriteRule ^([^/]+)/(.*?)/?$ /wp-content/plugins/i-static/content/$1.html [L]

\# Homepage goes to index.html
RewriteCond %{REQUEST_FILENAME} -f
RewriteRule . /wp-content/plugins/i-static/content/index.html [L]

\# Enable viewing the WP-generated files if ?dynamic is passed
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{QUERY_STRING} ^dynamic
RewriteRule . /index.php [L]
</IfModule>
\# END WordPress
```