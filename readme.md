# Laraval URL shortener

## Routes

## Features

Every time a shortened link is visited and redirects.

### Statistic

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
