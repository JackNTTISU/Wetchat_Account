<?php
namespace app\model;

use think\Model;

class Uploads extends Model
{
    protected $name = 'uploads';
    
    protected $type = [
        'file_size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'uploaded_by' => 'integer'
    ];

    protected $createTime = 'created_at';
    protected $updateTime = false;
}


