<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manager_id', 'employee_id', 'break', 'start_time', 'end_time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    // protected $dateFormat = "r";

    protected $dates = ['start_time','end_time','created_at','updated_at'];

    protected $casts = ['start_time'=>'datetime','end_time'=>'datetime'];

    protected $table = "shifts";

    /**
     * Returns all coworkers from similar time shifts
     * @return Collection of users
     */
    public function coworkers()
    {
      // find shifts with a start time before or equal to this start time
      // an end time after this start time
      // and a start time less than the end time
      $coworkers = Shift::where('start_time', '>=', $this->start_time)
                    ->where('end_time','>',$this->start_time)
                    ->where('start_time', '<', $this->end_time)
                    ->with('employee')->get();
      return $coworkers;
    }

    public function employee()
    {
      return $this->belongsTo('App\User','employee_id');
    }

    public function manager()
    {
      return $this->belongsTo('App\User','manager_id');
    }

}
