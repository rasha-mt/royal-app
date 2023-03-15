<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AuthorController extends SkeletonServices
{
    public function index()
    {
        $authors = $this->fetchAllAuthors();

        return view('authors.index', ['authors' => (object)$authors]);

    }

    public function view(Request $request)
    {
        $author = $this->fetchAuthorById($request->id);

        if ($author) {
            return view('authors.view', ['author' => $author]);
        }
        return view('errors.404');
    }


    public function destroy(Request $request)
    {
        $this->removeAuthor($request->id);

        return redirect('/authors');
    }
}