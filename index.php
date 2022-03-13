<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import bootstrap 5 fontawesome 5 css sweetalert2-->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>CRUD App Avion</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Avion</a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>

      <!-- corps -->
      <div class="container">

          <div class="row mt-3">
              <div class="col-lg-12">
                  <h4 class="text-center text-danger font-weight-normal-my-3">CRUD Application</h4>
              </div>
          </div>

          <div class="row mt-3">
              <div class="col-lg-6">
                  <h4 class="mt-2 tex-primary">Tous les avions</h4>
              </div>
              <div class="col-lg-6">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#avionModalToggle">&nbsp; Ajoute d'avion</button>
                    <a href="#" class="btn btn-success ">Export to Excel</a>
              </div>
          </div>

          <hr class="my-1">

          <div class="row mt-3" id="table_avion">
              <div class="col-lg-12">
                  <div class="table-reponsible" id="showAvion">
                      
                  </div>
              </div>
          </div>
      </div>

      <!-- Modal avion -->
      <div class="modal fade" id="avionModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Ajouter un avion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="" id="form-data">

                        <div class="from-group mb-3">
                            <label for="navion" class="form-label">Nom de l’avion</label>
                            <input type="text" name="navion" id="navion" class="form-control" required>
                        </div>

                        <div class="from-group mb-3">
                            <label for="p_internte_img" class="form-label">Plan interne de l’avion</label>
                            <input type="file" name="p_internte_img" id="p_internte_img" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="d_siege_img" class="form-label">Disposition des sièges</label>
                            <input type="file" name="d_siege_img" id="d_siege_img" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="p_cabine_img" class="form-label">Plan de la cabine</label>
                            <input type="file" name="p_cabine_img" id="p_cabine_img" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="p_pilotage_img" class="form-label">Plan du poste de pilotage</label>
                            <input type="file" name="p_pilotage_img" id="p_pilotage_img" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="c_amenagement_intern" class="form-label">Couleur des aménagements internes</label>
                            <input type="file" name="c_amenagement_intern" id="c_amenagement_intern" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="e_vitre" class="form-label">Epaisseur vitres</label>
                            <input type="text" name="e_vitre" id="e_vitre" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="lampes_temoin" class="form-label">lampes temoin hors circuit</label>
                            <input type="text" name="lampes_temoin" id="lampes_temoin" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Ajouter un avion" name="inert" id="insert" class="btn btn-danger form-control btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <!-- End Modal avion -->


    <!-- Import bootstrap 5 js -->
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    

    <script type="text/javascript">
        $(document).ready(function() {

            show_all_avion();

            function show_all_avion() {
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {action: "view"},
                    success: function(response) {
                        console.log(response);
                        $("#showAvion").html(response);
                    }
                });
            }




            $('#example').DataTable();

        });
        
    </script>
</body>
</html>