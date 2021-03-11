<?php

namespace App\Service;

use App\Repository\EntryRepository;
use App\Entity\Entry;
use Symfony\Component\Finder\Finder;

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
     * Store/Parse entry
     * 
     * For example : "21-wallpapers-gaming" or "1221-wallpapers-gaming"
     */
    public function storeEntry(string $entryFolder, string $year, string $month = null)
    {
        $entry = new Entry();
        preg_match_all('/((\d{2})(\d{2})|\d{2})-(.+)-(.+)/', $entryFolder, $matches, PREG_SET_ORDER, 0);
        // date on 2 digits : day, month param must not be null
        if (sizeof($matches)  > 0 && sizeof($matches[0]) === 4) {
            list($all, $day, $cat, $name) = $matches[0];
        } 
        elseif (sizeof($matches)  > 0 && sizeof($matches[0]) === 6) {
            list($all, $monthAndDay, $month, $day, $cat, $name) = $matches[0];
        } 
        else {
            $entry = null;
        }

        if (!is_null($entry)) {
            $entry->setName($name);
            $entry->setPubDate(\DateTime::createFromFormat('Y-m-d H:i:s', "$year-$month-$day 00:00:00"));
            // TODO : 
            //  - manage category, if not exists store it
            //  - store entry
            //  - parse media inside entry and store them

        }

        return $entry;
    }

    /**
     * Parse years
     */
    public function parseYears(string $dir)
    {
        $finder = new Finder();
        $finder->directories();
        foreach ($finder->in($dir) as $year) {
            $this->parseMonthsOrEntries("$dir/$year", $year);
        }
    }

    /**
     * Parse months or entries
     */
    public function parseMonthsOrEntries(string $dir, string $year)
    {
        $finder = new Finder();
        $finder->directories();
        foreach ($finder->in($dir) as $monthOrEntry) {
            // month
            if (sizeof($monthOrEntry) === 2) {
                $this->parseEntries("$dir/$monthOrEntry", $year, $month);
            // entry
            } else {

            }
        }
    }
}