<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;

class ProductImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $row)
    {
        $data = $row->toArray();;
        foreach ($data as $item){
          //  echo '<pre> ==1'.$item[9] . $item[0].'</pre>';

            $product = Product::where('sku' ,'=', $item[0])->first();
            // echo  '<pre>'.$product.'</pre>';

            if ($product){
                $product->product_msrp_price = $item[9];
                $product->product_map_price = $item[10];
                $product->product_cost_price = $item[11];
                $product->save();
            }


        }

    }
}

