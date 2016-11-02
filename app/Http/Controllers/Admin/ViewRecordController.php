<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\WebLive;
use App\Models\WebInfo;
use App\Models\ViewRecord;

class ViewRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($liveid)
    {
        $vrs = ViewRecord::where('liveid',$liveid)
                        ->orderBy('viewtime', 'desc')
                        ->paginate(config('weblive.posts_per_page'));

        return view('admin.viewrecord.index')->withVrs($vrs);
    }


    public function delete(Request $request)
    {
        $vr = ViewRecord::findOrFail($request->vrid);
        $vr->delete();

        return redirect("/admin/weblive/$request->liveid/viewrecord")
                        ->withSuccess($vr->userphone .'已经被删除.');
    }
}
