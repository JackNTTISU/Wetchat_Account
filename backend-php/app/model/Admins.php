<?php
namespace app\model;

use think\Model;

class Admins extends Model
{
    protected $name = 'admins';
    
    protected $type = [
        'is_active' => 'boolean'
    ];

    protected $hidden = ['password'];

    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}

