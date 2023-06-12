<?php

/** --------------------------------------------------------------------------------
 * This middleware class validates input requests for the orders controller
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Requests\Orders;

use App\Rules\CheckBox;
use App\Rules\NoTags;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class OrderStoreUpdate extends FormRequest {

    /**
     * we are checking authorised users via the middleware
     * so just retun true here
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * custom error messages for specific valdation checks
     * @optional
     * @return array
     */
    public function messages() {
        return [];
    }

    /**
     * Validate the request
     * @return array
     */
    public function rules() {

        //initialize
        $rules = [];

        /**-------------------------------------------------------
         * common rules for both [create] and [update] requests
         * ------------------------------------------------------*/
        $rules += [
            'order_title' => [
                'required',
                new NoTags,
            ],
            'order_priority' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!array_key_exists($value, config('settings.order_priority'))) {
                        return $fail(__('lang.invalid_priority'));
                    }
                },
            ],
            // 'order_projectid' => [
            //     'required',
            //     function ($attribute, $value, $fail) {
            //         if (!\App\Models\Project::Where('project_id', $value)->first()) {
            //             return $fail(__('lang.project_not_found'));
            //         }
            //     },
            // ],
            'order_status' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (\App\Models\orderStatus::Where('orderstatus_id', $value)->doesntExist()) {
                        return $fail(__('lang.invalid_status'));
                    }
                },
            ],
            'order_date_due' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) {
                    if ($value != '' && request('order_date_start') != '' && (strtotime($value) < strtotime(request('order_date_start')))) {
                        return $fail(__('lang.target_date_must_be_after_date_added'));
                    }
                }],
            'order_client_visibility' => [
                'nullable',
                new CheckBox,
            ],
            'order_billable' => [
                'nullable',
                new CheckBox,
            ],
            'assigned' => [
                'sometimes',
                function ($attribute, $value, $fail) {
                    if (is_array($value)) {
                        foreach ($value as $user_id) {
                            if (\App\Models\User::Where('id', $user_id)->where('type', 'team')->doesntExist()) {
                                return $fail(__('lang.assiged_user_not_found'));
                                break;
                            }
                        }
                    } else {
                        return $fail(__('lang.assigned') . ' - ' . __('lang.is_invalid'));
                    }
                },
            ],
        ];

        //validate
        return $rules;
    }

    /**
     * Deal with the errors - send messages to the frontend
     */
    public function failedValidation(Validator $validator) {

        $errors = $validator->errors();
        $messages = '';
        foreach ($errors->all() as $message) {
            $messages .= "<li>$message</li>";
        }

        abort(409, $messages);
    }
}
