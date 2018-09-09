# Laraval URL shortener

This package is a fully fledged url shortener. At the moment it provides a REST API only. The API is secured with JWT. There are (kinda unstyled) views for redirect events (not found, insecure).

## Routes

```
+-------------+-----------+-------------------------+---------------+---------------------------------------------------------------------------+--------------+
| Domain      | Method    | URI                     | Name          | Action                                                                    | Middleware   |
+-------------+-----------+-------------------------+---------------+---------------------------------------------------------------------------+--------------+
| api.lg.test | GET|HEAD  | health                  |               | App\Http\Controllers\HealthController                                     | api          |
|             | POST      | oauth/token             |               | Laravel\Passport\Http\Controllers\AccessTokenController@issueToken        | throttle     |
|             | POST      | oauth/token/refresh     |               | Laravel\Passport\Http\Controllers\TransientTokenController@refresh        | web,auth     |
|             | GET|HEAD  | oauth/tokens            |               | Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@forUser | web,auth     |
|             | DELETE    | oauth/tokens/{token_id} |               | Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy | web,auth     |
| api.lg.test | GET|HEAD  | v1/links                | links.index   | App\Http\Controllers\LinkController@index                                 | api,auth:api |
| api.lg.test | POST      | v1/links                | links.store   | App\Http\Controllers\LinkController@store                                 | api,auth:api |
| api.lg.test | GET|HEAD  | v1/links/{id}/clicks    |               | App\Http\Controllers\MetricsController@clicks                             | api,auth:api |
| api.lg.test | GET|HEAD  | v1/links/{id}/info      |               | App\Http\Controllers\LinkInfoController                                   | api,auth:api |
| api.lg.test | GET|HEAD  | v1/links/{id}/referrers |               | App\Http\Controllers\MetricsController@referrers                          | api,auth:api |
| api.lg.test | PUT|PATCH | v1/links/{link}         | links.update  | App\Http\Controllers\LinkController@update                                | api,auth:api |
| api.lg.test | DELETE    | v1/links/{link}         | links.destroy | App\Http\Controllers\LinkController@destroy                               | api,auth:api |
| api.lg.test | GET|HEAD  | v1/links/{link}         | links.show    | App\Http\Controllers\LinkController@show                                  | api,auth:api |
| api.lg.test | POST      | v1/login                |               | App\Http\Controllers\AuthController@login                                 | api          |
| api.lg.test | POST      | v1/logout               |               | App\Http\Controllers\AuthController@logout                                | api,auth:api |
| api.lg.test | GET|HEAD  | v1/me                   |               | App\Http\Controllers\AuthController@me                                    | api,auth:api |
| api.lg.test | POST      | v1/register             |               | App\Http\Controllers\AuthController@register                              | api          |
|             | GET|HEAD  | {hash}                  |               | App\Http\Controllers\RedirectController                                   | web          |
+-------------+-----------+-------------------------+---------------+---------------------------------------------------------------------------+--------------+
```

## Features

### Statistic

Every time a shortened link is visited and redirects it collects some statistics. This statistics include the following data:

- referrer
- date

### Safe browsing check

When enabled each shortened link is checked by [Google Safe Browsing](https://developers.google.com/safe-browsing/). If considered harmful the link is flagged and an "unsafe" page is shown before redirecting.

To enable this feature add `SAFE_CHECK=true` inside your `.env` file.

### Page crawling

When enabled each shortened link gets crawled and certain details are safed in the database.

The data collected is as follows:

- http_status
- url
- url_fetched
- domain
- html_title
- content_type
- content_length

To enable this feature add `CRAWL_PAGES=true` inside your `.env` file.

## Frontend

If you want to build a front-end for additional pages, or modify the 404 and unsafe page you can use tailwind.css. The build process will optimize and create distribution files. The file names include a hash to avoid caching problems and are imported in the pages automatically.

```
# create development files (includes all tailwind classes)
npm run dev

# creates dev files and watches for changes
npm run watch

# create production files
npm run build

# check if file size is ok (can be configured in package.json)
```

Before commiting eslint and prettier are executed on the commited files.
