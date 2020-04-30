<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\UsersPhone;
use Auth;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.home', ['users' => Auth::user()->contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newContact = User::where('username',$request->user)->first();
        $user = Auth::user();
        if($newContact)
        {
            foreach(Auth::user()->contacts as $user)
                if($user->id == $newContact->id)
                return redirect("/contact")->with('error', 'Sorry This Contact Already Exist');
            Contact::create([
                'user_id' => Auth::id(),
                'contact_id' => $newContact->id
            ]);
            return redirect("/contact")->with('success', 'Your Contact Has Been Added Successfully');
        }
        return redirect("/contact")->with('error', 'Sorry No Contact with that name');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $contact = DB::table('contacts')->where('contact_id', $id);
        if($contact->first()->user_id == Auth::id())
        {
            $contact->delete();
            return redirect("/contact")->with('success', 'Contact has Been Deleted Successfully');
        }
        return redirect("/contact")->with('error', 'UnAuthorized');
    }
}
