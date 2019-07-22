<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Book extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $book = DB::table('book')
            ->join('author', 'book.author_id', '=', 'author.id')
            ->join('book_stock', 'book.id', '=', 'book_stock.book_id')
            ->select('book.*', 'author.name', 'count(book_stock.id)')
            ->get();
    return $book;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
