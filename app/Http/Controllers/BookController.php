<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        
        $result = DB::select('select * from books');

        return response()->json([
            'code'    => 200,
            'message' => 'Get books list success',
            'books'   => $result
        ]);
    }

    public function show($book_id){

        $result = DB::select('select * from books where id = ?',[$book_id]);

        return response()->json([
            'code'    => 200,
            'message' => 'Get book success',
            'book'    => $result
        ]);
    }

    public function store(Request $req){

        $status = DB::insert('insert into books (title,author,num_of_copy) values (?,?,?)',
                    [$req->input('title'),$req->input('author'),$req->input('num_of_copy')]);

        return response()->json([
            'status' => $status,
            'message'=> 'Book has been saved successfuly',
            'data'   => $req->all()
        ]);
    }

    public function update(Request $req, $book_id){

        $status = DB::update('update books set title = ?, author = ?, num_of_copy = ? where id = ?',
                    [$req->input('title'),$req->input('author'),$req->input('num_of_copy'),$book_id]);

        return response()->json([
            'status'  => $status,
            'message' => 'Book has been updated successfuly', 
            'data'    => $req->all()
        ]);
    }

    public function delete($book_id){

        $status = DB::delete('delete from books where id = ?',[$book_id]);

        return response()->json([
            'message' => 'Book has been deleted successfuly'
            'status'  => $status
        ]);
    }
}
