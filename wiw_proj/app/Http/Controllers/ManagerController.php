<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Shift;
use App\User;
use App\Http\Requests\ShiftRequest;

class ManagerController extends Controller
{
  protected $user;

  public function __construct()
  {
    $this->user = User::findOrFail( request()->input('user_id') );
  }

  /**
   * gets all the shifts
   * @return json data of the shifts
   */
  public function getShifts()
  {
    // WOULDDO: Shifts in the past, future, all
    // WOULDDO: My managed shifts, others' managed shifts
    return response()->json(Shift::all());
  }

  /**
   * Shows an edit for for testing the create new shifts
   * @return view
   */
  public function newShift()
  {
    // $managers = User::where('role','manager')->get();
    $employees = User::where('role','employee')->get();
    return view('manager.new_shift')->with(compact('employees'))->with('user',$this->user);
  }

  /**
   * creates a new shift
   * @param  CreateShiftRequest $request new shift requested
   * @return json                      result
   */
  public function createShift(ShiftRequest $request)
  {
    $shift = Shift::create($request->all());
    return response()->json($shift);
  }

  /**
   * gets the requested shift in an edit form
   * @param  Shift  $shift shift objects
   * @return view     form to edit shift
   */
  public function getShift(Shift $shift)
  {
    // we'll add a form, to edit this too
    // return response()->json($shift);
    // There should be some authorization in here, so that only a manager can
    // edit his/her own shift
    $employees = User::where('role','employee')->get();
    return view('manager.edit_shift')->with(compact('shift', 'employees'))->with('user',$this->user);
  }

  /**
   * updates the shift
   * @param  Shift        $shift   current shift being edited
   * @param  ShiftRequest $request shift requested
   * @return json                result
   */
  public function editShift(Shift $shift, ShiftRequest $request)
  {
    return response()->json($shift->update($request->all()));
  }

  /**
   * gets all employees
   * @return json list of all user objects who are employees
   */
  public function getEmployees()
  {
    $employees = User::where('role','employee')->get();
    return response()->json($employees);
  }

  /**
   * gets a specific employee user
   * @param  User   $employee the user to get
   * @return json       user data
   */
  public function getEmployee(User $employee)
  {
    return response()->json($employee);
  }


}
