<?php
    ini_set('display_errors', 1);
    ini_set('display_status_errors',1);
    error_reporting(E_ALL);
   include "controle.php";
   //include('session.php');
   include "connexion.php"; 
   $conn=connexion();
         

               // inserer le résultat
         if ( isset($_POST['inserer'] ) ) {
            $nom = $_POST['nom']; 
            $Prenom = $_POST['Prenom']; 
            $date = $_POST['date'];
             // traitemnet d'image
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_type=$_FILES['image']['type'];

            $tmp = explode('.', $file_name);
            $file_ext = end($tmp);
            $extensions= array("jpeg","jpg","png","jpe","gif");
            
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension nom valide, please choose a JPEG,jpg,gif,jpe or PNG file.";
            }
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
            //rename the image file
            $imgnewfilename="images/".md5($file_name).time().'.'.$file_ext;
            if(empty($errors)==true){
               move_uploaded_file($_FILES["image"]["tmp_name"],$imgnewfilename);
               echo "Success";
            }else{
               print_r($errors);
            }
           if ($conn) {
           $insert = mysqli_query($conn,
           "INSERT INTO etudiant(nom, prenom, date_naissance ,image) VALUES ('$nom','$Prenom','$date','$imgnewfilename')");
           }
         }

               //delete file
         if ( isset( $_GET['id_Etudiant'] ) ) {
            $id = $_GET['id_Etudiant'];
            $select = mysqli_query($conn,"SELECT image FROM etudiant WHERE id_etudiant='$id'");
            $row = mysqli_fetch_array($select);
            $file_name = $row["image"];
            // $tmp = explode('/', $file_name);
            // $file_name = end($tmp);
            // Use unlink() function to delete a file
            if ($file_name) {
               unlink($file_name);
               //echo "file deleted";
            }else { echo "file not deleted"; }
            $requete = "DELETE FROM etudiant WHERE id_etudiant='$id'";
            $sql = mysqli_query($conn, $requete);
            if($sql){
               //echo' surpretion réussir ' ;
            }else{ echo' la surpretion etudiant échouer'; }
         }
         //lister etudiant 

         //lister etudiant end
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>accueil</title>
      <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/fonts/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/jquery-ui-1.12.1/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/jquery-ui-themes-1.12.1/themes/flick/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/jQuery-TE_v.1.4.0/jquery-te-1.4.0.css">
   </head>
   <body>
      <div class="container-flud">
         <?php include "heder.php"; ?>
         <div class="d-flex">

         <!-- border debu -->
            <div style="height: 550px; background-color:rgb(53, 52, 52) ;">
               <?php include "border.php"; ?>
            </div>
            <!-- border fin -->
            <div class="col-sm-9 md-9 my-12 ml-4 mt-2 " >
               <!-- body debu -->
                  <!-- formulaire enrejistrement etudiant -->
               <h2 class="text-success" style="text-align: center; margin: 1%;">Gestion Des Medicaments</h2>
               <h3 class="text-darck" style="text-align: center; margin: 1%;">Liste Des Medicaments</h3>
               <input type="submit" class="btn btn-success text-center" name="inserer" style="margin-left: 3%;" value="Ajouter un Medicaments">
               <div class="container card-body table-responsive">
               <table id="produitTable" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                     <tr>
                           <th>ID Produit</th>
                           <th>Code Produit</th>
                           <th>Nom Produit</th>
                           <th>Prix Unitaire</th>
                           <th>Action</th> <!-- Nouvelle colonne pour les actions -->
                     </tr>
                  </thead>
               </table>
               </div>

               <!-- body fin -->
         </div>   
      </div>
         
      <!-- <script src="jquery-3.7.1.js"></script>
      <script src="bootstrap.bundle.min.js"></script>
      <script src="dataTables.js"></script>
      <script src="dataTables.bootstrap5.js"></script>
      <script src="vendor/sweetalert2.all.min.js"></script>
      <script src="vendor/toastr.min.js"></script> -->
      <script type="text/javascript" src="vendor/js/jquery.min.js"></script>
      <script type="text/javascript" src="vendor/js/popper.min.js"></script>
      <script type="text/javascript" src="vendor/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="vendor/fonts/js/all.js"></script>
      <script type="text/javascript" src="vendor/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="vendor/js/dataTables.bootstrap4.min.js"></script>
      <script type="text/javascript" src="vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
      <script type="text/javascript" src="vendor/jQuery-TE_v.1.4.0/jquery-te-1.4.0.min.js"></script>
      <script>
         $(document).ready(function() {
            $('#produitTable').DataTable({
                  "serverSide": true,
                  "ajax": {
                     "url": "server.php", // Le script PHP côté serveur pour la récupération des données
                     "type": "POST"
                  },
                  "columns": [
                     { "data": "idProd" },
                     { "data": "codeProd" },
                     { "data": "nomProd" },
                     { "data": "prixU" },
                     {
                        // Colonne des actions avec le bouton de suppression
                        "data": null,
                        "render": function(data, type, row) {
                              return '<button class="btn btn-danger deleteBtn" data-id="' + row.idProd + '">Supprimer</button>';
                        }
                     }
                  ],
                  "columnDefs": [
                     { "targets": [4], "orderable": false } // Désactiver le tri pour la colonne des actions
                  ]
            });

            // Supprimer un produit
            $('#produitTable').on('click', '.deleteBtn', function() {
                  const productId = $(this).data('id');

                  Swal.fire({
                     title: 'Confirmation',
                     text: 'Êtes-vous sûr de vouloir supprimer ce produit?',
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonText: 'Oui, Supprimer',
                     cancelButtonText: 'Annuler'
                  }).then((result) => {
                     if (result.isConfirmed) {
                        // Code de suppression du produit
                        $.ajax({
                              url: 'supprimer_produit.php?id=' + productId,
                              type: 'DELETE',
                              success: function(response) {
                                 if (response.success) {
                                    toastr.success('Le produit a été supprimé avec succès!');
                                    // Actualiser la page ou recharger les données du tableau
                                    location.reload();
                                 } else {
                                    toastr.error('Erreur lors de la suppression du produit.');
                                 }
                              },
                              error: function(xhr, status, error) {
                                 console.error('Erreur:', error);
                                 toastr.error('Une erreur s\'est produite lors de la suppression du produit.');
                              }
                        });
                     }
                  });
            });
         });
      </script>
 
   </body>
</html>





