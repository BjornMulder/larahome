<?php

declare(strict_types=1);

namespace App\Services;

class EventMappingService
{
    private $binarySensorService;
    private $personService;
    public function __construct(BinarySensorService $binarySensorService, PersonService $personService)
    {
        $this->binarySensorService = $binarySensorService;
        $this->personService = $personService
    }

    public function map($entity)
    {
        $entityDomain = $entity->domain->name;

        switch ($entityDomain) {
            case "binary_sensor":
                $this->binarySensorService->handle($entity);
                break;
            case "person":
                $this->personService->handle($entity);
                break;
        }
    }
}
