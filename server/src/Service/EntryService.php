<?php

namespace App\Service;

use App\Repository\EntryRepository;
use App\Entity\Entry;

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
        $this->entryRepository = $entryRepository;
    }

    /**
     * Parse entry
     * 
     * For example : "21-wallpapers-gaming" or "1221-wallpapers-gaming"
     */
    public function parseEntryFolder(string $entryFolder, string $year, string $month = null)
    {
        $entry = new Entry();
        preg_match_all('/((\d{2})(\d{2})|\d{2})-(.+)-(.+)/', $entryFolder, $matches, PREG_SET_ORDER, 0);
        // date on 2 digits : day, month param must not be null
        if (sizeof($matches[0]) === 4) {
            list($all, $day, $cat, $name) = $matches[0];
        } 
        elseif (sizeof($matches[0]) === 6) {
            list($all, $monthAndDay, $month, $day, $cat, $name) = $matches[0];
        } 
        else {
            $entry = null;
        }

        if (!is_null($entry)) {
            $entry->setName($name);
            $entry->setPubDate(\DateTime::createFromFormat('Y-m-d H:i:s', "$year-$month-$day 00:00:00"));
            // TODO : manage category
        }

        return $entry;
    }
}