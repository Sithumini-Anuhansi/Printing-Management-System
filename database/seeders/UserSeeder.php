<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Seeds demo users: two accounts for each of the 7 roles, plus the
 * role-specific detail row (owner, manager, financeofficer, ...).
 *
 * Safe to run repeatedly: users are matched by Email and updated in place.
 * DEVELOPMENT ONLY - these passwords are documented in the README.
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->environment('production')) {
            $this->command?->error('UserSeeder refuses to run in production (demo passwords are public).');

            return;
        }

        foreach ($this->accounts() as $account) {
            $user = $account['user'];

            DB::table('users')->updateOrInsert(
                ['Email' => $user['Email']],
                [
                    'Name'      => $user['Name'],
                    'Password'  => Hash::make($user['Password']),
                    'Role'      => $user['Role'],
                    'Age'       => $user['Age'],
                    'Address'   => $user['Address'],
                    'ProfileID' => null,
                ]
            );

            $userId = DB::table('users')->where('Email', $user['Email'])->value('UserID');

            DB::table($account['table'])->updateOrInsert(
                ['UserID' => $userId],
                $account['details']
            );
        }
    }

    /**
     * @return array<int, array{user: array<string, mixed>, table: string, details: array<string, mixed>}>
     */
    private function accounts(): array
    {
        return [
            // ---------------------------------------------------------- Owner/Admin
            [
                'user' => [
                    'Name' => 'Olivia Owner', 'Email' => 'owner1@printing.test', 'Password' => 'Owner@123',
                    'Role' => 'Owner/Admin', 'Age' => 52, 'Address' => '12 Press Lane, Colombo',
                ],
                'table' => 'owner',
                'details' => [
                    'BusinessStartYear' => 2008, 'BusinessRegistrationNo' => 'PV-00123456',
                    'BusinessLocation' => 'Colombo',
                ],
            ],
            [
                'user' => [
                    'Name' => 'Oscar Owner', 'Email' => 'owner2@printing.test', 'Password' => 'Owner@123',
                    'Role' => 'Owner/Admin', 'Age' => 47, 'Address' => '8 Ink Street, Kandy',
                ],
                'table' => 'owner',
                'details' => [
                    'BusinessStartYear' => 2012, 'BusinessRegistrationNo' => 'PV-00654321',
                    'BusinessLocation' => 'Kandy',
                ],
            ],

            // -------------------------------------------------------------- Manager
            [
                'user' => [
                    'Name' => 'Mia Manager', 'Email' => 'manager1@printing.test', 'Password' => 'Manager@123',
                    'Role' => 'Manager', 'Age' => 41, 'Address' => '5 Offset Road, Colombo',
                ],
                'table' => 'manager',
                'details' => ['TotalEmployees' => 24, 'Experience' => '12 years'],
            ],
            [
                'user' => [
                    'Name' => 'Marcus Manager', 'Email' => 'manager2@printing.test', 'Password' => 'Manager@123',
                    'Role' => 'Manager', 'Age' => 38, 'Address' => '21 Plate Avenue, Gampaha',
                ],
                'table' => 'manager',
                'details' => ['TotalEmployees' => 15, 'Experience' => '8 years'],
            ],

            // ------------------------------------------------------ Finance Officer
            [
                'user' => [
                    'Name' => 'Fiona Finance', 'Email' => 'finance1@printing.test', 'Password' => 'Finance@123',
                    'Role' => 'Finance Officer', 'Age' => 35, 'Address' => '3 Ledger Close, Colombo',
                ],
                'table' => 'financeofficer',
                'details' => [
                    'PayrollCycle' => 'Monthly', 'AuthorizedExpenseLimit' => 250000.00,
                    'HandledTransactions' => 320,
                ],
            ],
            [
                'user' => [
                    'Name' => 'Felix Finance', 'Email' => 'finance2@printing.test', 'Password' => 'Finance@123',
                    'Role' => 'Finance Officer', 'Age' => 31, 'Address' => '17 Audit Way, Negombo',
                ],
                'table' => 'financeofficer',
                'details' => [
                    'PayrollCycle' => 'Bi-weekly', 'AuthorizedExpenseLimit' => 100000.00,
                    'HandledTransactions' => 148,
                ],
            ],

            // --------------------------------------------------------- Sales Officer
            [
                'user' => [
                    'Name' => 'Sara Sales', 'Email' => 'sales1@printing.test', 'Password' => 'Sales@123',
                    'Role' => 'Sales Officer', 'Age' => 29, 'Address' => '44 Market Street, Colombo',
                ],
                'table' => 'salesofficer',
                'details' => ['TotalCustomers' => 86, 'SalesAchieved' => 1250000.00, 'TotalSalesmen' => 4],
            ],
            [
                'user' => [
                    'Name' => 'Sam Sales', 'Email' => 'sales2@printing.test', 'Password' => 'Sales@123',
                    'Role' => 'Sales Officer', 'Age' => 33, 'Address' => '9 Bazaar Road, Galle',
                ],
                'table' => 'salesofficer',
                'details' => ['TotalCustomers' => 52, 'SalesAchieved' => 780000.00, 'TotalSalesmen' => 2],
            ],

            // ----------------------------------------------------- Production Manager
            [
                'user' => [
                    'Name' => 'Priya Production', 'Email' => 'production1@printing.test', 'Password' => 'Production@123',
                    'Role' => 'Production Manager', 'Age' => 44, 'Address' => '30 Factory Lane, Ja-Ela',
                ],
                'table' => 'productionmanager',
                'details' => [
                    'SupervisedEmployees' => 18, 'PrintJobsHandled' => 540,
                    'PendingJobs' => 12, 'MachineCountManaged' => 6,
                ],
            ],
            [
                'user' => [
                    'Name' => 'Pavan Production', 'Email' => 'production2@printing.test', 'Password' => 'Production@123',
                    'Role' => 'Production Manager', 'Age' => 39, 'Address' => '6 Roller Street, Kelaniya',
                ],
                'table' => 'productionmanager',
                'details' => [
                    'SupervisedEmployees' => 10, 'PrintJobsHandled' => 310,
                    'PendingJobs' => 7, 'MachineCountManaged' => 4,
                ],
            ],

            // ------------------------------------------------------ Inventory Manager
            [
                'user' => [
                    'Name' => 'Ivy Inventory', 'Email' => 'inventory1@printing.test', 'Password' => 'Inventory@123',
                    'Role' => 'Inventory Manager', 'Age' => 36, 'Address' => '2 Warehouse Road, Colombo',
                ],
                'table' => 'inventorymanager',
                'details' => [
                    'TotalSuppliers' => 9, 'TotalMaterialTracked' => 64,
                    'CriticalMaterialList' => 'Black ink, A4 paper, Offset plates',
                    'LastRestockDate' => '2026-10-20',
                ],
            ],
            [
                'user' => [
                    'Name' => 'Ian Inventory', 'Email' => 'inventory2@printing.test', 'Password' => 'Inventory@123',
                    'Role' => 'Inventory Manager', 'Age' => 42, 'Address' => '14 Depot Lane, Wattala',
                ],
                'table' => 'inventorymanager',
                'details' => [
                    'TotalSuppliers' => 6, 'TotalMaterialTracked' => 41,
                    'CriticalMaterialList' => 'Cyan ink, Glossy paper',
                    'LastRestockDate' => '2026-11-02',
                ],
            ],

            // ------------------------------------------------------ Logistics Officer
            [
                'user' => [
                    'Name' => 'Lena Logistics', 'Email' => 'logistics1@printing.test', 'Password' => 'Logistics@123',
                    'Role' => 'Logistics Officer', 'Age' => 34, 'Address' => '27 Dispatch Road, Colombo',
                ],
                'table' => 'logisticsofficer',
                'details' => [
                    'TotalDeliveryEmployees' => 8, 'TotalPackagingStaff' => 5,
                    'TotalDeliveriesHandled' => 410, 'QCReportsCreated' => 95,
                ],
            ],
            [
                'user' => [
                    'Name' => 'Liam Logistics', 'Email' => 'logistics2@printing.test', 'Password' => 'Logistics@123',
                    'Role' => 'Logistics Officer', 'Age' => 30, 'Address' => '11 Freight Street, Negombo',
                ],
                'table' => 'logisticsofficer',
                'details' => [
                    'TotalDeliveryEmployees' => 5, 'TotalPackagingStaff' => 3,
                    'TotalDeliveriesHandled' => 205, 'QCReportsCreated' => 40,
                ],
            ],
        ];
    }
}
