# PSR3 Compatible Journal for Scientist

## Installation
`composer require nx/scientist-monolog-journal`

## Usage
```
$config = new \NX\Scientist\Journal\StandardConfig(); //or anything that implements \NX\Scientist\Journal\PSR3Config
$logger = new \Monolog\Monolog(); // or anything that implements Psr\Log\LoggerInterface
$psr3_journal = new \Scientist\Journals\PSR3Journal($logger, $config);
```
