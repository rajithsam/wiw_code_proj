<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShiftRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // the user is behind the manager middleware
      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'manager_id'=>'required',
        'employee_id'=>'required',
        'break'=>'required',
        'start_time'=>'required',
        'end_time'=>'required'
      ];
    }
}
