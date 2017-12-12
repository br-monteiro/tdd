<?php

class FizzBuzz
{

    private $quantity;
    private $results = [];

    public function __construct(int $quantity = 15)
    {
        $this->setQuantity($quantity);
        $this->run();
    }

    public function run(): FizzBuzz
    {
        for ($i = 1; $i <= $this->quantity; $i++) {
            $fizz = $this->isFizz($i);
            $buzz = $this->isBuzz($i);
            $result = $fizz || $buzz ? $fizz . $buzz : $i;
            array_push($this->results, $result);
        }

        return $this;
    }

    public function isFizz(int $number)
    {
        return $this->isMultipleOf($number, 3) ? 'Fizz' : null;
    }

    public function isBuzz(int $number)
    {
        return $this->isMultipleOf($number, 5) ? 'Buzz' : null;
    }

    final public function getResults(): array
    {
        return $this->results;
    }

    final public function getResultsAsObject(): \stdClass
    {
        return (object) $this->getIndexedResults();
    }

    final public function getResultsAsJson(): string
    {
        return json_encode($this->getIndexedResults());
    }

    final public function setQuantity(int $quantity): FizzBuzz
    {
        if ($quantity <= 1) {
            throw new \Exception("The number of results must be greater than one");
        }

        $this->quantity = $quantity;

        return $this;
    }

    private function getIndexedResults()
    {
        $results = [];

        foreach ($this->results as $key => $result) {
            $results['r' . ($key + 1)] = $result;
        }

        return $results;
    }

    private function isMultipleOf(int $number, int $multiple)
    {
        return $number % $multiple === 0;
    }
}
