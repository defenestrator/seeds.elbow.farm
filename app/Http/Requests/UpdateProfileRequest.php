<?php

namespace Cheeba\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Cheeba\Profile;
class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return Auth::user()->can('update', Profile::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'riu_username'      => 'max:140',
            'instagram_handle'  => 'max:140',
            'facebook_url'      => 'max:140',
            'chuckers_paradise' => 'max:140',
            'user_title'        => 'max:140',
            'user_id'           => 'integer',
            'public'            => 'boolean'
        ];
    }
}
