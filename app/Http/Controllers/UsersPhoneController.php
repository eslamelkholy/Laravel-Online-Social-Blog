<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersPhone;
use Auth;
use App\User;
use App\Http\Requests\PhoneRequest;
class UsersPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phones.index', ['phones' => Auth::user()->usersphones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("create", "App\UsersPhone");
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $myRequest = $request->all();
        $myRequest['user'] = Auth::id();
        UsersPhone::create($myRequest);
        return redirect("/phone")->with('success', 'Your Phone Number Has Been Added Successfully');
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
        $userPhone = UsersPhone::find($id);
        $this->authorize("view", $userPhone);
        return view('phones.edit', ['phone' => $userPhone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        
        $phone = UsersPhone::find($id);
        $this->authorize('update', $phone);
        $phone->update($request->all());
        return redirect("/phone")->with('success', 'Your Phone Number Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = UsersPhone::find($id);
        $this->authorize('delete', $phone);
        $phone->delete();
        return redirect("/phone");
    }
}
