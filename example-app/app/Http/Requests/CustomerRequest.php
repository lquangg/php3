<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules =[];
        $currenAction =$this->router()->getActionMethod();
        switch($this->method()){
            case 'POST':
                switch($currenAction){
                    case 'add_customer':
                        $rules =[
                            'name'=>'required',
                            'name'=>'max:225',
                            'email'=>'required|unique:customer',
                            'email'=>'required|unique:customer,max:10',
                        ];
                }
        }
        return [
            //
        ];
    }
}
