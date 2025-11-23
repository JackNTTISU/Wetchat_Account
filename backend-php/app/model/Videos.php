<?php
namespace app\model;

use think\Model;

class Videos extends Model
{
    protected $name = 'videos';
    
    protected $type = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'views' => 'integer',
        'sort_order' => 'integer',
        'file_size' => 'integer'
    ];

    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}


