<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\Book;
use DB;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $book = DB::table('book')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('book_stock', 'book.id', '=', 'book_stock.book_id')
            ->select('book.*', 'author.name as author_name', 'book_stock.id as stock_id')
            ->get();
        
        return view('welcome', compact('book'));
    }
    
    public function destroy($id)
    {
        
        DB::table('book')->where('id', $id)->delete();
        return redirect('/');
    }
    
}
