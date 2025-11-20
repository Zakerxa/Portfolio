<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class ContactForm extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // This attribute will insert to database
    // protected $attributes = ['short_mail'];

    //Make it available in the json response
    protected $appends = ['authMail'];


    function scopeFilter($query, $filter)
    {
        $query->when($filter['search']??false, function ($query, $search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('email','LIKE', '%' . $search . '%');
        });
    }

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans();
    }

    //implement the attribute
    public function getEmailAttribute()
    {
        $start = substr($this->attributes['email'],0,3);
        $end = substr($this->attributes['email'],-10,10);
        return $start.'...'.$end;
    }

    public function getauthMailAttribute(){
     return $this->attributes['email'];
    }

    public function getNameAttribute($value){
        return ucwords($value);
    }

    protected function setPasswordAttribute($value){
      $this->attributes['password'] = bcrypt($value);
    }
}
