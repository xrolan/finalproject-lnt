<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function getHomePage(){
        $books = Book::all();

        // $url_list = [];


        // foreach($books as $book) {
        //     $url = Storage::temporaryUrl(
        //         $book->url_cover_buku, now()->addMinutes(5)
        //     );
        //     array_push($url_list, $url);
        // }

        return view('home',compact('books'));

        // return view('home',[
        //     'books' => Book::all()
        // ]);
    }

    public function getContactPage(){
        return view('contactus');
    }

    public function getManagePage(){
        $books = Book::all();
        return view('manage',compact('books'));
    }
}
