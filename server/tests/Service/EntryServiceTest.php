<?php
namespace App\Tests\Service;

use App\Entity\Entry;
use App\Service\EntryService;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EntryServiceTest extends KernelTestCase
{
    /**
     * Entry service
     *
     * @var \App\Service\EntryService
     */
    private $service;

    public function setUp(): void
    {
        self::bootKernel();

        $this->service = self::$container->get(EntryService::class);
    }

    protected function tearDown(): void
    {
        // $this->service->deleteAll();
    }

    public function testSave()
    {
        /*$user = $this->userService->addUser($this->username, $this->passwd, $this->role, $this->apiToken);

        $log = $this->service->save($user, 'test');

        $logs = $this->service->getAll(0, 1000, null, $user);
        $this->assertEquals(1, sizeof($logs));
        $this->assertEquals($log, $logs[0]);
        $this->assertEquals(CsLog::PRIORITY_ERROR, $log->getPriority());

        $this->assertEquals(1, $this->service->getCount($user));*/
    }

    public function testParseEntryFolder()
    {
        $entry = $this->service->parseEntryFolder("0121-wallpapers-gaming keyboard", '2020');
        $this->assertEquals('gaming keyboard', $entry->getName());
        //$entry = $this->service->parseEntryFolder(" 02-gaming-wallpapers")
    }

}