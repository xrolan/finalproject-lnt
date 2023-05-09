<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BookController extends Controller
{
    public function getCreateBook(){
        $categories = Category::all();

        return view('createBook',compact('categories'));
    }

    public function createBook(BookRequest $request){
        // $request->validate([
        //     'judul' => 'required|string|min:8',

        // ]);

        // $request->validate([
        //     'cover_buku' => 'required|mimes:jpg,png'
        // ]);
        // return "asd";
        $judul = $request->judul;

        // $file_uploaded = $request->cover_buku;
        // $url = $file_uploaded->store("public");

        $book =
            Book::create([
                'judul' => $judul,
                'sinopsis' => $request -> sinopsis,
                'url_cover_buku' => "asdasdasd",
                'tahun_terbit' => $request -> tahun_terbit,
                'category_id' => $request -> category_id
            ]);

        $penulis = explode(',',$request -> penulis);
        //dd($penulis);
        foreach($penulis as $pen) {
            if((Author::where('name', $pen)->get()->isEmpty())){
                $tempAuth = Author::create([
                    'name' => $pen
                ]);
                $book->authors()->attach($tempAuth->id);
            } else {
                $tempAuth = Author::where('name', $pen)->first();
                $book->authors()->attach($tempAuth->id);
            }
        }

        return response()->json([
            'code' => 200,
            'status' => 'oke'
        ]);
    }

    public function getUpdateBook($id){
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('editBook',compact('book','categories'));
    }

    public function updateBook(BookRequest $request, $id){
        $book = Book::findOrFail($id);

        $book->update([
            'judul' => $request->judul,
            'sinopsis' => $request -> sinopsis,
            //'penulis' => $request -> penulis,
            'tahun_terbit' => $request -> tahun_terbit,
            'category_id' => $request -> category_id
        ]);

        return response()->json($book);
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect(route('managePage'));
    }

    public function getAllBooks(){
        $books = Book::all();
        return response()->json($books);
    }
}
