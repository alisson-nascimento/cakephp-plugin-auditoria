# CakePHP Plugin de Auditoria

Este plugin faz o papel de coletar as mudanças quando se faz alguma ação de persistencia no banco de dados

## Instalação

Você pode instalar usando o [composer](http://getcomposer.org).

```
composer require alisson-nascimento/cakephp-plugin-auditoria
```
### Habilitar Plugin

```
$ bin/cake plugin load Auditoria
```

### Configurar Behavior

```php
// src/Model/Table/ExampleTable.php

class ExampleTable extends Table
{
    /**
     * @param array $config
     *
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        // Add the behaviour to your table
        $this->addBehavior('Auditoria.Logger');
    }
}
```
