<?php

namespace App\Service;

use App\Repository\EntryRepository;

Class EntryService
{
    /**
     * Logger
     *
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * Entry repository
     *
     * @var \App\Repository\EntryRepository
     */
    private $entryRepository;

    /**
     * Create new EntryService
     *
     * @param LoggerInterface $logger
     * @param EntryRepository $entryRepository
     */
    public function __construct(EntryRepository $entryRepository)
    {
        $this->enryRepository = $entryRepository;
    }
}