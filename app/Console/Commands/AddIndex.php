<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Elastic\Elasticsearch\ClientBuilder;
use App\Models\Book;

class AddIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:addIndex';

    private $elasticSearch;
    /**
     * Create a New ElasticSearch Client
     */
    public function __construct() {
        parent::__construct();
        $this->elasticSearch = ClientBuilder::create()->build();
    }

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Indexing in progress.....");
        foreach (Book::cursor() as $book)
        {
            $this->elasticSearch->index([
                'index' => 'books',
                'id' => $book->id,
                'body' => $book->toArray(),
            ]);
            $this->output->write('.');
        }

        $this->info("\nDone!");
    }
}
