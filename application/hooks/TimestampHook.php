<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TimestampHook {

    public function addTimestamps($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    public function updateTimestamps($data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}