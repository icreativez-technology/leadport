<?php

/** --------------------------------------------------------------------------------
 * This middleware class validates input requests for the orders controller
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Requests\Orders;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class OrderRecurrringSettings extends FormRequest {

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
        return [
            'order_recurring_duration.required' => __('lang.repeat_every').' - '.__('lang.is_required'),
            'order_recurring_duration.integer' => __('lang.item_not_found').' - '.__('lang.is_invalid'),
            'order_recurring_cycles.required' => __('lang.cycles').' - '.__('lang.is_required'),
            'order_recurring_next.required' => __('lang.first_order_date').' - '.__('lang.is_required'),
        ];
    }

    /**
     * Validate the request
     * @return array
     */
    public function rules() {

        /**-------------------------------------------------------
         * common rules for both [create] and [update] requests
         * ------------------------------------------------------*/
        $rules = [
            'order_recurring_duration' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    if ($value <= 0) {
                        return $fail(__('lang.repeat_value_greater_than_zero'));
                    }
                },
            ],
            'order_recurring_period' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, ['day', 'week', 'month', 'year'])) {
                        return $fail(__('lang.invalid_repeat_every'));
                    }
                },
            ],
            'order_recurring_cycles' => [
                'required',
                'integer',
            ],
            'order_recurring_next' => [
                'date',
                function ($attribute, $value, $fail) {
                    if (strtotime($value) < strtotime(now()->toDateString())) {
                        return $fail(__('lang.first_order_date_cannot_be_in_past'));
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
