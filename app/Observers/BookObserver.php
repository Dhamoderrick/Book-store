<?php

namespace App\Observers;

use App\Models\Book;
use Elastic\Elasticsearch\Client;

class BookObserver
{
    /**
     * @var Elastic\Elasticsearch\Client
     */
    private $elasticSearch;

    public function __construct(Client $elasticSearch) {
        $this->elasticSearch = $elasticSearch;
    }

    /**
     * Handle the Book "created" event.
     */
    public function created(Book $book): void
    {
        $this->elasticSearch->index([
            'index' => $book->getTable(),
            'type' => $book->getTable(),
            'id' => $book->id,
            'body' => $book->toArray()
        ]);
    }

    /**
     * Handle the Book "updated" event.
     */
    public function updated(Book $book): void
    {
        $this->elasticSearch->update([
            'index' => $book->getTable(),
            'type' => $book->getTable(),
            'id' => $book->id,
            'body' => [
                'doc' => $book->toArray()
            ]
        ]);
    }

    /**
     * Handle the Book "deleted" event.
     */
    public function deleted(Book $book): void
    {
        $this->elasticSearch->delete([
            'index' => $book->getTable(),
            'type' => $book->getTable(),
            'id' => $book->id,
        ]);
    }

    /**
     * Handle the Book "force deleted" event.
     */
    public function forceDeleted(Book $book): void
    {
        $this->elasticSearch->delete([
            'index' => $book->getTable(),
            'type' => $book->getTable(),
            'id' => $book->id,
        ]);
    }
}
