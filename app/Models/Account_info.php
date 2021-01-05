<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account_info extends Model
{
    protected $primaryKey = 'account';
    public $timestamps = false;
    public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = ['account', 'name', 'gender', 'email','birthday', 'remark'];
    protected $guarded = [];

    public function findByAccount($account)
    {
        return Account_info::find($account);
    }
}
