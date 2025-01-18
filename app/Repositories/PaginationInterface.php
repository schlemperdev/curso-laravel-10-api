<?php

namespace App\Repositories;

interface PaginationInterface
{
    /**
     * Get the paginated items
     * @return stdClass
     */
    public function items(): array;
    public function total(): int;
    public function perPage(): int;
    public function isFirstPage(): bool;
    public function isLastPage(): bool;
    public function currentPage(): int;
    public function nextPageNumber(): int;
    public function previousPageNumber(): int;
}
