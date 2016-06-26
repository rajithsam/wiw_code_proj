<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = "users";

    public function isManager()
    {
      return ($this->role == "manager");
    }

    public function shifts()
    {
      return $this->hasMany('App\Shift','employee_id');
    }

    public function get_hours()
    {
      $hours = \DB::select("SELECT SUM(TIMESTAMPDIFF(MINUTE, start_time, end_time))/60 AS total_time, WEEK(start_time) as week_num, DATE_ADD(start_time, INTERVAL(1-DAYOFWEEK(start_time)) DAY) as week_start, DATE_ADD(start_time, INTERVAL(7-DAYOFWEEK(start_time)) DAY) as week_end FROM shifts WHERE employee_id='".$this->id."' GROUP BY WEEK(start_time), YEAR(start_time) ORDER BY WEEK(start_time) ");
      return $hours;
    }

}
