<?php

namespace App\Http\Controllers\Auth;

use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Customers\Requests\CreateCustomerRequest;
use App\Shop\Customers\Requests\RegisterCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use App\Shop\Countries\Country;
use App\Shop\Roles\RoleUser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    private $customerRepo;

    /**
     * Create a new controller instance.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->middleware('guest');
        $this->customerRepo = $customerRepository;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        $locale = $request->session()->get('locale');
        if($locale==null) {
            $locale = 'fa';
        }
        App::setlocale($locale);
        $countries = Country::all();

        return view('auth.register', [
            'locale' => $locale,
            'countries' => $countries,
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Customer
     */
    protected function create(array $data)
    {
        $customer = $this->customerRepo->createCustomer($data);
        $roleUser = new RoleUser;
        $roleUser->user_id = $customer->id;
        $roleUser->user_type = 'App\Shop\Customers\Customer';
        $roleUser->role_id = 4;
        $roleUser->save();
        return $customer;
    }

    /**
     * @param RegisterCustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterCustomerRequest $request)
    {
        function generateRandomString($length = 4) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $customer = $this->create($request->except('_method', '_token'));
        Auth::login($customer);
        $code = generateRandomString();
        $customer->code = $code;
        $customer->save();
        try{
            $client = new \SoapClient('http://sw5p80.pdr.co.ir/?wsdl', array('encoding'=>'UTF-8'));
            $parameters['uUsername'] = "samadi";
            $parameters['uPassword'] = "2235948";
            $parameters['uNumber'] = "50001900500019";
            $parameters['uCellphones'] = $customer->mobile;
            $parameters['uMessage'] = 'پیوه ژن' . "\n" . 'تاییدیه تلفن همراه' . "\n" . route('smsverify', ["id"=>$customer->id, "code"=>$code]);
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
        }catch(Exception $e) {
            // echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        // return redirect()->route('accounts');
        return redirect('/admin');
    }
}
