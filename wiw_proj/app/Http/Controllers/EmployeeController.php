<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Shift;

class EmployeeController extends Controller
{

  protected $user;

  public function __construct()
  {
    $this->user = User::findOrFail( request()->input('user_id') );
  }

  /**
   * gets all the shifts assigned the employee
   * @return json   a collection of shift objects
   */
  public function getShifts()
  {
    // WOULDDO: select future, past, all shifts
    return response()->json($this->user->shifts);
  }

  /**
   * Gets a single shift with coworkers
   * @param  Shift  $shift instance of the shift
   * @return json        data of shift and coworkers
   */
  public function getShift(Shift $shift)
  {
    return response()->json( ['shift'=>$shift, 'coworkers'=>$shift->coworkers] );
  }

  /**
   * Gets all of the hours worked by week
   * @return json   data of hours worked
   */
  public function getHours()
  {
    $hours = $this->user->get_hours();
    return response()->json($hours);
  }

  /**
   * gets the managers from each shift
   * @return json  data of shift and manager
   */
  public function getManagers()
  {
    $shifts = $this->user->shifts;
    // this would normally be in a view
    $manager_arr = array();
    foreach($shifts as $s)
    {
      $manager_arr[] = array('shift' => $s, 'manager' => $s->manager);
    }
    return response()->json($manager_arr);
  }

  /**
   * gets the manager for the shift
   * @param  Shift  $shift instance of the shift
   * @return json data of the shift and manager
   */
  public function getManagerByShift(Shift $shift)
  {
    if($shift->employee_id == $this->user->id)
    {
      return response()->json($shift->manager);
    }
    abort(403,'That\'s not your shift!');
  }

}
