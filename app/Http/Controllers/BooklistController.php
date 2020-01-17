<?php

namespace App\Http\Controllers;
use App\Http\Resources\Booklist as BooklistResource;
use Illuminate\Http\Request;
use DB;
use App\Booklist;

class BooklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all booklist
        //$booklists = Booklist::all();
        $booklists =DB::table('booklists')->select(['id','bookname','body'])->paginate(15);
        // get all booklists as resource
        return $booklists;
       // return new BooklistResource($booklists);
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
        /*
        validate data if needed for font-end
        $request->validate([
            'bookname'=>'required',
            ]);
        */
        $input = DB::table('booklists')->insert([
            'bookname'=>$request->input('bookname'),
            'author'=>$request->input('author'),
            'body'=>$request->input('body')
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book= DB::table('booklists')->where(["id"=>$id])->get();
        return $book;
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
        $book_delete= DB::table('booklists')->where(["id"=>$id])->delete();
    }
}
