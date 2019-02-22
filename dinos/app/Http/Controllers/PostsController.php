<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Image;
use App\Post;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('index', compact('posts'));
    }


    public function action(Request $request){
        $output = '';
        if ($request->ajax()){
            $query = $request->get('query');
            if ($query != ''){
                $data = DB::table('posts')
                            ->where('name', 'like', '%'.$query.'%')
                            ->orderBy('id', 'desc')
                            ->get();
            }else{
                $data = DB::table('posts')
                            ->orderBy('id', 'desc')
                            ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0){
                foreach ($data as $row){
                    $output .= "<a href='http://www.dinos.com/posts/post/ " .$row->id. " '><li class='list-group-item'>{$row->name}</li></a>";
                }
            }else{
                $output .= "<a href='#'><li class='list-group-item'>No Data Found</li></a>";
            }
            $data = array(
                'table_data' => $output,
//                'total_data' => $total_row
            );
            echo json_encode($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::all();
        $commentsreplies = CommentReply::all();
        $user = \Auth::user();


        $post = Post::find($id);
        $posts = Post::all();
        return view('posts.post', compact('post', 'posts', 'comments', 'commentsreplies', 'user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
