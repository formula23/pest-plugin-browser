<?php

declare(strict_types=1);

namespace Pest\Browser\Operations;

use Pest\Browser\Contracts\Operation;
use Pest\Browser\Traits\StrOrRegExp;
use Pest\Browser\Traits\NotOperationTrait;

/**
 * @internal
 */
final class ToHaveTitle implements Operation
{
    use StrOrRegExp;
    use NotOperationTrait;

    /**
     * Creates an operation instance.
     */
    public function __construct(
        private readonly string $title,
        bool                    $not = false,
    )
    {
        $this->initializeNot($not);
    }

    public function compile(): string
    {
        return sprintf("await expect(page)%s.toHaveTitle(%s);",
            $this->getNotSuffix(),
            $this->strOrRegExp($this->title)
        );
    }
}
