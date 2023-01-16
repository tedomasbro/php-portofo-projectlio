<?php

use App\Models\metadata;

function get_meta_value($metakey){
    $data = metadata::where('meta_key', $metakey)->first();
    if ($data) {
        return $data->meta_value;
    }
}