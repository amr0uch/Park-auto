<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Junges\ACL\Http\Models\Group;
use App\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create some permissions:
        DB::table('permissions')->insert([
            ['name' => 'ajouter voiture', 'slug' => 'can-add-car', 'description' => 'Car permissions', 'entity'=>'Voiture'],
            ['name' => 'editer voiture', 'slug' => 'can-edit-car', 'description' => 'Car permissions', 'entity'=>''],
            ['name' => 'supprimer voiture', 'slug' => 'can-delete-car', 'description' => 'Car permissions', 'entity'=>''],
            ['name' => 'operations de voiture', 'slug' => 'can-show-car-operation', 'description' => 'Car permissions', 'entity'=>''],
            ['name' => 'gestion voitures', 'slug' => 'can-index-car', 'description' => 'Car permissions', 'entity'=>''],

            ['name' => 'ajouter operation', 'slug' => 'can-add-operation', 'description' => 'Operation permissions', 'entity'=>'Operation'],
            ['name' => 'editer operation', 'slug' => 'can-edit-operation', 'description' => 'Operation permissions', 'entity'=>''],
            ['name' => 'supprimer operation', 'slug' => 'can-delete-operation', 'description' => 'Operation permissions', 'entity'=>''],
            ['name' => 'gestion operations', 'slug' => 'can-index-operation', 'description' => 'operation permissions', 'entity'=>''],

            ['name' => 'ajouter status', 'slug' => 'can-add-status', 'description' => 'Status permissions','entity'=>'Status'],
            ['name' => 'editer status', 'slug' => 'can-edit-status', 'description' => 'Status permissions','entity'=>''],
            ['name' => 'supprimer status', 'slug' => 'can-delete-status', 'description' => 'Status permissions','entity'=>''],
            ['name' => 'gestion status', 'slug' => 'can-index-status', 'description' => 'Status permissions','entity'=>''],

            ['name' => 'ajouter Operation-Voiture', 'slug' => 'can-add-alertcar', 'description' => 'operationvoiture permissions','entity'=>'Operation-Voiture'],
            ['name' => 'editer Operation-Voiture', 'slug' => 'can-edit-alertcar', 'description' => 'OperationVoiture permissions','entity'=>''],
            ['name' => 'supprimer Operation-Voiture', 'slug' => 'can-delete-alertcar', 'description' => 'OperationVoiture permissions','entity'=>''],
            ['name' => 'gestion Operation-Voiture', 'slug' => 'can-index-alertcar', 'description' => 'OperationVoiture permissions','entity'=>''],

            ['name' => 'ajouter utilisateur', 'slug' => 'can-add-user', 'description' => 'User permissions','entity'=>'Utilisateur'],
            ['name' => 'editer utilisateur', 'slug' => 'can-edit-user', 'description' => 'User permissions','entity'=>''],
            ['name' => 'supprimer utilisateur', 'slug' => 'can-delete-user', 'description' => 'User permissions','entity'=>''],
            ['name' => 'restaurer utilisateur', 'slug' => 'can-restore-user', 'description' => 'User permissions','entity'=>''],
            ['name' => 'gestion utilisateurs', 'slug' => 'can-index-user', 'description' => 'User permissions','entity'=>''],

            ['name' => 'ajouter contrat', 'slug' => 'can-add-contract', 'description' => 'Contract permission','entity'=>'Contrat'],
            ['name' => 'editer contrat', 'slug' => 'can-edit-contract', 'description' => ' Contract permission','entity'=>''],
            ['name' => 'supprimer contrat', 'slug' => 'can-delete-contract', 'description' => 'Contract permission','entity'=>''],
            ['name' => 'afficher contrat', 'slug' => 'can-show-contract', 'description' => 'Contract permission','entity'=>''],
            ['name' => 'restaure contrat', 'slug' => 'can-restore-contract', 'description' => 'Contract permission','entity'=>''],
            ['name' => 'gestion contrats', 'slug' => 'can-index-contract', 'description' => 'Contract permission','entity'=>''],

            ['name' => 'ajouter client', 'slug' => 'can-add-client', 'description' => 'Client permissions','entity'=>'Client'],
            ['name' => 'editer client', 'slug' => 'can-edit-client', 'description' => 'Client permissions','entity'=>''],
            ['name' => 'supprimer client', 'slug' => 'can-delete-client', 'description' => 'Client permissions','entity'=>''],
            ['name' => 'afficher client', 'slug' => 'can-show-client', 'description' => 'Client permissions','entity'=>''],
            ['name' => 'gestion client', 'slug' => 'can-index-client', 'description' => 'Client permissions','entity'=>''],

            ['name' => 'ajouter document', 'slug' => 'can-add-document', 'description' => 'Document permissions','entity'=>'Document'],
            ['name' => 'editer document', 'slug' => 'can-edit-document', 'description' => 'document permissions','entity'=>''],
            ['name' => 'supprimer document', 'slug' => 'can-delete-document', 'description' => 'document permissions','entity'=>''],
            ['name' => 'gestion document', 'slug' => 'can-index-document', 'description' => 'document permissions','entity'=>''],

            ['name' => 'ajouter Client-Documen', 'slug' => 'can-add-documentclient', 'description' => 'DocumentClient permissions','entity'=>'Client-Document'],
            ['name' => 'editer Client-Documen', 'slug' => 'can-edit-documentclient', 'description' => 'DocumentClient permissions','entity'=>''],
            ['name' => 'supprimer Client-Documen', 'slug' => 'can-delete-documentclient', 'description' => 'DocumentClient permissions','entity'=>''],
            ['name' => 'gestion Client-Documen', 'slug' => 'can-index-documentclient', 'description' => 'DocumentClient permissions','entity'=>''],

            ['name' => 'ajouter entretien', 'slug' => 'can-add-entretien', 'description' => 'Entretien permissions','entity'=>'Entretien'],
            ['name' => 'editer entretien', 'slug' => 'can-edit-entretien', 'description' => 'Entretien permissions','entity'=>''],
            ['name' => 'supprimer entretien', 'slug' => 'can-delete-entretien', 'description' => 'Entretien permissions','entity'=>''],
            ['name' => 'gestion entretien', 'slug' => 'can-index-entretien', 'description' => 'Entretien permissions','entity'=>''],

            ['name' => 'ajouter role', 'slug' => 'can-add-role', 'description' => 'Role permissions','entity'=>'Role'],
            ['name' => 'editer role', 'slug' => 'can-edit-role', 'description' => 'Role permissions','entity'=>''],
            ['name' => 'supprimer role', 'slug' => 'can-delete-role', 'description' => 'Role permissions','entity'=>''],
            ['name' => 'gestion role', 'slug' => 'can-index-role', 'description' => 'Role permissions','entity'=>''],

        ]);
        // Create some groups:
        Group::insert([
            ['name' => 'd3soft', 'slug' => 'd3soft', 'description' => 'This is d3soft'],
            ['name' => 'admin', 'slug' => 'admin', 'description' => 'This is the group admin'],
            // ['name' => 'employee', 'slug' => 'employee', 'description' => 'This is the group employee'],

        ]);
        //Then, you can add permissions to groups and add the user to any group you want:
        $group = Group::find(1);
        $group->assignPermissions(['can-add-car', 'can-edit-car','can-delete-car',
        'can-show-car-operation','can-add-operation', 'can-edit-operation', 'can-delete-operation','can-add-status',
         'can-edit-status','can-delete-status', 'can-add-alertcar','can-edit-alertcar','can-delete-alertcar',
        'can-add-user','can-edit-user','can-delete-user', 'can-add-contract','can-edit-contract',
        'can-delete-contract','can-show-contract','can-add-client','can-edit-client', 'can-delete-client',
        'can-show-client','can-add-document', 'can-edit-document', 'can-delete-document','can-add-documentclient',
        'can-edit-documentclient','can-delete-documentclient','can-add-entretien','can-edit-entretien',
        'can-delete-entretien','can-restore-contract','can-restore-user','can-index-role','can-delete-role','can-edit-role',
        'can-add-role', 'can-index-entretien','can-index-documentclient','can-index-document','can-index-client','can-index-contract',
        'can-index-user','can-index-alertcar','can-index-status', 'can-index-operation','can-index-car']);
        $group = Group::find(2);
        $group->assignPermissions(['can-add-car', 'can-edit-car','can-delete-car',
        'can-show-car-operation','can-add-operation', 'can-edit-operation', 'can-delete-operation','can-add-status',
         'can-edit-status','can-delete-status', 'can-add-alertcar','can-edit-alertcar','can-delete-alertcar',
        'can-add-user','can-edit-user','can-delete-user', 'can-add-contract','can-edit-contract',
        'can-delete-contract','can-show-contract','can-add-client','can-edit-client', 'can-delete-client',
        'can-show-client','can-add-document', 'can-edit-document', 'can-delete-document','can-add-documentclient',
        'can-edit-documentclient','can-delete-documentclient','can-add-entretien','can-edit-entretien',
        'can-delete-entretien','can-index-role','can-delete-role','can-edit-role',
        'can-add-role', 'can-index-entretien','can-index-documentclient','can-index-document','can-index-client','can-index-contract',
        'can-index-user','can-index-alertcar','can-index-status', 'can-index-operation','can-index-car']);

        $user = User::find(1);
        $user->assignGroup('d3soft');
        $user = User::find(2);
        $user->assignGroup('admin');
  
    }
}
