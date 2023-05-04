<?php

namespace App\Http\Requests;

use Closure;
use App\Enums\Gender;
use App\Models\Group;
use App\Models\Member;
use App\Enums\MemberPosition;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    /**
     * The key to be used for the view error bag.
     *
     * @var string
     */
    protected $errorBag = 'addMember';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $group = Group::find($this->id);
        // dd($group);
        return $group && $group->managing_user_id == $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'max:40'],
            'age' => ['required', 'numeric'],
            'gender' => [
                'required',
                //new Enum(Gender::class)
            ],
            //'school_id' => ['required', Rule::exists('schools', 'id')],
            'tel' => ['required','numeric'],
            'address'=>['required'],
            'position' => [
                'required',
                //new Enum(MemberPosition::class),
                function (string $attribute, mixed $value, Closure $fail) {
                    //if ($value === MemberPosition::Teacher) {
                    if ($value === 2) {
                        $group = Group::find($this->id);

                        if ($group->teacher() != null) {
                            $fail("{$attribute}: There can only be one teacher in a group.");
                        }
                    }

                    // if ($value === MemberPosition::GroupLeader) {
                    if ($value === 1) {
                        $group = Group::find($this->id);

                        if ($group->leader() != null) {
                            $fail("{$attribute}: There can only be one leader in a group.");
                        }

                    }
                },
            ],
        ];
    }

    /**
    * Prepare the data for validation.
    *
    * @return void
    */
    protected function prepareForValidation()
    {
        $this->merge([
            'gender' => (int) $this->gender,
            'position' => (int) $this->position,
        ]);
    }
}
