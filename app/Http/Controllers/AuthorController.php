<?php

namespace App\Http\Controllers;

use App\Client\SymfonySkeletonApi;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorController extends Controller
{
    protected SymfonySkeletonApi $skeletonApi;

    public function __construct(SymfonySkeletonApi $skeletonApi)
    {
        $this->skeletonApi = $skeletonApi;
    }

    public function lists(Request $request)
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 20);
        $authors = $this->skeletonApi->listAuthors(session('token_key'), $page, $limit);
        $authors = new LengthAwarePaginator($authors['items'], $authors['total_results'], $authors['total_pages'], $authors['current_page']);
        return view('authors.lists', compact('authors'));
    }

    public function view(Request $request, int $id)
    {
        $author = $this->skeletonApi->viewAuthor(session('token_key'), $id);
        return view('authors.view', compact('author'));
    }

    public function destroy(Request $request, int $id)
    {
        $author = $this->skeletonApi->viewAuthor(session('token_key'), $id);
        if (empty($author['books'])) {
            $this->skeletonApi->deleteAuthor(session('token_key'), $id);
            return redirect()->route('author-lists')->with('success','Author Deleted');
        }
        return redirect()->route('author-lists')->with('error','Error Deleted');

    }
}
