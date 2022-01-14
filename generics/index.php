<?php

/** @template T */
class Collection
{
    /** @var array<T> */
    public array $set;

    /** @param T */
    public function __construct(mixed $class)
    {
    }

    /** @param T $value */
    public function add(mixed $value)
    {
        $this->set[] = $value;
    }

    /** @return array<T> */
    public function getAll(): array
    {
        return $this->set;
    }
}


/**
 * @template E
 */
interface IncShell {
    /**
     * @return E
     */
    function first();
}

interface ClearUnderstand{
    function flick();
}

/**
 * @template E
 */
interface Repository {
    /**
     * @return IncShell<E>
     */
    function findAll(): IncShell;
}

/** @var Repository<\ClearUnderstand> $repository */
$repository = new Fruit('banana');
$collection = $repository->findAll();
$result = $collection->first();


class Electronic
{
    public string $type, $name;
    public int $id;

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }
}

class Phone extends Electronic
{
    public function __construct($id, $name, $type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
    }
}

class Fruittable
{
    public function retrieve()
    {
        return 'Mock';
    }
}

class Fruit extends Fruittable
{
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Program
{
    private array $input;

    /** @param Collection<\Electronic> $input */
    public function addInput(Collection $input)
    {
        $this->input = $input->getAll();
    }

    public function getInput()
    {
        return $this->input;
    }

    public function processData()
    {
        $result = [];
        foreach ($this->getInput() as $input) {
            $result[] = $input->getId();
        }
        return $result;
    }
}

$collection = new Collection(new Electronic());
$collection->add(
    new Phone(
        124,
        'xPhone',
        'phone'
    )
);

$program = new Program();
$program->addInput($collection->getAll());
$program->processData();

$alternative_collection = new Collection(new Fruittable());
$alternative_collection->add(
    new Fruit('1')
);

$program = new Program();
$program->addInput($alternative_collection);
$program->processData();

