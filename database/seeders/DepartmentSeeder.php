<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        truncateTables('departments');

        $departments = [
            ['title' => 'الميكانيكا'],
            ['title' => 'كهرباء'],
            ['title' => 'السمكرة والدهان'],
            ['title' => 'خدمات الإطارات'],
        ];

        foreach ($departments as $department)
            Department::firstOrCreate(['title' => $department['title']], $department);

        $services = [
            [
                'title'=>'رش جزئئ',
                'department_id'=>3,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'رش صدام',
                'department_id'=>3,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'رش كامل (سيارة صغيرة)	',
                'department_id'=>3,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'سمكرة',
                'department_id'=>3,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'اصلاح دينمو',
                'department_id'=>2,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'تركيب كمبروسير جديد',
                'department_id'=>2,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'تغيير طرمبة بنزين داخلية	',
                'department_id'=>1,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'تغيير كلتش',
                'department_id'=>1,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'إصلاح كفر',
                'department_id'=>4,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'تغيير كفر',
                'department_id'=>4,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
            [
                'title'=>'وزن أذرعة',
                'department_id'=>4,
                'service_price'=>rand(100,300),
                'min_price'=>rand(80,100)
            ],
        ];
        foreach ($services as $service)
            Service::firstOrCreate(['title' => $service['title']], $service);
    }
}
