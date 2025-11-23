<?php
namespace app\model;

use think\Model;

class ContactMessages extends Model
{
    protected $name = 'contact_messages';
    
    protected $type = [
        'status' => 'integer'
    ];

    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
}


