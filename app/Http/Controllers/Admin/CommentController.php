<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comment;


class CommentController extends Controller
{



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        dd($request->ucid);
        $comment = Comment::findOrFail($request->ucid);

        $comment->verifyflag = (($comment->verifyflag)==0) ? 1 : 0;

        $comment->save();

        $response = array(
            'status' => 0,
            'verifyflag'=>$comment->verifyflag,
            'msg' => '审核修改成功！',
        );

        return Response::json( $response );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        dd($request->ucid);
        $comment = Comment::findOrFail($request->ucid);
        $comment->delflag=1;

        $comment->save();

        $response = array(
            'status' => 'success',
            'msg' => '评论删除成功！',
        );

        return Response::json( $response );
    }
}
