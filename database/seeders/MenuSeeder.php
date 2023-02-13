<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        truncateTables('menus');

        $this->insertParents();
        $this->insertSecondLevel();
        $this->insertThirdLevel();
    }

    protected function insertParents()
    {
        $menus = [
            [
                'name' => ["en" => "Dashboard", "ar" => "لوحة التحكم"],
                'route' => "/",
                'icon' => "fas fa-tachometer",
            ],
            [
                'name' => ["en" => "System Setup", "ar" => "إدارة النظام"],
                'route' => null,
                'icon' => "fas fa-tools",
                'parent_id' => null
            ],
            [
                'name' => ["en" => "IncomeExpenses", "ar" => "النفقات والإيرادات"],
                'route' => "income_expenses.index",
                'icon' => "fas fa-money-bill-alt",
            ],
            [
                'name' => ["en" => "Stock Mangment", "ar" => "إدارة المخزون"],
                'route' => null,
                'icon' => "fas fa-store-alt",
                'parent_id' => null
            ], [
                'name' => ["en" => "Clients", "ar" => "العملاء"],
                'icon' => "fa-solid fa-walking",
                'route' => "clients.index",
            ],[
                'name' => ["en" => "Cars", "ar" => "المركبات"],
                'icon' => "fa-solid fa-car",
                'route' => "cars.index",
            ],
            [
                'name' => ["en" => "Configurations", "ar" => "التكوينات"],
                'route' => null,
                'icon' => "fa fa-gears",
                'parent_id' => null
            ],
            [
                'name' => ["en" => "Countries", "ar" => "البلاد"],
                'icon' => "fas fa-globe-africa",
            ], [
                'name' => ["en" => "Routes", "ar" => "المسارات"],
                'icon' => "fas fa-anchor",
            ], [
                'name' => ["en" => "Roles", "ar" => "الصلاحيات"],
                'route' => "roles.index",
                'icon' => "fas fa-check",
            ], [
                'name' => ["en" => "Permissions", "ar" => "الأذونات"],
                'route' => "permissions.index",
                'icon' => "fas fa-shield",
            ],
            // [
            //     'name' => ["en" => "Departments", "ar" => "الأقسام"],
            //     'icon' => "fas fa-home",
            // ],
            [
                'name' => ["en" => "Users", "ar" => "المستخدمين"],
                'icon' => "fas fa-users",
            ], [
                'name' => ["en" => "Announcements", "ar" => "الإعلانات"],
                'icon' => "fas fa-bullhorn",
                'route' => "announcements.index",
            ], [
                'name' => ["en" => "Languages", "ar" => "اللغات"],
                'icon' => "fa-solid fa-language",
                'route' => "languages.index",
            ],
        ];

        $this->saveMenus($menus);
    }

    protected function insertSecondLevel()
    {
        $Configurations = Menu::where('name->en', 'Configurations')->First()->id;
        $Countries = Menu::where('name->en', 'Countries')->First()->id;
        $Routes = Menu::where('name->en', 'Routes')->First()->id;
        $Users = Menu::where('name->en', 'Users')->First()->id;
        $SystemSetup = Menu::where('name->en', 'System Setup')->First()->id;
        $StockMangment = Menu::where('name->en', 'Stock Mangment')->First()->id;
        $menus = [
            [
                'name' => ["en" => "Simulate", "ar" => "المحاكاة"],
                'route' => "simulate.index",
                'icon' => "fas fa-clone",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Commands", "ar" => "الأوامر"],
                'route' => "commands.index",
                'icon' => "fa-solid fa-terminal",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Settings", "ar" => "الإعدادات"],
                'route' => "settings.index",
                'icon' => "fas fa-gear",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Database", "ar" => "قاعدة البيانات"],
                'route' => "database.index",
                'icon' => "fa-solid fa-database",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Menus", "ar" => "القوائم"],
                'route' => "menus.index",
                'icon' => "fas fa-bars",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Oauth Socials", "ar" => "Oauth Socials"],
                'route' => "oauth_socials.index",
                'icon' => "fas fa-icons",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Social Medias", "ar" => "وسائل التواصل الاجتماعي"],
                'route' => "social_medias.index",
                'icon' => "fas fa-icons",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Image Tools", "ar" => "أدوات الصور"],
                'icon' => "fas fa-image",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Content Types", "ar" =>"أنواع المحتوي"],
                'route' => "content_types.index",
                'icon' => "fa fa-folder",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "File Manager", "ar" => "مدير الملفات"],
                'route' => "file.manager",
                'icon' => "fa fa-folder",
                'parent_id' => $Configurations
            ], [
                'name' => ["en" => "Governorates", "ar" => "المحافظات"],
                'route' => "governorates.index",
                'icon' => "fas fa-list",
                'parent_id' => $Countries
            ], [
                'name' => ["en" => "Cities", "ar" => "المدن"],
                'route' => "cities.index",
                'icon' => "fas fa-list",
                'parent_id' => $Countries
            ], [
                'name' => ["en" => "List Routes", "ar" => "عرض المسارات"],
                'route' => "routes.index",
                'icon' => "fa fa-list",
                'parent_id' => $Routes
            ], [
                'name' => ["en" => "Assign Roles", "ar" => "تمكين صلاحيات"],
                'route' => "routes.assign",
                'icon' => "fa fa-link",
                'parent_id' => $Routes
            ], [
                'name' => ["en" => "List Users", "ar" => "عرض المستخدمين"],
                'route' => "users.index",
                'icon' => "fas fa-list",
                'parent_id' => $Users
            ],

            [
                'name' => ["en" => "list Departments", "ar" => "عرض الأقسام"],
                'route' => "departments.index",
                'icon' => "fa fa-list",
                'parent_id' => $SystemSetup
            ], [
                'name' => ["en" => "list Services", "ar" => "عرض الخدمات"],
                'route' => "services.index",
                'icon' => "fa fa-list-alt",
                'parent_id' => $SystemSetup
            ],
            [
                'name' => ["en" => "list Manufacturers", "ar" => "عرض الماركات"],
                'route' => "manufacturers.index",
                'icon' => "fa fa-th-large",
                'parent_id' => $SystemSetup
            ],
            [
                'name' => ["en" => "list Modeles", "ar" => "عرض الموديلات"],
                'route' => "modeles.index",
                'icon' => "fa fa-th",
                'parent_id' => $SystemSetup
            ],
            [
                'name' => ["en" => "list Shopes", "ar" => "مراكز الصيانة"],
                'route' => "shopes.index",
                'icon' => "fa fa-warehouse",
                'parent_id' => $SystemSetup
            ],
            [
                'name' => ["en" => "list IncomeExpensesGroup", "ar" => "انواع النفقات والإيرادات"],
                'route' => "income_expenses_groups.index",
                'icon' => "fa fa-file-invoice-dollar",
                'parent_id' => $SystemSetup
            ],
            [
                'name' => ["en" => "list spareparts", "ar" => "كتالوج قطع الغيار"],
                'route' => 'spareparts.index',
                'icon' => "fas fa-book",
                'parent_id' => $StockMangment
            ],
            [
                'name' => ["en" => "list sparepartShop", "ar" => "المخزون بالمستودع"],
                'route' => 'sparepart_shop.index',
                'icon' => "fa fa-cubes",
                'parent_id' => $StockMangment
            ],
            [
                'name' => ["en" => "list storeSales", "ar" => "مبيعات المستودع"],
                'route' => null,
                'icon' => "fa fa-shopping-cart",
                'parent_id' => $StockMangment
            ],
            [
                'name' => ["en" => "list stockActivities", "ar" => "أنشطة المخزون"],
                'route' => null,
                'icon' => "fa fa-clock",
                'parent_id' => $StockMangment
            ],
            [
                'name' => ["en" => "list receivedFromSupplier", "ar" => "مستلمة من الموزع"],
                'route' => null,
                'icon' => "fa fa-cart-plus",
                'parent_id' => $StockMangment
            ],
            [
                'name' => ["en" => "list returnedToSupplier", "ar" => "معادة  للموزع"],
                'route' => null,
                'icon' => "fa fa-cart-arrow-down",
                'parent_id' => $StockMangment
            ],


            [
                'name' => ["en" => "Create Users", "ar" => "إنشاء مستخدم"],
                'route' => "users.create",
                'icon' => "fas fa-plus",
                'parent_id' => $Users
            ],
        ];

        $this->saveMenus($menus);
    }

    protected function insertThirdLevel()
    {
        $Image_Tools = Menu::where('name->en', 'Image Tools')->First()->id;
        $menus = [
            [
                'name' => ["en" => "Image Quality", "ar" => "جودة الصورة"],
                'route' => "image.cropper",
                'route' => "image.quality",
                'icon' => "fas fa-paint-brush",
                'parent_id' => $Image_Tools
            ], [
                'name' => ["en" => "image-cropper", "ar" => "إقتصاص الصور"],
                'route' => "image.cropper",
                'icon' => "fas fa-crop",
                'parent_id' => $Image_Tools
            ],
        ];

        $this->saveMenus($menus);
    }

    protected function saveMenus($menus)
    {
        foreach ($menus as $menu) {
            $route  = $menu['route'] ?? null;
            $parent = $menu['parent_id'] ?? null;
            $name   = $menu['name']['en'];
            Menu::firstOrCreate(['route' => $route, 'name->en' => $name, 'parent_id' => $parent], $menu);
        }
    }
}
