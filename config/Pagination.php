<?php
class Pagination
{
    private $tableName;
    private $totalItems;
    private $currentPage;
    private $pageSize;
    private $itemsCurrentPage;
    private $startIndex;

    public function Get($tableName, $currentPage, $pageSize)
    {
        $this->tableName = $tableName;
        $this->totalItems = $this->TableCount($tableName);
        $this->currentPage = $currentPage;
        $this->pageSize = $pageSize;
        $this->itemsCurrentPage = $this->TotalItemsCurrentPage();
        $this->startIndex = ($currentPage - 1) * $pageSize;

        $pager = [
            'TotalItems'  => $this->totalItems,
            'CurrentPage' => $this->currentPage,
            'PageSize'    => $this->pageSize,
            'TotalPages'  => $this->TotalPages(),
            'StartPage'   => $this->startIndex + 1,
            'EndPage'     => $this->startIndex + $this->itemsCurrentPage,
            'StartIndex'  => $this->startIndex,
            'EndIndex'    => $this->startIndex + $this->itemsCurrentPage,
        ];
        return $pager;
    }

    private function TableCount($tableName): int
    {
        return (int) Database::GetData("SELECT count(*) FROM $tableName", ['row' => 0, 'cell' => 0]);
    }

    private function TotalPages(): int
    {
        return (int) ceil($this->totalItems / $this->pageSize);
    }

    private function TotalItemsCurrentPage(): int
    {
        $value = $this->totalItems - (($this->currentPage - 1) * $this->pageSize);
        return $value >= $this->pageSize ? $this->pageSize : $value;
    }
}
