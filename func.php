<?php
require 'vendor/autoload.php';

function toSlug($name) {
    return strtolower(str_replace(' ', '-', $name));
}