# Reduce Response handler

This repository tries to apply reducers to approach a real-world scenario like a Api Response Handler.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d150cd7ba33e4452a5093600069fdfee)](https://www.codacy.com/manual/vidalvasconcelos/reducers?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=vidalvasconcelos/reducers&amp;utm_campaign=Badge_Grade)

## Example
```php
function handlerFactory(Strategy ...$strategies): Closure
{
    return static function (User $user, array $data) use ($strategies): User {
        return array_reduce($strategies, static function (User $user, Strategy $callable) use ($data): User {
            return  $callable($user, $data);
        }, $user);
    };
}
```