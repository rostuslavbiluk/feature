<?php declare(strict_types=1);

namespace App\Services\Toggle;


class FeatureContext
{
    /**
     * Storage for all context values
     *
     * @var array
     */
    private $storage = [];

    /**
     * Add a context value. The key must be unique and cannot be replaced
     */
    public function add(string $name, $value): void
    {
        $this->storage[$name] = $value;
    }

    /**
     * Get context value of given string or default value
     */
    public function get(string $name, $default = null): ?array
    {
        return array_key_exists($name, $this->storage) ? $this->storage[$name] : $default;
    }

    /**
     * Get all context values (key => value pairs)
     */
    public function all(): array
    {
        return $this->storage;
    }

    /**
     * Has given context value
     */
    public function has(string $name): bool
    {
        return array_key_exists($name, $this->storage);
    }
}
