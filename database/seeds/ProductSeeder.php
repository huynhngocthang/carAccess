<?php

use App\product;
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
        $products = new product() ;
        $products->id =1 ;
        $products->name = 'Cảm biến lùi Camry' ;
        $products->price = 1500000 ;
        $products->description = 'Cảm biến lùi Camry là thiết bị hỗ trợ lùi xe, đỗ xe được trang bị tiêu chuẩn cho dòng xe Toyota thông dụng' ;
        $products->carModel_id = 1 ;
        $products->brand_id = 1 ;
        $products->save() ;

        $products = new product() ;
        $products->id =2 ;
        $products->name = 'Cụm tăng tổng Camry' ;
        $products->price = 1000000 ;
        $products->description = 'Cụm tăng tổng (tăng đưa curoa) Camry giá tốt nhất tại phụ tùng toyota Hữu Hạnh tphcm' ;
        $products->carModel_id = 1 ;
        $products->brand_id = 1 ;
        $products->save() ;

        $products = new product() ;
        $products->id =3 ;
        $products->name = 'Phuộc sau vios ' ;
        $products->price = 2500000 ;
        $products->description = 'Phuộc (giàm xóc) sau xe toyota Vios chính hãng giá sỉ tại tphcm' ;
        $products->carModel_id = 2 ;
        $products->brand_id = 1 ;
        $products->save() ;

        $products = new product() ;
        $products->id =4 ;
        $products->name = 'Ron cò vios 2018' ;
        $products->price = 450000 ;
        $products->description = 'Ron cò xe TOYOTA VIOS 2018 chính hãng phụ tùng oto Hữu Hạnh' ;
        $products->carModel_id = 2 ;
        $products->brand_id = 1 ;
        $products->save() ;

        $products = new product() ;
        $products->id =5 ;
        $products->name = 'Volang innova 2017' ;
        $products->price = 4000000 ;
        $products->description = 'Volang innova 2017 là bộ phận phụ tùng không thể thiếu trên chiếc xe du lịch Sedan cỡ nhỏ Vios của bạn' ;
        $products->carModel_id = 3 ;
        $products->brand_id = 1 ;
        $products->save() ;

        $products = new product() ;
        $products->id =6 ;
        $products->name = 'Van hằng nhiệt Honda Civic' ;
        $products->price = 400000 ;
        $products->description = 'Cấu tạo van hằng nhiệt xe honda civic' ;
        $products->carModel_id = 4 ;
        $products->brand_id = 2 ;
        $products->save() ;

        $products = new product() ;
        $products->id =7 ;
        $products->name = 'Bơm xăng honda HR_V' ;
        $products->price = 500000 ;
        $products->description = 'Bơm xăng Honda Ctiy chính hãng Honda nhập khẩu tại Honda Thái Lan với chất lượng và giá tốt nhất' ;
        $products->carModel_id = 5 ;
        $products->brand_id = 2 ;
        $products->save() ;

        $products = new product() ;
        $products->id =8 ;
        $products->name = 'Đèn pha CRV 2010' ;
        $products->price = 2000000 ;
        $products->description = 'Phụ tùng ô tô Hữu Hạnh chuyên cung cấp đèn pha Honda CRV 2010 chính hãng giá sỉ tốt nhất' ;
        $products->carModel_id = 6 ;
        $products->brand_id = 2 ;
        $products->save() ;

        $products = new product() ;
        $products->id =9 ;
        $products->name = 'Kính hậu trái SUV ' ;
        $products->price = 2814000 ;
        $products->description = 'là kính hậu trái giá rẻ nhất' ;
        $products->carModel_id = 7 ;
        $products->brand_id = 3 ;
        $products->save() ;

        $products = new product() ;
        $products->id =10 ;
        $products->name = 'Bố thắng sau MPV' ;
        $products->price = 1107000 ;
        $products->description = 'là Bố thắng sau MPV rẻ nhất' ;
        $products->carModel_id = 8 ;
        $products->brand_id = 3 ;
        $products->save() ;

        $products = new product() ;
        $products->id =11 ;
        $products->name = 'Tem giấy chữ xe thương mại' ;
        $products->price = 541200 ;
        $products->description = 'là tem giấy rẻ nhất' ;
        $products->carModel_id = 9 ;
        $products->brand_id = 3 ;
        $products->save() ;

    }
}
