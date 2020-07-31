<?php

namespace App\Http\Controllers\Import;

use App\City;
use App\Http\Controllers\Controller;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;

class ImportCitiesFromCsv extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $handle = fopen($request->file('cities')->path(), 'r');
        } catch (\Throwable $exception) {
            die('invalid file');
        }

        $this->skipHeaderLine($handle);

        while ($city = fgets($handle, 4096)) {
            $item = str_getcsv($city);


            $city = new City();
            $city->name = $item[0];
            [$city->ltd, $city->lng] = explode(',', $item[1]);
            $city->save();
        }
    }

    protected function skipHeaderLine($handle): void
    {
        fgets($handle, 4096);
    }
}
