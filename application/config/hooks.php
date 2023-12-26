<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/

$hook['before_insert'] = array(
    'class'    => 'TimestampHook',
    'function' => 'addTimestamps',
    'filename' => 'TimestampHook.php',
    'filepath' => 'hooks',
);

$hook['before_update'] = array(
    'class'    => 'TimestampHook',
    'function' => 'updateTimestamps',
    'filename' => 'TimestampHook.php',
    'filepath' => 'hooks',
);
