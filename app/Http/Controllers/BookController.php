<?php

namespace App\Http\Controllers;

use App\Client\SymfonySkeletonApi;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected SymfonySkeletonApi $skeletonApi;

    public function __construct(SymfonySkeletonApi $skeletonApi)
    {
        $this->skeletonApi = $skeletonApi;
    }

    public function add(Request $request)
    {
        $authors = $this->skeletonApi->listAuthors(session('token_key'), 1, 100);
        return view('books.add', compact('authors'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'author' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'isbn' => ['required', 'string'],
            'format' => ['required', 'string'],
            'number_of_pages' => ['required', 'integer'],
        ]);
        $data = $request->only('author', 'title', 'description', 'isbn', 'format', 'number_of_pages');
        $authorID = $data['author'];
        $data['author'] = [
            'id' => (int) $data['author']
        ];
        $data['release_date'] = '2023-03-09T15:22:04.300Z';
        $data['number_of_pages'] = (int) $data['number_of_pages'];
        $this->skeletonApi->newBook(session('token_key'), $data);
        return redirect()->route('author-view', $authorID)->with('success','Book Created');
    }

}
