<?php

namespace App\Http\Requests\Employee\Auth;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest as Existing;

class EmailVerificationRequest extends Existing
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (! hash_equals((string) $this->route('id'),
            (string) $this->user('employee')->getKey())) {
            return false;
        }

        if (! hash_equals((string) $this->route('hash'),
            sha1($this->user('employee')->getEmailForVerification()))) {
            return false;
        }

        return true;
    }

    /**
     * Fulfill the email verification request.
     *
     * @return void
     */
    public function fulfill()
    {
        if (! $this->user('employee')->hasVerifiedEmail()) {
            $this->user('employee')->markEmailAsVerified();

            event(new Verified($this->user('employee')));
        }
    }
}
