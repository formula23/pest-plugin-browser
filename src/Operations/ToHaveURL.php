<?php

declare(strict_types=1);

namespace Pest\Browser\Operations;

use Pest\Browser\Contracts\Operation;
use Pest\Browser\Traits\NotOperationTrait;

/**
 * @internal
 */
final class ToHaveURL implements Operation
{
    use NotOperationTrait;

    /**
     * Creates an operation instance.
     * @param string $url
     * @param bool $not
     */
    public function __construct(
        private readonly string $url,
        protected readonly bool $not = false,
    )
    {
        //
    }

    public function compile(): string
    {
        return sprintf("await expect(page)%s.toHaveURL(/%s/);",
            $this->isNotOperation(),
            $this->url
        );
    }
}
