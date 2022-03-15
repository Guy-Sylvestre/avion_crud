<?php

require_once 'db.php';
$db = new Database();

if (isset($_POST['action']) && $_POST['action'] == "views-avion") {
    $output = '';
    $data = $db->read_avion();
    print_r($db->total_row_count());
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
                  <th>Date d\'ajoute</th>
                  <td>action</td>
              </tr>
        </thead>
        <tbody>';

        foreach ($data as $row) {
            $output .= '<tr class="text-center text-secondary">
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nom'].'</td>
                    <td>'.'<img style="width: 50px" src="data:image/jpeg;base64,' . base64_encode( $row['plan_internte_image'] ) . '" />'.'</td>
                    <td>'.'<img style="width: 50px" src="data:image/jpeg;base64,' . base64_encode( $row['disposition_siege_image'] ) . '" />'.'</td>
                    <td>'.'<img style="width: 50px" src="data:image/jpeg;base64,' . base64_encode( $row['plan_cabine_image'] ) . '" />'.'</td>
                    <td>'.'<img style="width: 50px" src="data:image/jpeg;base64,' . base64_encode( $row['plan_pilotage_image'] ) . '" />'.'</td>
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
        $output .= '<table></table>';
        echo $output;
    }
    else {
        echo '<h3 class="text-center text-secondary mt-5>(Par encore d\'insertion d\'avion dans la base de donnee)</h3>';
    }
}

if (isset($_POST['action']) && $_POST['action'] == "insert-avion") {

    $navion = $_POST['navion'];
    // $p_internte_img = $_FILES['p_internte_img']['name'];
    // $d_siege_img = $_FILES['d_siege_img']['name'];
    // $p_cabine_img = $_FILES['p_cabine_img']['name'];
    // $p_pilotage_img = $_FILES['p_pilotage_img']['size'];
    $c_amenagement_intern = $_POST['c_amenagement_intern'];
    $e_vitre = $_POST['e_vitre'];
    $lampes_temoin = $_POST['lampes_temoin'];

    if (isset($navion) &&  isset($c_amenagement_intern) && isset($e_vitre)  && isset($lampes_temoin) ) {
       if ($_FILES['p_internte_img']['error'] === 4) {
           echo "Image n'existe pas";
       }else{
           $fileName = $_FILES['p_internte_img']['name'];
           $fileSize = $_FILES['p_internte_img']['size'];
           $tmpName = $_FILES['p_internte_img']['tmp_name'];

           $valideImageExtension = ['jpg', 'jpeg', 'png'];
           $imageExtension = explode('.', $fileName);
           var_dump($fileName);
        //    $imageExtension = strtolower(end($imageExtension));

           if (!in_array($imageExtension[1], $valideImageExtension)) {
               var_dump($imageExtension ."Extension de l'image invalide") ;
           }else if ($fileSize > 1000000){
               echo "La taille est trop grande";
           }else {
               $newImageName = uniqid();
               $newImageName .= '.' . $imageExtension;

               $p_internte_img = $newImageName;
               move_uploaded_file($tmpName, 'images/avion/'. $p_internte_img);
               
               $insertion = $db->insert_avion($navion, $p_internte_img, $d_siege_img, $p_cabine_img, $p_pilotage_img, $c_amenagement_intern, $e_vitre, $lampes_temoin);

               echo 'okkkkkkkkkkkkkkkkkkkkkkk';
            }
       }
    }
    print_r($_FILES['p_internte_img']['name']);
    // $insertion = $db->insert_avion($navion, $p_internte_img, $d_siege_img, $p_cabine_img, $p_pilotage_img, $c_amenagement_intern, $e_vitre, $lampes_temoin);
    
}

?>	
	
