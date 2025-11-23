<?php
namespace app\model;

use think\Model;

class News extends Model
{
    protected $name = 'news';
    
    protected $type = [
        'is_published' => 'boolean',
        'is_top' => 'boolean',
        'views' => 'integer',
        'sort_order' => 'integer'
    ];

    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}


