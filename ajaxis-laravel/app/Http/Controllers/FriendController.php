<?php
namespace App\Http\Controllers;
use Request;
use Session;
use AjaxisGenerate;
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
        //return $friends;
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

          $k = new AjaxisGenerate(
            array(
               array("value" => $friend->firstname,"name" => 'firstname', "type" =>"text"),
               array("value" => $friend->lastname,"name" => 'lastname', "type" =>"text")
            ),$friend->id
            );
          return $k->toString();
          /*
          $k = startGenerate();
          $k .= generateInput($friend->firstname,'firstname','text');
          $k .= generateInput($friend->lastname,'lastname','text');
          $k .= generateInput($friend->birthday,'birthday','date');
          $k .= generateInput($friend->phone,'phone','text');
          $k .= endGenerate($id);*/
        
        if (Request::ajax()) {
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
        if (Request::ajax()) {
            
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
