<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Providers\ProviderContext;
use App\Enums\MockSource;

class FetchAndStoreData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'API\'lerden veriyi çekip veritabanına kaydeder';

    protected $context;

    /**
     * Create a new command instance.
     *
     * @param ProviderContext $context
     */
    public function __construct(ProviderContext $context)
    {
        parent::__construct();
        $this->context = $context;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Veriler çekiliyor...');

        $this->context->fetchData(MockSource::MOCK_ONE);
        $this->info('MockOne verileri başarıyla kaydedildi.');

        $this->context->fetchData(MockSource::MOCK_TWO);
        $this->info('MockTwo verileri başarıyla kaydedildi.');
    }
}
