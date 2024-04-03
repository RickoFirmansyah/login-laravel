<?php

namespace App\Traits;

use App\Models\Reference;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Instanceof_;

trait HasReference
{
    private function generateSelect2Reference(Model|array $data, string $key = 'id', string $value = "name", int $limit = 10,  callable $callbackLabel = null)
    {
        if ($data instanceof Model) {
            $data = $data->toArray();
        }
        $result = [];
        foreach ($data as $item) {
            $result[] = [
                "id" => $item[$key],
                "text" => $callbackLabel ? $callbackLabel($item) : $item[$value]
            ];
        }

        return collect($result)->slice(0,$limit)->values();
    }
}
