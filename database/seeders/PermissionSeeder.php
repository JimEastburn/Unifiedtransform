<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles
        Role::findOrCreate('admin');
        Role::findOrCreate('teacher');
        Role::findOrCreate('student');

        // create permissions
        Permission::findOrCreate('create users');
        Permission::findOrCreate('view users');
        Permission::findOrCreate('edit users');
        Permission::findOrCreate('delete users');

        Permission::findOrCreate('promote students');

        Permission::findOrCreate('create notices');
        Permission::findOrCreate('view notices');
        Permission::findOrCreate('edit notices');
        Permission::findOrCreate('delete notices');

        Permission::findOrCreate('create events');
        Permission::findOrCreate('view events');
        Permission::findOrCreate('edit events');
        Permission::findOrCreate('delete events');

        Permission::findOrCreate('create syllabi');
        Permission::findOrCreate('view syllabi');
        Permission::findOrCreate('edit syllabi');
        Permission::findOrCreate('delete syllabi');

        Permission::findOrCreate('create routines');
        Permission::findOrCreate('view routines');
        Permission::findOrCreate('edit routines');
        Permission::findOrCreate('delete routines');

        Permission::findOrCreate('create exams');
        Permission::findOrCreate('view exams');
        Permission::findOrCreate('delete exams');
        Permission::findOrCreate('create exams rule');
        Permission::findOrCreate('view exams rule');
        Permission::findOrCreate('edit exams rule');
        Permission::findOrCreate('delete exams rule');
        Permission::findOrCreate('view exams history');

        Permission::findOrCreate('create grading systems');
        Permission::findOrCreate('view grading systems');
        Permission::findOrCreate('edit grading systems');
        Permission::findOrCreate('delete grading systems');
        Permission::findOrCreate('create grading systems rule');
        Permission::findOrCreate('view grading systems rule');
        Permission::findOrCreate('edit grading systems rule');
        Permission::findOrCreate('delete grading systems rule');

        Permission::findOrCreate('take attendances');
        Permission::findOrCreate('view attendances');
        Permission::findOrCreate('update attendances type');

        Permission::findOrCreate('submit assignments');
        Permission::findOrCreate('create assignments');
        Permission::findOrCreate('view assignments');

        Permission::findOrCreate('save marks');
        Permission::findOrCreate('view marks');

        Permission::findOrCreate('create school sessions');

        Permission::findOrCreate('create semesters');
        Permission::findOrCreate('view semesters');
        Permission::findOrCreate('edit semesters');
        Permission::findOrCreate('assign teachers');
        Permission::findOrCreate('create courses');
        Permission::findOrCreate('view courses');
        Permission::findOrCreate('edit courses');

        Permission::findOrCreate('view academic settings');
        Permission::findOrCreate('update marks submission window');
        Permission::findOrCreate('update browse by session');

        Permission::findOrCreate('create classes');
        Permission::findOrCreate('view classes');
        Permission::findOrCreate('edit classes');
        // Permission::create(['name' => 'delete classes']);

        Permission::findOrCreate('create sections');
        Permission::findOrCreate('view sections');
        Permission::findOrCreate('edit sections');
        // Permission::create(['name' => 'delete sections']);

        $user = \App\Models\User::updateOrCreate(
            ['email' => 'admin@ut.com'],
            [
                'first_name' => 'Hasib',
                'last_name' => 'Mahmud',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ]
        );
        $user->givePermissionTo(
            'create school sessions',
            'update browse by session',
            'create semesters',
            'edit semesters',
            'assign teachers',
            'create courses',
            'view courses',
            'edit courses',
            'create classes',
            'view classes',
            'edit classes',
            'create sections',
            'view sections',
            'edit sections',
            'create exams',
            'view exams',
            'create exams rule',
            'edit exams rule',
            'delete exams rule',
            'view exams rule',
            'create routines',
            'view routines',
            'edit routines',
            'delete routines',
            'view marks',
            'view academic settings',
            'update marks submission window',
            'create users',
            'edit users',
            'view users',
            'promote students',
            'update attendances type',
            'view attendances',
            'take attendances',//Teacher only
            'create grading systems',
            'view grading systems',
            'edit grading systems',
            'delete grading systems',
            'create grading systems rule',
            'view grading systems rule',
            'edit grading systems rule',
            'delete grading systems rule',
            'create notices',
            'view notices',
            'edit notices',
            'delete notices',
            'create events',
            'view events',
            'edit events',
            'delete events',
            'create syllabi',
            'view syllabi',
            'edit syllabi',
            'delete syllabi',
            'view assignments'
        );
    }
}
