<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends SkeletonServices
{

    public function create()
    {
        $authors = Cache::get('authors');
        if (empty($authors)) {
            $this->fetchAllAuthors();
        }
        return view('books.create', ['authors' => $authors]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'pages_number' => 'required|numeric',
            'author_id'    => 'required',
        ]);

        dd($this->createBook($data));
    }

    public function destroy(Request $request)
    {
        // $response = $this->removeBook($request->id);

        // if ($response['code'] == 200) {
        return back()->with('success', 'Book Deleted Successfully!.');

//        }
//        return redirect()->back()->with('error', 'error happened');
    }
}
