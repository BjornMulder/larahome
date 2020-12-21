<?php

declare(strict_types=1);

namespace App\Services;

class EventMappingService
{
    private $binarySensorService;
    public function __construct(BinarySensorService $binarySensorService)
    {
        $this->binarySensorService = $binarySensorService;
    }

    public function map($entity)
    {
        $entityDomain = $entity->domain->name;

        switch ($entityDomain) {
            case "binary_sensor":
                $this->binarySensorService->handle($entity);
                break;
        }
    }
}
