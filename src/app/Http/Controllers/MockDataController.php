<?php

namespace App\Http\Controllers;

use App\Enums\MockSource;
use App\Providers\ProviderContext;
use App\Providers\GitHubProvider;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class MockDataController extends Controller
{
    protected ProviderContext $context;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $provider = new GitHubProvider($taskRepository);
        $this->context = new ProviderContext($provider);
    }

    /**
     * Mock One verisini çek ve veritabanına kaydet.
     */
    public function fetchAndStoreMockOne(): JsonResponse
    {


        $data = $this->context->fetchData(MockSource::MOCK_ONE);
        $data2 = $this->context->fetchData(MockSource::MOCK_TWO);

        return response()->json([
            'message' => 'Mock One verileri kaydedildi',
            'data' => [$data,$data2],
        ]);
    }
}
