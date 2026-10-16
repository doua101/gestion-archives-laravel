<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\Service;
use App\Models\Document;
use App\Models\User;
use App\Models\Entree;
use App\Models\Sortie;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Divisions et Services
        $divisions = [
            'Direction Générale' => ['Service du Courrier', 'Service de la Communication'],
            'Ressources Humaines' => ['Service du Personnel', 'Service de la Formation', 'Service de la Paie'],
            'Finance et Comptabilité' => ['Service de la Comptabilité', 'Service du Budget', 'Service des Marchés Publics'],
            'Informatique' => ['Service Développement', 'Service Infrastructure', 'Service Support Technique'],
            'Archives Centrales' => ['Service des Archives Courantes', 'Service des Archives Intermédiaires', 'Service des Archives Définitives'],
        ];

        foreach ($divisions as $nomDivision => $services) {
            $division = Division::create(['nom_division' => $nomDivision]);
            foreach ($services as $nomService) {
                Service::create([
                    'nom_service' => $nomService,
                    'division_id' => $division->id
                ]);
            }
        }

        // Documents
        $documents = [
            ['title' => 'Contrat de travail N°001', 'type' => 'Contrat', 'emplacement' => 'Armoire-A1', 'statut' => 'disponible', 'division_id' => 2],
            ['title' => 'Rapport Annuel 2024', 'type' => 'Rapport', 'emplacement' => 'Armoire-A2', 'statut' => 'disponible', 'division_id' => 1],
            ['title' => 'Facture F-2024-001', 'type' => 'Facture', 'emplacement' => 'Armoire-B1', 'statut' => 'disponible', 'division_id' => 3],
            ['title' => 'Budget Prévisionnel 2025', 'type' => 'Budget', 'emplacement' => 'Armoire-B2', 'statut' => 'disponible', 'division_id' => 3],
            ['title' => 'Note de Service N°005', 'type' => 'Note', 'emplacement' => 'Armoire-C1', 'statut' => 'disponible', 'division_id' => 1],
            ['title' => 'Procès Verbal Réunion', 'type' => 'PV', 'emplacement' => 'Armoire-C2', 'statut' => 'disponible', 'division_id' => 1],
            ['title' => 'Cahier des Charges', 'type' => 'Cahier', 'emplacement' => 'Armoire-D1', 'statut' => 'disponible', 'division_id' => 4],
            ['title' => 'Décision N°2024-01', 'type' => 'Décision', 'emplacement' => 'Armoire-D2', 'statut' => 'disponible', 'division_id' => 1],
        ];

        foreach ($documents as $doc) {
            Document::create($doc);
        }

        // Utilisateurs
        User::create([
            'name' => 'Admin Système',
            'email' => 'admin@archives.ma',
            'password' => Hash::make('password'),
            'fonction' => 'Administrateur',
            'service_id' => 1
        ]);
        User::create([
            'name' => 'Ahmed Benali',
            'email' => 'ahmed@archives.ma',
            'password' => Hash::make('password'),
            'fonction' => 'Archiviste',
            'service_id' => 5
        ]);
        User::create([
            'name' => 'Fatima Zahra',
            'email' => 'fatima@archives.ma',
            'password' => Hash::make('password'),
            'fonction' => 'Comptable',
            'service_id' => 3
        ]);

        // Entrées
        $entrees = [
            ['document_id' => 1, 'user_id' => 2, 'date_entree' => '2024-01-15', 'motif' => 'Consultation'],
            ['document_id' => 2, 'user_id' => 3, 'date_entree' => '2024-02-10', 'motif' => 'Signature'],
            ['document_id' => 3, 'user_id' => 2, 'date_entree' => '2024-03-05', 'motif' => 'Audit'],
            ['document_id' => 4, 'user_id' => 3, 'date_entree' => '2024-04-20', 'motif' => 'Vérification'],
            ['document_id' => 5, 'user_id' => 2, 'date_entree' => '2024-05-12', 'motif' => 'Modification'],
        ];

        foreach ($entrees as $entree) {
            Entree::create($entree);
        }

        // Sorties
        $sorties = [
            ['entree_id' => 1, 'date_sortie' => '2024-01-20', 'date_retour_prevue' => '2024-01-25', 'date_retour_reel' => '2024-01-24', 'etat_document' => 'bon état'],
            ['entree_id' => 2, 'date_sortie' => '2024-02-15', 'date_retour_prevue' => '2024-02-20', 'date_retour_reel' => '2024-02-20', 'etat_document' => 'bon état'],
            ['entree_id' => 3, 'date_sortie' => '2024-03-10', 'date_retour_prevue' => '2024-03-15', 'date_retour_reel' => null, 'etat_document' => 'bon état'],
        ];

        foreach ($sorties as $sortie) {
            Sortie::create($sortie);
        }
    }
}