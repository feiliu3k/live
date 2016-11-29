<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;

use Carbon\Carbon;

use App\Models\WebLive;
use App\Models\WebInfo;

class LiveInfoController extends Controller
{

    protected $fields = [
        'liveid' => '',
        'ifotitle' => '',
        'ifocontent' => '',
        'ifotime' => '',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($liveid)
    {
        $weblive = WebLive::with('webInfos')->findOrFail($liveid);
        Cache::forever('live', $weblive->toArray());
        //return view('admin.webinfo.index')->withLive($weblive);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($liveid)
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $data['liveid']=$liveid;
        return view('admin.webinfo.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$liveid)
    {
        $webInfo = new WebInfo();
        foreach (array_keys($this->fields) as $field) {
            $webInfo->$field = $request->get($field);
        }

        $webInfo->save();

        return redirect('/admin/weblive'.'/'.$liveid.'/liveinfo')
                        ->withSuccess('微直播活动 '.$webInfo->ifotitle.' 新建成功.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($liveid,$infoid)
    {
        $data = WebInfo::findOrFail($infoid)->toArray();
        return view('admin.webinfo.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $liveid,$infoid)
    {
        //dd($request);
        $webInfo = WebInfo::findOrFail($infoid);

        foreach (array_keys($this->fields) as $field) {
            $webInfo->$field = $request->get($field);
        }
        $webInfo->liveid=$liveid;
        $webInfo->save();

        return redirect("/admin/weblive/$liveid/liveinfo/$infoid/edit")
                        ->withSuccess("更新成功.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($liveid,$infoid)
    {
        $webInfo = WebInfo::findOrFail($infoid);
        $webInfo->delflag=1;
        $webInfo->save();

        return redirect("/admin/weblive/$liveid/liveinfo")
                        ->withSuccess($webInfo->ifotitle .'已经被删除.');
    }
}
