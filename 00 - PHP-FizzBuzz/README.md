# FizzBuzz

Uma simples biblioteca para o jogo Fizz Buzz. O que temos por aqui:

 * Retorno dos resultado como JSON, StdClass ou Array
 * Quantidade de resultados costumizado. o/

### Mas... como usar?

Para usar, basta instanciar a class __FizzBuzz__. No construtor da class é possível setar a quantidade de resultados desejados, que deve ser um número inteiro maior que que __1__. Por padrão, a quantidade é __15__.

```php
$fb = new FizzBuzz(); // por padrão é 15
$fbCustom = new FizzBuzz(100); // setando a quantidade para 100
```
É possível alterar a quantidade depois de instanciar a class através do método __setQuantity(int)__ que recebe como parâmetro a quantidade de resultados desejada.
```php
$fb = new FizzBuzz();
$fb->setQuantity(50); // setando a quantidade para 50
```
Caso a quantidade seja alterada, é preciso executar o método __run()__ para que os resultados sejam alterados para nova quantidade.
```php
$fb = new FizzBuzz();
$fb->setQuantity(50)->run();
```

### E os resultados, como eu obtenho?

Para obter os resultados da execução, basta executar os métodos __getResults(), getResultsAsJson() e getResultsAsObject()__.

```php
$fb = new FizzBuzz();
$fb->setQuantity(5)->run();
// obtendo os resultados
$arrayResult = $fb->getResults(); // array
$jsonResult = $fb->getResultsAsJson(); // JSON
$objectResult = $fb->getResultsAsObject(); // Object \StdClass

var_dump($arrayResult, $jsonResult, $objectResult);
```
A saída da execução acima se parece com o seguinte
```bash
array(5) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  string(4) "Fizz"
  [3]=>
  int(4)
  [4]=>
  string(4) "Buzz"
}

string(46) "{"r1":1,"r2":2,"r3":"Fizz","r4":4,"r5":"Buzz"}"

object(stdClass)#2 (5) {
  ["r1"]=>
  int(1)
  ["r2"]=>
  int(2)
  ["r3"]=>
  string(4) "Fizz"
  ["r4"]=>
  int(4)
  ["r5"]=>
  string(4) "Buzz"
}
```

### Importante!

Os métodos __getResultsAsJson() e getResultsAsObject()__ retornam os resultados em índices ou atributos iniciando com a letra '__r__' minúscula.
```bash
r1, r2, r3, r4 ... rn ...
```
Além disso, a contagem dos índices inicia em 1 e não em 0 como é adotado com __Arrays__.
O método __getResults()__ retorna o resultado como array onde os índices são números inteiros e é iniciado em 0 normalmente.

A menor quantidade de resultados que podem ser obtidos é 2! Caso seja setado um número não inteiro, menor ou igual à __1__ ao instanciar a class ou mesmo pelo método __setQuantity(int)__; uma exceção do tipo __\Exception__ será lançada!

### Créditos
Esta biblioteca foi desenvolvida por [Edson B S Monteiro](mailto:bruno.monteirodg@gmail.com) como exercício do curso de TDD com PHP.

## LAUS DEO .'.
