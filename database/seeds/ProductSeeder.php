<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = new Product() ;
        $products->id =1 ;
        $products->name = 'Cảm biến lùi Camry' ;
        $products->price = 1500000 ;
        $products->description = 'Cảm biến lùi Camry là thiết bị hỗ trợ lùi xe, đỗ xe được trang bị tiêu chuẩn cho dòng xe Toyota thông dụng' ;
        $products->brand_id = 1 ;
        $products->save() ;

        $products = new Product() ;
        $products->id =2 ;
        $products->name = 'Cụm tăng tổng Camry' ;
        $products->price = 1000000 ;
        $products->description = 'Cụm tăng tổng (tăng đưa curoa) Camry giá tốt nhất tại phụ tùng toyota Hữu Hạnh tphcm' ;
        $products->brand_id = 1 ;
        $products->save() ;

        $products = new Product() ;
        $products->id =3 ;
        $products->name = 'Phuộc sau vios ' ;
        $products->price = 2500000 ;
        $products->description = 'Phuộc (giàm xóc) sau xe toyota Vios chính hãng giá sỉ tại tphcm' ;
        $products->brand_id = 1 ;
        $products->save() ;

    }
}
