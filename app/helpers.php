<?php

if (!function_exists('admin_uploads')) {
    function admin_uploads($name) {
        return '/uploads/' . $name;
    }
}

if (!function_exists('vue')) {
    function vue(string $value) {
        return '{{' . $value . '}}';
    }
}