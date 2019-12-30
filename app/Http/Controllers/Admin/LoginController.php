<?php

namespace App\Http\Controllers\Admin;

use App\Shop\Admins\Requests\LoginRequest;
use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendForgetMailable;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';


    /**
     * Shows the admin login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (auth()->guard('employee')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin.login');
    }

    /**
     * Login the employee
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $details = $request->only('email', 'password');
        $details['status'] = 1;
        if (auth()->guard('employee')->attempt($details)) {
            return $this->sendLoginResponse($request);
        }

        if (auth()->guard('web')->attempt($details)) {
            return $this->sendLoginResponse($request);
        }
        // $customer = Customer::where('email', $details['email'])->first();
        // if($customer && password_verify($details['password'], $customer->password)) {
        //     Auth::loginUsingId($customer->id);
        //     return $this->sendLoginResponse($request);
        // }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function forget()
    {
        Auth::logout();
        $locale = request()->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);
        $msg = '';
        if(request()->method()=='POST') {
            $msg = 'none';
            if(request()->input('email') && trim(request()->input('email'))!='') {
                
                $customer = Customer::where('email', request()->input('email'))->first();
                if($customer) {
                    $newpassword = uniqid('P');
                    $customer->password = bcrypt($newpassword);
                    $customer->save();
                    Mail::to($customer->email)->send(new SendForgetMailable($newpassword));
                    $msg = 'email';
                    return view('auth.forget', [
                        'locale' => $locale,
                        'msg' => $msg,
                    ]);
                }
            }
            if(request()->input('mobile')) {
                $customer = Customer::where('mobile', request()->input('mobile'))->first();
                if($customer) {
                    $newpassword = uniqid('P');
                    $customer->password = bcrypt($newpassword);
                    $customer->save();
                    try{
                        $client = new \SoapClient('http://sw5p80.pdr.co.ir/?wsdl', array('encoding'=>'UTF-8'));
                        $parameters['uUsername'] = "samadi";
                        $parameters['uPassword'] = "2235948";
                        $parameters['uNumber'] = "50001900500019";
                        $parameters['uCellphones'] = $customer->mobile;
                        $parameters['uMessage'] = 'پیوه ژن' . "\n" . 'رمز عبور جدید شما :' . "\n" . $newpassword;
                        $parameters['uFarsi'] = false;
                        $parameters['uTopic'] = false;
                        $parameters['uFlash'] = false;
                        $parameters['uUDH'] = '';
                        $res = $client->doSendSMS($parameters);
                        // if(strpos($res->doSendSMSResult,'Send OK') === 0){
                        //   echo 'OK : '.$res->doSendSMSResult;
                        // }else{
                        //   echo 'ER : '.$res->doSendSMSResult;
                        // }
                        $msg= 'sms';
                        return view('auth.forget', [
                            'locale' => $locale,
                            'msg' => $msg,
                        ]);
                    }catch(Exception $e) {
                        // echo 'Caught exception: ',  $e->getMessage(), "\n";
                        
                    }
                }
            }
        }
        return view('auth.forget', [
            'locale' => $locale,
            'msg' => $msg,
        ]);
    }
}
