<?php

namespace App\Http\Controllers\Employee\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Http\Requests\Employee\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated employee's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user('employee')->hasVerifiedEmail()) {
            return redirect()->intended(route('employee.dashboard').'?verified=1');
        }

        if ($request->user('employee')->markEmailAsVerified()) {
            event(new Verified($request->user('employee')));
        }

        return redirect()->intended(route('employee.dashboard').'?verified=1');
    }
}
