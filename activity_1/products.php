<?php 
  include 'functions.php';
  $sql = "SELECT * FROM products";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();

  $sql2 = "SELECT id,product_id,name FROM products";
  $stmt2 = $conn->prepare($sql2);
  $stmt2->execute();
  $results2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
  $result2 = $stmt2->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Activites</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">Activities</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Activity 1">
            <a class="nav-link" href="index.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                Users
              </span>
            </a>
          </li>
          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Activity 1">
            <a class="nav-link" href="products.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                Products
              </span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Activities</a>
          </li>
          <li class="breadcrumb-item active">Activity 1</li>
        </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            All Products
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display table table-bordered users" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>ProductID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Created IP</th>
                    <th>Modified IP</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>ProductID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Date Created</th>
                    <th>Date Modified</th>
                    <th>Created IP</th>
                    <th>Modified IP</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach($result as $row){ ?>
                    <?php $date2 = date_create($row['created_date']); ?>
                    <?php $date3 = date_create($row['modified_date']); ?>
                    <tr>
                      <td><?php echo $row['id'];  ?></td>
                      <td><?php echo $row['product_id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['description']; ?></td>
                      <td><?php echo $row['type']; ?></td>
                      <td><?php echo date_format($date2,'y/m/d'); ?></td>
                      <td><?php echo date_format($date3,'y/m/d'); ?></td>
                      <td><?php echo $row['created_ip']; ?></td>
                      <td><?php echo $row['modified_ip']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>

    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Activities</a>
          </li>
          <li class="breadcrumb-item active">Activity 1</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Users ID,Firstname,Lastname
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display table table-bordered users" width="100%" id="dataTable1" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>ProductID</th>
                    <th>Product Name</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>ProductID</th>
                    <th>Product Name</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach($result2 as $row2){ ?>
                    <tr>
                      <td><?php echo $row2['id'];  ?></td>
                      <td><?php echo $row2['product_id']; ?></td>
                      <td><?php echo $row2['name']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
            Updated yesterday at 11:59 PM
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
  </body>
</html>
