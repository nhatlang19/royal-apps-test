<?php

namespace App\Console\Commands;

use App\Client\SymfonySkeletonApi;
use Illuminate\Console\Command;

class AddNewAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-new-author {first_name} {last_name} {birthday} {biography} {gender} {place_of_birth} {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected SymfonySkeletonApi $skeletonApi;

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $arguments = $this->arguments();
        $skeletonApi = new SymfonySkeletonApi();
        $data = [
            'first_name' => $arguments['first_name'],
            'last_name' => $arguments['last_name'],
            'birthday' => $arguments['birthday'],
            'biography' => $arguments['biography'],
            'gender' => $arguments['gender'],
            'place_of_birth' => $arguments['place_of_birth'],
        ];
        $skeletonApi->newAuthor($arguments['token'], $data);
    }
}
