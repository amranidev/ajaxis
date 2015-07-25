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
    public function index() {
        $friends = Friend::all();
        return view('Friend.index', compact('friends'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        
        //
        
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        
        //
        
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        
        //
        
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $friend = Friend::findOrfail($id);
        $k = '<form class="col s12 id = "friendForm" method = "post">
        <input type = "hidden" name = "_token" value = "'.Session::token().'">
        <div class="modal-content">
            <h4>Edit</h4>
           <div class="row">
          <div class="input-field col s6">
           <input  name="firstname" type="text" class = "validate" value = "' . $friend->firstname . '">
          <label for="firstname" class="active">First Name</label>
        </div>
        <div class="input-field col s6">
          <input name="lastname" type="text" class="validate" value = "' . $friend->lastname . '">
          <label for="lastname"class="active">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="birthday" type="text" class="validate" value = "' . $friend->birthday . '">
          <label for="birthday"class="active">Birthday</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="phone" type="text" class="validate" value = "' . $friend->phone . '">
          <label for="phone"class="active">phone</label>
        </div>
      </div>
    
    </div>
            <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat closeModal">close</a>
            <a href="#!" class="waves-effect waves-green btn-flat update" data-id = "'. $id .'" data-route = "friends" data-action = "update">agree</a>
        </div>
    </form>
';
        if (Request::ajax()) {
            
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
    public function update(Request $request, $id) {
        
        $friend = Friend::findOrfail($id);
        $input = Request::except('_token');
        //return $fried->firstname; 
        $friend->firstname = $input['firstname'];  
        $friend->lastname = $input['lastname'];  
        $friend->birthday = $input['birthday'];  
        $friend->phone = $input['phone'];  
        
        $friend->save();
        if(Request::ajax()){

            return 'Vrais';
        }
        
        return 'false';
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $f = Friend::findOrfail($id);
        $f->delete();
        
        return 'Done';
    }
}
