<?php

namespace App\Providers;

use App\Enums\MockSource;
use App\Data\MockDataDto;
use App\Interfaces\ProviderInterface;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Support\Facades\Http;

class GitHubProvider implements ProviderInterface
{
    protected string $repository = 'WEG-Technology/mock';
    protected TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * API'den veri çeker ve her bir elemanı DTO ile veritabanına kaydeder.
     *
     * @param MockSource $source
     * @return array Veritabanına kaydedilen DTO verileri
     */
    public function fetchData(MockSource $source): array
    {
        $filePath = 'main/' . $source->value;
        $url = 'https://raw.githubusercontent.com/' . $this->repository . '/' . $filePath;

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            if (!is_array($data)) {
                return [];
            }

            $savedDtos = [];

            foreach ($data as $item) {
                $dto = $source === MockSource::MOCK_ONE
                    ? MockDataDto::fromMockOne($item)
                    : MockDataDto::fromMockTwo($item);

                $this->taskRepository->add($dto);

                $savedDtos[] = $dto->toArray();
            }

            return $savedDtos;
        }

        return [];
    }
}
