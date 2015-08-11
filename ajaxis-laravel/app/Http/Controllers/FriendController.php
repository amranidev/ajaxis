<?php
namespace App\Http\Controllers;
use Request;
use Session;
use AjaxisGenerate;
use Response;
use App\Friend;
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
        $route = 'friends';
        $action = 'store';
        $k = new AjaxisGenerate();
        $k = $k->createFormModal([['value' => '', 'name' => 'firstname', 'type' => 'text'], ['value' => '', 'name' => 'lastname', 'type' => 'text'], ['value' => '', 'name' => 'birthday', 'type' => 'date'], ['value' => '', 'name' => 'phone', 'type' => 'text'], ], '/friends/store/');
        if (Request::ajax()) {
            return $k;
        }
        return $k;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        
        $input = Request::except('_token');
        
        $friend = new Friend();
        $friend->firstname = $input['firstname'];
        $friend->lastname = $input['lastname'];
        $friend->birthday = $input['birthday'];
        $friend->phone = $input['phone'];
        $friend->save();
        
        $k = new AjaxisGenerate();
        $Request = $k->generateRow([$friend->firstname, $friend->lastname, $friend->birthday, $friend->phone]);
        
        $Request .= $k->generateRowBtn([['href' => '#modal1', 'class' => 'delete btn-floating red', 'value' => '<i class="material-icons">delete</i>', 'data-id' => $friend->id, 'data-link' => null], ['href' => '#modal3', 'class' => 'modalRow edit btn-floating green', 'value' => '<i class = "material-icons">system_update_alt</i>', 'data-id' => $friend->id, 'data-link' => '/friends/edit/']]);
        
        if (Request::ajax()) {
            return $Request;
        }
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
        $link = '/friends/update/';
        $id = $friend->id;
        
        $k = new AjaxisGenerate();
        
        $k = $k->editModalForm([
            ["value" => $friend->firstname, "name" => 'firstname', "type" => "text"],
             ["value" => $friend->lastname, "name" => 'lastname', "type" => "text"],
              ["value" => $friend->birthday, "name" => 'birthday', "type" => 'date'],
               ["value" => $friend->phone, "name" => "phone", "type" => "text"]], $id, $link);
        
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
        
        $Request = $k->generateRow([$friend->firstname, $friend->lastname, $friend->birthday, $friend->phone]);
        
        $Request.= $k->generateRowBtn([
            ['href' => '#modal1', 'class' => 'delete btn-floating red', 'value' => '<i class="material-icons">delete</i>', 'data-id' => $friend->id, 'data-link' => null],
            ['href' => '#modal3', 'class' => 'modalRow edit btn-floating green', 'value' => '<i class = "material-icons">system_update_alt</i>', 'data-id' => $friend->id, 'data-link' => '/friends/edit/']]);
        
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
    public function delete(){
    $k = new AjaxisGenerate();
    $k = $k->DeletingModal('delete','are you sure to delete That Row ? Bla Bla Bla','/friends/remove/');
     
     if(Request::ajax()){
         return $k;
     }

     return $k;

    }
    public function destroy($id) {
        $f = Friend::findOrfail($id);
        $f->delete();
        
        return 'Done';
    }
}
