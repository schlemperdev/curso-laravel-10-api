<?php

namespace App\Repositories;

use App\Repositories\PaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
    /**
     * @var stdClass[]
     */
    private array $items; // This will hold the collection of the items as stdClass

    public function __construct(
        protected LengthAwarePaginator $paginator
    ) {
        $this->items = $this->resolveItems($this->paginator->items()); // This will resolve the items to stdClass using resolveItems method
    }

    /**
     * @return stdClass
     */
    public function items(): array
    {
        return $this->items;                    // This will return the collection of the items as stdClass
        //return $this->paginator->items();     // This will return the collection of the items as array
    }

    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }

    public function isLastPage(): bool
    {
        return $this->paginator->onLastPage();
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }

    public function nextPageNumber(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    public function previousPageNumber(): int
    {
        return $this->paginator->currentPage() - 1 ;
    }

    private function resolveItems(array $items): array
    {
        $response = [];
        foreach ($items as $item) {
            $stdClassObject = new stdClass();
            foreach ($item->toArray() as $key => $value) {
                $stdClassObject->{$key} = $value;
            }
            array_push($response, $stdClassObject); // This will push the stdClass object to the response array
        }

        return $response;
    }
}
