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

        $response = $this->createBook($data);
        if ($response['code'] == 200) {
            return redirect()->route('books.create')->with('success', 'User Created Successfully.');
        }
        return redirect()->back()->withInput()->with('error', $response['message']);
    }

    public function destroy(Request $request)
    {
        $this->removeBook($request->book_id);

        return redirect()->back();
    }
}
