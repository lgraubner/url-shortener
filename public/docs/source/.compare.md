---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_7596fe649d40d31907da5551e64047fd -->
## v1/login

> Example request:

```bash
curl -X POST "http://api.lg.test/v1/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/login",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST v1/login`


<!-- END_7596fe649d40d31907da5551e64047fd -->

<!-- START_356afa9385c25c98c8549b848e5ea797 -->
## v1/register

> Example request:

```bash
curl -X POST "http://api.lg.test/v1/register" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/register",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST v1/register`


<!-- END_356afa9385c25c98c8549b848e5ea797 -->

<!-- START_e6941686a2feb4657a7acf2b80646202 -->
## v1/health

> Example request:

```bash
curl -X GET "http://api.lg.test/v1/health" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/health",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": {
        "status": 404,
        "description": "Not found."
    }
}
```

### HTTP Request
`GET v1/health`

`HEAD v1/health`


<!-- END_e6941686a2feb4657a7acf2b80646202 -->

<!-- START_0b5c986ba10de6d3bb867a0521a8c242 -->
## v1/links

> Example request:

```bash
curl -X GET "http://api.lg.test/v1/links" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/links",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": {
        "status": 404,
        "description": "Not found."
    }
}
```

### HTTP Request
`GET v1/links`

`HEAD v1/links`


<!-- END_0b5c986ba10de6d3bb867a0521a8c242 -->

<!-- START_7ccc1b73da5f959a94154749e54c7fce -->
## v1/links

> Example request:

```bash
curl -X POST "http://api.lg.test/v1/links" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/links",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST v1/links`


<!-- END_7ccc1b73da5f959a94154749e54c7fce -->

<!-- START_ac31f893aa7137db3ec7065d97b49f65 -->
## v1/links/{link}

> Example request:

```bash
curl -X GET "http://api.lg.test/v1/links/{link}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/links/{link}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": {
        "status": 404,
        "description": "Not found."
    }
}
```

### HTTP Request
`GET v1/links/{link}`

`HEAD v1/links/{link}`


<!-- END_ac31f893aa7137db3ec7065d97b49f65 -->

<!-- START_69b437529234674c56eb7efa70f979e3 -->
## v1/links/{link}

> Example request:

```bash
curl -X PUT "http://api.lg.test/v1/links/{link}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/links/{link}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT v1/links/{link}`

`PATCH v1/links/{link}`


<!-- END_69b437529234674c56eb7efa70f979e3 -->

<!-- START_da067cbd66292b5de618ad13f1cfc5a6 -->
## v1/links/{link}

> Example request:

```bash
curl -X DELETE "http://api.lg.test/v1/links/{link}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/links/{link}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE v1/links/{link}`


<!-- END_da067cbd66292b5de618ad13f1cfc5a6 -->

<!-- START_7b4fa8a59e9846351803a3da3f4111fb -->
## v1/links/{id}/clicks

> Example request:

```bash
curl -X GET "http://api.lg.test/v1/links/{id}/clicks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/links/{id}/clicks",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": {
        "status": 404,
        "description": "Not found."
    }
}
```

### HTTP Request
`GET v1/links/{id}/clicks`

`HEAD v1/links/{id}/clicks`


<!-- END_7b4fa8a59e9846351803a3da3f4111fb -->

<!-- START_1bf78846d4a7a05c9671da9827d6ebb8 -->
## v1/links/{id}/referrers

> Example request:

```bash
curl -X GET "http://api.lg.test/v1/links/{id}/referrers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/links/{id}/referrers",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": {
        "status": 404,
        "description": "Not found."
    }
}
```

### HTTP Request
`GET v1/links/{id}/referrers`

`HEAD v1/links/{id}/referrers`


<!-- END_1bf78846d4a7a05c9671da9827d6ebb8 -->

<!-- START_83d994b6d08869fc666b1e35b51a2aba -->
## v1/me

> Example request:

```bash
curl -X GET "http://api.lg.test/v1/me" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.lg.test/v1/me",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": {
        "status": 404,
        "description": "Not found."
    }
}
```

### HTTP Request
`GET v1/me`

`HEAD v1/me`


<!-- END_83d994b6d08869fc666b1e35b51a2aba -->

