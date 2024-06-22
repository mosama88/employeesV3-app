<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'view product']);
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'update product']);
        Permission::create(['name' => 'delete product']);


        Permission::create(['name' =>'الموظفين']);
        Permission::create(['name' =>'أضافة موظف' ]);
        Permission::create(['name' => 'تعديل الموظف']);
        Permission::create(['name' =>'حذف الموظف' ]);
        Permission::create(['name' =>'عرض الموظفين']);
        Permission::create(['name' =>'بيانات الموظفين']);
        Permission::create(['name' =>'عرض حساب الأجازات']);
        Permission::create(['name' =>'عرض كل أجازات الموظف']);
        Permission::create(['name' => 'الاجازات']);
        Permission::create(['name' => 'أضافة أجازه']);
        Permission::create(['name' => 'تعديل الاجازه']);
        Permission::create(['name' =>'حذف الاجازه']);
        Permission::create(['name' =>'طباعة الاجازه']);
        Permission::create(['name' => 'طباعة الاجازه العارضه']);
        Permission::create(['name' =>'الاعدادت العامه' ]);
        Permission::create(['name' => 'العطلات الرسميه']);
        Permission::create(['name' => 'أضافة العطلات الرسميه']);
        Permission::create(['name' => 'تعديل العطلات الرسميه']);
        Permission::create(['name' => 'حذف العطلات الرسميه']);
        Permission::create(['name' => 'الدرجات الوظيفية']);
        Permission::create(['name' => 'أضافة الدرجات الوظيفية']);
        Permission::create(['name' => 'تعديل الدرجات الوظيفية']);
        Permission::create(['name' => 'حذف الدرجات الوظيفية']);
        Permission::create(['name' => 'المسمى الوظيفى']);
        Permission::create(['name' => 'أضافة المسمى الوظيفى']);
        Permission::create(['name' => 'تعديل المسمى الوظيفى']);
        Permission::create(['name' => 'حذف المسمى الوظيفى']);
        Permission::create(['name' => 'النيابات و الأدارات']);
        Permission::create(['name' => 'أضافة النيابات و الأدارات']);
        Permission::create(['name' => 'تعديل النيابات و الأدارات']);
        Permission::create(['name' => 'حذف النيابات و الأدارات']);
        Permission::create(['name' => 'اضافه']);
        Permission::create(['name' => 'حذف']);
        Permission::create(['name' => 'تعديل']);
        Permission::create(['name' => 'المرفقات']);
        Permission::create(['name' => 'تحميل المرفق']);
        Permission::create(['name' => 'قائمة المستخدمين']);
        Permission::create(['name' => 'المستخدمين']);

        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $userRole = Role::create(['name' => 'user']);

        // Lets give all permission to super-admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);

        // Let's give few permissions to admin role.
        $adminRole->givePermissionTo(['create role', 'view role', 'update role']);
        $adminRole->givePermissionTo(['create permission', 'view permission']);
        $adminRole->givePermissionTo(['create user', 'view user', 'update user']);
        $adminRole->givePermissionTo(['create product', 'view product', 'update product']);


        // Let's Create User and assign Role to it.

        $superAdminUser = User::firstOrCreate([
            'email' => 'superadmin@dt.com',
        ], [
            'name' => 'Super Admin',
            'email' => 'superadmin@dt.com',
            'password' => Hash::make ('12345678'),
            'status' => 'active',

        ]);
        $superAdminUser->assignRole($superAdminRole);

        $superAdminUser = User::firstOrCreate([
            'email' => 'mosama@dt.com',
        ], [
            'name' => 'محمد أسامه',
            'email' => 'mosama@dt.com',
            'password' => Hash::make ('@Osama88'),
            'status' => 'active',
        ]);

        $superAdminUser->assignRole($superAdminRole);


        $adminUser = User::firstOrCreate([
            'email' => 'admin@dt.com'
        ], [
            'name' => 'Admin',
            'email' => 'admin@dt.com',
            'password' => Hash::make ('12345678'),
            'status' => 'active',
        ]);
        $adminUser->assignRole($adminRole);


        $staffUser = User::firstOrCreate([
            'email' => 'staff@dt.com',
        ], [
            'name' => 'Staff',
            'email' => 'staff@dt.com',
            'password' => Hash::make('12345678'),
            'status' => 'inactive',
        ]);
        $staffUser->assignRole($staffRole);

        $staffUser = User::firstOrCreate([
            'email' => 'heba@dt.com',
        ], [
            'name' => 'هبة الله سمير',
            'email' => 'heba@dt.com',
            'password' => Hash::make('123456789'),
            'status' => 'active',
        ]);

        $staffUser->assignRole($staffRole);
    }
}
