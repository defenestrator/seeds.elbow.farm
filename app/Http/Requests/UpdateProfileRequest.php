<?php

namespace Heisen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Heisen\Profile;
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
            'avatar'            => 'min:2|max:140',
            'riu_username'      => 'min:2|max:140',
            'instagram_handle'  => 'min:2|max:140',
            'facebook_url'      => 'min:2|max:140',
            'chuckers_paradise' => 'min:2|max:140',
            'user_title'        => 'min:2|max:140',
            'user_id'           => 'integer',
            'public'            => 'boolean'
        ];
    }
}
