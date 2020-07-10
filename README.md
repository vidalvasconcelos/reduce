# Reduce

This repository tries to apply reducers to approach a real-world scenario like a Api Response Handler.

```php
function handlerFactory(Strategy ...$strategies): Closure
{
    return static function (User $user, array $data) use ($strategies): User {
        return array_reduce($strategies, static function (User $user, Strategy $c) use ($data): User {
            return $c($user, $data);
        }, $user);
    };
}
```
