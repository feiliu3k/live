<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\WebLive;
use App\Models\WebInfo;
use App\Models\Visitor;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($liveid)
    {
        $visitors = Visitor::where('liveid',$liveid)
                        ->orderBy('visittime', 'desc')
                        ->paginate(config('weblive.posts_per_page'));

        return view('admin.viewrecord.index')->withVisitors($visitors);
    }


    public function delete(Request $request)
    {
        $visitor = Visitor::findOrFail($request->vrid);
        $visitor->delete();

        return redirect("/admin/weblive/$request->liveid/visitors")
                        ->withSuccess($visitor->mobile .'已经被删除.');
    }
}