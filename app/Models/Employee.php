<?php


namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company_id'
    ];

    public function getCompanyNameAttribute(){
        $company_id = $this->attributes['company_id'];
        return Company::where('id', $company_id)->first()->company_name;
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
