<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'email',
        'phoneNumber',
        'gender',
        'birthday',
        'observations',
        'loyalty',
        'created_by',
        'deleted',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birthday'
    ];

    protected static $inst = null;

    public static function getInstance()
    {
        if (self::$inst === null) {
            self::$inst = new self();
        }
        return self::$inst;
    }
}
