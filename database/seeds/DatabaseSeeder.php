<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserTokensTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(PolikliniksTableSeeder::class);
        $this->call(GuaranteesTableSeeder::class);
        $this->call(AccessesTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(PatientInsurancesTableSeeder::class);
        $this->call(PatientAccessesTableSeeder::class);
        $this->call(SpecialistsTableSeeder::class);
        $this->call(SchedulesTableSeeder::class);
        $this->call(HandlersTableSeeder::class);
        $this->call(BookingSchedulesTableSeeder::class);
        $this->call(DrugTypesTableSeeder::class);
        $this->call(DrugsTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(BuildingsTableSeeder::class);
        $this->call(LivingsTableSeeder::class);
        $this->call(FamilyPatientsTableSeeder::class);
    }
}
