<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

Route::get('/', function () {
    return view('form');
});

Route::post('/submit', function (Request $request){

    $validator = Validator::make($request->all(), [
        'firstname' => ['required', 'max:255', 'regex:/^[a-zA-Z ]+$/'],
        'lastname' => ['required', 'max:255', 'regex:/^[a-zA-Z ]+$/'],
        'phone' => 'required|min:3|regex:/[0-9]/',
        'email' => ['required','email','regex:/^.+@.+$/i', 'unique:contacts'],
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $contact = new Contact;
    $contact->first_name = $request->firstname;
    $contact->last_name = $request->lastname;
    $contact->phone = $request->phone;
    $contact->email = $request->email;
    $contact->save();

    return redirect('/thankyou');

});

Route::get('/submit', function (){
    return redirect('/');

});

Route::get('/contacts', function (){
    $contacts = Contact::orderBy('created_at', 'asc')->get();

    return view('contacts', [
        'contacts' => $contacts
    ]);

});

Route::delete('/contact/{id}', function ($id){
    Contact::findOrFail($id)->delete();

    return redirect('/');
});

Route::get('/thankyou', function (){
    return view('thankyou');
});
