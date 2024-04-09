    <link rel="stylesheet" href="dabootstrap.min.css" >
    <link rel="stylesheet" href="dataTables.bootstrap5.css" >
    <link rel="stylesheet" href="vendor/toastr.min.css" >


    <div class="bg-primary py-2">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="select2.php">acceui</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="libs/faker/index.php">fakerPHP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="autocompletion.php">autocomplet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jquery UI/Ajax</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select2.php">Select2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datatable.php">Datatable Client/Side</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datatableserv.php">Datatable Server/Side</a>
                    </li>
                </ul>
                    <div class="text-white"><?php  echo $_SESSION['login_user'];?></div>
                    <select class="d-inline-block align-top">
                        <option><a class="text-white" href="deconnexion.php"><i class="fa fa-clock text-white mr-2"></i>déconnexion</a></option>
                        <!-- <div class="d-inline-block align-top"><a class="text-white" href="deconnexion.php"><i class="fa fa-clock text-white mr-2"></i>déconnexion</a></div> -->
                    </select>
            </div>
        </div>
    </nav>
</div>




    <script src="jquery-3.7.1.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="dataTables.js"></script>
    <script src="dataTables.bootstrap5.js"></script>
    <script src="vendor/sweetalert2.all.min.js"></script>
    <script src="vendor/toastr.min.js"></script>
