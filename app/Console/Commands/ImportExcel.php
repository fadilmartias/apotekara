<?php

namespace App\Console\Commands;
use App\Imports\ObatsImport;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

class ImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Excel Importer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Request $request)
    {
        $this->output->title('Starting import');
        (new ObatsImport)->withOutput($this->output)->import($request->file('file'));
        $this->output->success('Import successful');
    }
}
