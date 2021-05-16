<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function contact(){

        $contacts = Contact::first();
        return view('layouts.pages.contact',compact('contacts'));
    }

    public function contactForm(Request $request){

       // dd($request->all());
        $contactForm = new ContactForm();
        $contactForm->name = $request->name;
        $contactForm->email = $request->email;
        $contactForm->subject = $request->subject;
        $contactForm->massage = $request->massage;
        $contactForm->save();

        return redirect(route('contact'))->with('success', 'Successfully Massage Sent');

    }

    public function destroy(ContactForm $contactForm)
    {

        $contactForm->delete();

        return redirect(route('contact.massage'))->with('success', 'Massage Deleted Successfully');
    }

}
