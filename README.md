![tests](https://github.com/jeyroik/extas-secrets/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/extas-secrets/coverage.svg?branch=master)
<a href="https://github.com/phpstan/phpstan"><img src="https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat" alt="PHPStan Enabled"></a> 
<a href="https://codeclimate.com/github/jeyroik/extas-secrets/maintainability"><img src="https://api.codeclimate.com/v1/badges/399bab47adf2c050f3de/maintainability" /></a>
[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-secrets/v)](//packagist.org/packages/jeyroik/extas-secrets)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-secrets/downloads)](//packagist.org/packages/jeyroik/extas-secrets)
[![Dependents](https://poser.pugx.org/jeyroik/extas-secrets/dependents)](//packagist.org/packages/jeyroik/extas-secrets)


# extas-secrets

Обёртка для Extas'a для работы с секретами.

# Использование

```php
$secret = $this->secrets()->one([...]);
$decrypted = $secret->decrypt();

if ($decrypted) {
    print_r($secret->getValue());
}
```
