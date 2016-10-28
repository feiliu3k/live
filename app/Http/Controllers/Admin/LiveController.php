<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\WebLive;

class LiveController extends Controller
{

     protected $fields = [
        'livetitle' => '',
        'livetime' => '',
        'liveimg' => '',
        'livecontent' => '',
        'pnum' => '',
        'readnum' => '',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lives = WebLive::all();
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

        $weblive->save();

        return redirect('/admin/weblive')
                        ->withSuccess("微直播活动 '$weblive->livetim' 新建成功.");
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
                        ->withSuccess("'$weblive->livetitle' .已经被删除.");
    }
}
