<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\WebLive;
use App\Models\WebInfo;
use App\Models\Visitor;
use App\Models\Comment;

class LiveController extends Controller
{

    protected $fields = [
        'proname' => '',
        'livetitle' => '',
        'livetime' => '',
        'liveimg' => '',
        'livecontent' => '',
        'pnum' => '',
        'readnum' => '',
        'realreadnum'=>'',
        'hlsurl' => '',
        'hlsurl1' => '',
        'rtmpurl' => '',
        'adname' => '',
        'adimg' =>'',
        'adlink' =>'',
        'verifyflag' => 0,
        'commentflag' => 0,
        'refreshcommentflag' => 0,
        'refreshliveflag' => 0,
        'showreadflag' => 0,
        'countdownflag' => 0, 
        'livelistorder' => 0,
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lives = WebLive::orderBy('livetime', 'desc')->get();
        return view('admin.weblive.index')->withLives($lives);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.weblive.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $weblive = new WebLive();
        foreach (array_keys($this->fields) as $field) {
            $weblive->$field = $request->get($field);
        }
        
        if($request->commentflag){
            $weblive->commentflag=$request->commentflag;
        }else
        {
            $weblive->commentflag=0;
        }

        if($request->verifyflag){
            $weblive->verifyflag=$request->verifyflag;
        }else
        {
            $weblive->verifyflag=0;
        }

        if($request->refreshcommentflag){
            $weblive->refreshcommentflag=$request->refreshcommentflag;
        }else
        {
            $weblive->refreshcommentflag=0;
        }

        if($request->refreshliveflag){
            $weblive->refreshliveflag=$request->refreshliveflag;
        }else
        {
            $weblive->refreshliveflag=0;
        }

        if($request->showreadflag){
            $weblive->showreadflag=$request->showreadflag;
        }else
        {
            $weblive->showreadflag=0;
        }

        if($request->countdownflag){
            $weblive->countdownflag=$request->countdownflag;
        }else
        {
            $weblive->countdownflag=0;
        }

        if($request->livelistorder){
            $weblive->livelistorder=$request->livelistorder;
        }else
        {
            $weblive->livelistorder=0;
        }

        $weblive->save();

        return redirect('/admin/weblive')
                        ->withSuccess('微直播活动 '.$weblive->livetitle.' 新建成功.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = WebLive::findOrFail($id)->toArray();
        return view('admin.weblive.edit', $data);
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
        $weblive = WebLive::findOrFail($id);

        foreach (array_keys($this->fields) as $field) {
            $weblive->$field = $request->get($field);
        }

        if($request->commentflag){
           $weblive->commentflag=$request->commentflag;
        }else
        {
            $weblive->commentflag=0;
        } 

        if($request->verifyflag){
            $weblive->verifyflag=$request->verifyflag;
        }else
        {
            $weblive->verifyflag=0;
        }

        if($request->refreshcommentflag){
            $weblive->refreshcommentflag=$request->refreshcommentflag;
        }else
        {
            $weblive->refreshcommentflag=0;
        }

        if($request->refreshliveflag){
            $weblive->refreshliveflag=$request->refreshliveflag;
        }else
        {
            $weblive->refreshliveflag=0;
        }

        if($request->showreadflag){
            $weblive->showreadflag=$request->showreadflag;
        }else
        {
            $weblive->showreadflag=0;
        }

        if($request->countdownflag){
            $weblive->countdownflag=$request->countdownflag;
        }else
        {
            $weblive->countdownflag=0;
        }

        if($request->livelistorder){
            $weblive->livelistorder=$request->livelistorder;
        }else
        {
            $weblive->livelistorder=0;
        }

        $weblive->save();

        return redirect("/admin/weblive/$id/edit")
                        ->withSuccess("更新成功.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weblive = WebLive::findOrFail($id);
        $weblive->delete();

        return redirect('/admin/weblive')
                        ->withSuccess("$weblive->livetitle .'已经被删除.'");
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comments($id)
    {
       $comments = Comment::where('liveid',$id)                
                ->where('delflag',0)
                ->orderBy('ctime', 'desc')
                ->paginate(config('weblive.posts_per_page'));
          
        return view('admin.comments.index',compact('comments'));
    }
}
