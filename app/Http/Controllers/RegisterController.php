<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Input;
// use Form;

use App\User;
use Validator;
use PragmaRX\ZipCode\ZipCode;


class RegisterController extends Controller
{
    public function __construct(){

    }

    public function index(){
    	return view('home');
    }

    public function register(Request $request){

    	// var_dump(Input::all());

        // https://laravel.com/docs/5.4/helpers#method-array-except
        // turns key/pair into array except for _token (laravel security feature to prevent CSRF attacks)
        $arrayData = array_except($request->all(), '_token');

        Validator::extend('checkInitials', function($attribute, $value, $parameters, $validator){

            $firstName = array_get($validator->getData(), $parameters[0]);

            // To match the first letter of parameter value with the initial value
            return ($value == $firstName[0]);

            /*
             * To allow following initials:
             * A.   A.B.    A.B.C.
             * Regex: ^(?:[A-Z]\.){1,3}$
             */

            // $firstName = strtoupper($firstName);
            // $firstLetter = substr($firstName, 0, 1);

            // $firstInitial = substr($substr, 0, 1);
            // $firstInitial = substr($firstInitial, 0, 1);

            // return $firstName == $firstInitial;

        });

        Validator::extend('phone_number', function($attribute, $value, $parameters){
            return substr($value, 0, 2) == '01';
        });

        $rules = [
            'firstName' => 'required',
            'initials' => 'required', //|checkInitials:firstName
            'email' => 'required|email',
            'phone' => 'required|numeric|phone_number',
            'postalCode' => 'required|size:6',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            //regular expression taken from https://gist.github.com/Michael-Brooks/fbbba105cd816ef5c016
        ];


        /* Custom message for validation rules */
        $messages = [
            'check_initials' => 'Invalid Initials Provided',
            'phone.phone_number' => 'Invalid Phone Number'
        ];

        $valid = Validator::make($arrayData, $rules, $messages);

        if( $valid->passes() ){
            /* Form Validation was successful */

            $zipcode = new ZipCode();
            $zipcode->setCountry('CA');

            if($zipcode->find($arrayData['postalCode'])->success){
                // followed from: https://laravel.com/docs/4.2/eloquent#mass-assignment
                $user = User::create($arrayData);
                return view('register', compact('user'));
            }

        }else{
            /* Unsuccessful input, keep previous input in fields*/
            return redirect('/')->withErrors($valid)->withInput();
        }
    }

    public function overview(){
        $users = User::all();

        $zipcode = new ZipCode();
        $zipcode->setCountry('CA');

        $cities = [];

        foreach ($users as $user) {
            $city = $zipcode->find($user->postalCode)->addresses[0];
            $cities[$user->postalCode] = $city;
        }

        // https://www.quora.com/What-does-compact-do-in-Laravel
        return view('overview', compact('users', 'cities'));
    }
}
