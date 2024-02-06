<?php declare(strict_types = 1);

namespace PHPStan\DoctrineIntegration\ORM\EntityManagerMergeReturn;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;
use function PHPStan\Testing\assertType;

class Example
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;

	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	public function merge(): void
	{
		$test = $this->entityManager->merge(new MyEntity());
		assertType(MyEntity::class, $test);
		$test->doSomething();
		$test->doSomethingElse();
	}
}

/**
 * @ORM\Entity()
 */
#[ORM\Entity]
class MyEntity
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 *
	 * @var int
	 */
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column(type: 'integer')]
	private $id;

	public function doSomething(): void
	{
	}
}
