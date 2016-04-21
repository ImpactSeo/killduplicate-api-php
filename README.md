# killduplicate-api-php
PHP Example Library to use [KillDuplicate](https://www.killduplicate.com) API

## Install this library
```
composer require impact-seo/killduplicate-api-php=dev-master
```
or download and uncompress archive

## Set config.php
- Copy your API Key (connect to your account and go to API -> settings)
- Set Your API Callback. (If you installed package via composer, it should look something like http://www.your-website.com/vendor/impact-seo/killduplicate-api-php/api_callback.php)
- Give results folder write permissions (webserver user's ownership. www-data for Ubuntu, apache ...)
- Go to www.yourwebsite.com/vendor/impact-seo/killduplicate-api-php/index.php if you installed through composer or adapt path to where you extracted lib.

## API Specifications

### Get your remaining credits
```
GET /api/public/credits/api_key
```
Params
```
api_key = Your Private API Key # required
```
Returns
```
credits
```

### Get scan cost (before running it for instance)
```
POST /api/public/price
```
Params
```
api_key = Your Private API Key # required
text = Your Text (UTF-8 encoded) # required
```

### Scan Text
```
POST /api/public/scan
```
Params
```
api_key = Your Private API Key # required
text = Your Text (UTF-8 encoded) # required
exclude_domains = Array of excluded domain names from duplicate search # optional
callback = Your callback url # required
format = desired return format # optional - possible values : json|xml - default : json 
result = desired return result type # optional - possible values : short|long - default : long
```
Returns
Immediate response
```
text_id : store this id for retrieving result in callback
credits : how much credits this scan has cost
```
Callback Response
```
{
    "id": "82",
    "resume": "Demain, d\u00e8s l'aube, \u00e0 l'heure o\u00f9 blanchit la ca",
    "filename": null,
    "credits": "1",
    "date": "2016-04-01 16:41:43",
    "callback": "http:\/\/www.your-website.com\/vendor\/impact-seo\/killduplicate-api-php\/api_callback.php",
    "format": "json",
    "result": "long",
    "duplicate": "0",
    "dup_percentage": "0",
    "text": null,
    "exclude_domains": {},
    "search_dupes": {
        "1692": {
            "id": "1692",
            "text_id": "82",
            "phrase": "Demain, d\u00e8s l'aube, \u00e0 l'heure o\u00f9 blanchit la",
            "search_dupe_results": []
        },
        ...
    },
    "search_dupe_results": [],
    "phrases_to_check": "11",
    "phrases_checked": 11,
    "results": []
}
```

### Errors
Possible error messages
```
UNKWONW_API_KEY : check your API key is corectly set in config.php ([Get your API Key](https://www.killduplicate.com/en/user/api))
UNAUTHORIZED_IP : check IP where script is run from is added to whitelist ([Chech Authorized IPs](https://www.killduplicate.com/en/user/api))
TOO_MANY_REQUESTS : only one request per second is allowed
NO_MORE_CREDITS : you dont' have enough credits to run this scan
EMPTY_TEXT_AND_URL : neither text nor url were provided
INTERNAL_ERROR : internal server error (please contact admin)
UNKNOWN_FORMAT : can only be json|xml
INVALID_CALLBACK_URL : invalid callback URL 
```


## Troubleshouting

Be sure your callback is reachable over the network. 

For file permission issues (replace www-data by your webserver username)
```
chown -R www-data:www-data vendor/impact-seo/killduplicate-api-php/results
chmod -R 775 vendor/impact-seo/killduplicate-api-php/results
```
