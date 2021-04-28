<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name',
        'email',
        'address',
        'phone_number',
        'logo'
    ];

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    public function getIDAttribute(){
        return $this->attributes['id'];
    }


}
