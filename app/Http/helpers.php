<?php
function host($url) {
    return preg_replace(['/^https?:\/\//', '/\/$/'], '' , $url);
}