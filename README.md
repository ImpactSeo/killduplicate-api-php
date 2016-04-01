# killduplicate-api-php
PHP Example Library to use [KillDuplicate](https://www.killduplicate.com) API

## Install this library
```
composer require impact-seo/killduplicate-api-php=dev-master
```
or download and uncompress archive

## Set config.php
- Copy your API Key (connect to your account and go to API -> settings)
- Set Your API Callback
- Give results folder write permissions (webserver user's ownership. www-data for Ubuntu, apache ...)
- Go to www.yourwebsite.com/vendor/impact-seo/killduplicate-api-php/index.php if you installed through composer or adapt path to where you extracted lib.

## API Documentation

Connect to your [killduplicate account](https://www.killduplicate.com/en/login).

## Troubleshouting

Be sure your callback is reachable over the network. 

For file permission issues (replace www-data by your webserver username)
```
chown -R www-data vendor/impact-seo/killduplicate-api-php/results
chgrp -R www-data vendor/impact-seo/killduplicate-api-php/results
chmod -R 775 vendor/impact-seo/killduplicate-api-php/results
```

## To Do
Add different return formats : xml,txt
