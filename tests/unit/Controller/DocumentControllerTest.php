<?php
/**
 * ownCloud - Richdocuments App
 *
 * @author Victor Dubiniuk
 * @copyright 2014 Victor Dubiniuk victor.dubiniuk@gmail.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 */
namespace OCA\Richdocuments\Tests\Controller;

use \OCA\Richdocuments\Controller\DocumentController;
use OCP\App\IAppManager;
use OCP\IGroupManager;
use \OCP\IRequest;
use \OCP\IConfig;
use \OCA\Richdocuments\AppConfig;
use \OCP\IL10N;
use \OCP\ICacheFactory;
use \OCP\ILogger;
use \OCA\Richdocuments\Storage;
use OCP\IUserManager;

/**
 * Class DocumentControllerTest
 *
 * @group DB
 *
 * @package OCA\Richdocuments\Tests\Controller
 */
class DocumentControllerTest extends \Test\TestCase {

	/**
	 * @var IRequest
	 */
	private $request;
	/**
	 * @var IConfig
	 */
	private $settings;
	/**
	 * @var AppConfig
	 */
	private $appConfig;
	/**
	 * @var IL10N
	 */
	private $l10n;
	/**
	 * @var ICacheFactory
	 */
	private $cache;
	/**
	 * @var ILogger
	 */
	private $logger;
	/**
	 * @var Storage
	 */
	private $storage;
	/**
	 * @var IAppManager
	 */
	private $appManager;
	/**
	 * @var IGroupManager
	 */
	private $groupManager;
	/**
	 * @var IUserManager
	 */
	private $userManager;
	/**
	 * @var DocumentController
	 */
	private $documentController;

	public function setUp(): void {
		parent::setUp();
		$this->request = $this->createMock(IRequest::class);
		$this->settings = $this->createMock(IConfig::class);
		$this->appConfig = $this->createMock(AppConfig::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->cache = $this->createMock(ICacheFactory::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->storage = $this->createMock(Storage::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->documentController = new DocumentController(
			'richdocuments',
			$this->request,
			$this->settings,
			$this->appConfig,
			$this->l10n,
			'test',
			$this->cache,
			$this->logger,
			$this->storage,
			$this->appManager,
			$this->groupManager,
			$this->userManager
		);
	}

	public function testConstructor() {
		$this->assertInstanceOf(DocumentController::class, $this->documentController);
	}

	/**
	 * Tests different filenames on create
	 *
	 * @dataProvider invalidFilenameProvider
	 * @param $filename string
	 */
	public function testCreateWithInvalidFilename(string $filename) {
		$dir = "/";
		$mimetype = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";

		$this->request
			->expects($this->exactly(3))
			->method('getParam')
			->withConsecutive(
				['mimetype'],
				['filename'],
				['dir'],
			)
			->willReturnOnConsecutiveCalls(
				$mimetype,
				$filename,
				$dir,
			);

		$this->assertEquals(
			$this->documentController->create(),
			[
			'status' => 'error',
			'message' => $this->l10n->t('Invalid filename'),
		]
		);
	}

	public function invalidFilenameProvider(): array {
		return [
			["filename with\t tab"],
			["filename with / slash"]
		];
	}
}
