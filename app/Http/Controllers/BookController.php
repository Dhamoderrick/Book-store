<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Client;
use Illuminate\Support\Arr;

class BookController extends Controller
{
    /**
     * @var Elastic\Elasticsearch\Client
     */
    private $elasticSearch;

    public function __construct(Client $elasticSearch) 
    {
        $this->elasticSearch = $elasticSearch;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $ids = [];
        if($request->filled('search')) {
            $searchResults = $this->searchOnElastic($request)?->asArray();
            $ids = Arr::pluck($searchResults['hits']['hits'], '_id');
        }
        $books = Book::query()
                ->when(!empty($ids), function($query) use($ids) {
                    $query->whereIn('id', $ids);
                })
                ->select('id', 'title', 'author', 'genre', 'isbn', 'published_at', 'publisher', 'image')
                ->paginate(12)
                ->withQueryString();
                    
        return Inertia::render('Books', [
            'books' => $books,
            'filter' => $request->only('search')
        ]);
    }

    /**
     * Search Records on the Elasticsearch
     * 
     * @param $request
     */
    private function searchOnElastic(Request $request) 
    {
        return $this->elasticSearch->search([
            'index' => 'books',
            'type' => 'books',
            'body' => [
                'size' => 100,
                'query' => [
                    'multi_match' => [
                        'fields' => ['title', 'isbn', 'genre', 'author'],
                        'query' => $request->search
                    ]
                ]
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
