<?php
namespace App\Services;

use App\Imports\ImportData;
use Excel;

class CSVService
{
    public function store($file): void
    {
	    Excel::import(new ImportData, $file);
    }

}
