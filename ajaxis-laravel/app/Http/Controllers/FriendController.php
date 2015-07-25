<?php

namespace App\Http\Controllers;
use Request;
use Session;
//use Illuminate\Http\Request;
use App\Friend;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
         $friends = Friend::all();
         return view('Friend.index',compact('friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $friend = Friend::findOrfail($id);
        $k = '<form class="col s12 id = "friendForm" method = "PATCH">
        <input type = "hidden"  name = "_token" value = "' . Session::token() . '">
        <input type = "hidden" name = "method" value = "patch">    
            <div class="row">
          <div class="input-field col s6">
           <input  id="first_name" type="text" class = "validate" value = "'.$friend->firstname.'">
          <label for="first_name" class="active">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" value = "'.$friend->lastname.'">
          <label for="last_name"class="active">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="birthday" type="text" class="validate" value = "'.$friend->birthday.'">
          <label for="birthday"class="active">Birthday</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="phone" type="text" class="validate" value = "'.$friend->phone.'">
          <label for="phone"class="active">phone</label>
        </div>
      </div>
    </form>
';
        if(Request::ajax()){
            //$k = json_encode($k);
           return $k;
          }

          $k = '<h1>Hello</h1><p>cava</p>';
          return $k;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $f = Friend::findOrfail($id);
        $f->delete();

        return 'Done';

    }
}
