<?php // lint >= 7.4

namespace MissingReadOnlyPropertyAssignPhpDoc;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
#[ORM\Entity]
class EntityWithAGeneratedId
{

	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column
	 * @readonly
	 */
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private int $id; // ok, ID is generated

	/**
	 * @ORM\Column
	 * @readonly
	 */
	#[ORM\Column]
	private int $unassigned;

	/**
	 * @ORM\Column
	 * @readonly
	 */
	#[ORM\Column]
	private int $doubleAssigned;

	public function __construct(int $doubleAssigned)
	{
		$this->doubleAssigned = $doubleAssigned;
		$this->doubleAssigned = 17;
	}

}

/**
 * @ORM\Entity(readOnly=true)
 */
#[ORM\Entity(readOnly: true)]
class ReadOnlyEntity
{

	/**
	 * @ORM\Id
	 * @ORM\Column
	 * @readonly
	 */
	#[ORM\Id]
	#[ORM\Column]
	private int $id; // ok, entity is read only

}

/**
 * @ORM\Entity(readOnly=true)
 */
#[ORM\Entity(readOnly: true)]
class ReadOnlyEntityWithConstructor
{

	/**
	 * @ORM\Id
	 * @ORM\Column
	 * @readonly
	 */
	#[ORM\Id]
	#[ORM\Column]
	private int $id;

	public function __construct()
	{
	}

}
