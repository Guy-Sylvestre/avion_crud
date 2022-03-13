<?php

require_once 'db.php';
$db = new Database();

if (isset($_POST['action']) && $_POST['action'] == "view") {
    $output = '';
    $data = $db->read_avion();
    if ($db->total_row_count() > 0)  {
        $output .= '<table id="example" class="table pt-4 table-striped table-sm table-bordered">
        <thead>
              <tr class="text-center">
                  <th>ID</th>
                  <th>Nom</th>
                  <th>plan intern</th>
                  <th>dispositive de siege</th>
                  <th>plan de cabine</th>
                  <th>plan de pilotage</th>
                  <th>couleur amenagement</th>
                  <th>epaisseur vitre</th>
                  <th>lampes temoin</th>
                  <td>action</td>
              </tr>
        </thead>
        <tbody>';

        foreach ($data as $row) {
            $output .= '<tr class="text-center text-secondary">
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nom'].'</td>
                    <td>'.$row['plan_internte_image'].'</td>
                    <td>'.$row['disposition_siege_image'].'</td>
                    <td>'.$row['plan_cabine_image'].'</td>
                    <td>'.$row['plan_pilotage_image'].'</td>
                    <td>'.$row['couleur_amenagement_interne'].'</td>
                    <td>'.$row['epaisseur_vitre'].'</td>
                    <td>'.$row['lampes_temoin_hors_circuit'].'</td>
                    <td>'.$row['creer'].'</td>

                    <td>
                        <a href="#" title="Voir les detail" class="text-success"><i class="bi bi-info-circle"></i></a>&nbsp; &nbsp;
                        <a href="#" title="Edit" class="text-primary"><i class="bi bi-pencil-square"></i></a>&nbsp; &nbsp;
                        <a href="#" title="Delete" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>
            ';
        }
    }else{
        echo '<h3 class="text-center text-secondary mt-5>(Par encore d\'insertion d\'avion dans la base de donnee)</h3>';
    }
}

?>

id	
	
	
	
	
	
	
	
	
