<?php
namespace App\Http\Controllers;
use Request;
use Session;
use AjaxisGenerate;
use Response;
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
        
        $k = new AjaxisGenerate();
        
        $k = $k->simpleModalForm([
             ["value" => $friend->firstname, "name" => 'firstname', "type" => "text"],
             ["value" => $friend->lastname, "name" => 'lastname', "type" => "text"],
             ["value" => $friend->birthday , "name" => 'birthday',"type"=>'date'],
             ["value" =>$friend->phone , "name" => "phone","type" =>"text"] 
             ], 
             $friend->id);
        

        if (Request::ajax()) {
            return $k;
        }
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
        $friend->firstname = $input['firstname'];
        $friend->lastname = $input['lastname'];
        $friend->birthday = $input['birthday'];
        $friend->phone = $input['phone'];
        $friend->save();
        
        $k = new AjaxisGenerate();
         
         $Request = $k->generateRow([$friend->firstname,$friend->lastname,$friend->birthday,$friend->phone]);
         
         $Request .=$k->generateRowBtn([
            ['link'=>'#modal1','class'=>'action btn red  modal-trigger','value' => '<i class="material-icons">delete</i>' , 'id' => 0],
            ['link' => '#modal3', 'class'=>'edit btn green modal-trigger','value' =>'<i class = "material-icons">system_update_alt</i>','id'=>$friend->id]
            ]);

        if (Request::ajax()) {
            
            return $Request;
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
