<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsLetterController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {

            // (new Newsletter())->subscribe(request('email')); //first way
            $newsletter->subscribe(request('email'));    //second way

        } catch (\Exception$ex) {

            throw ValidationException::withMessages([
                'email' => 'this email could not be added to our newsletter list.',
            ]);
        }

        return back()->with('success', 'You are now signed for our newsletter!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
