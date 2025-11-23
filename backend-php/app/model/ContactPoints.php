<?php
namespace app\model;

use think\Model;

class ContactPoints extends Model
{
    protected $name = 'contact_points';
    
    protected $type = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}

