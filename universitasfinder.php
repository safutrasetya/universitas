<?php
  require 'vendor/autoload.php';
  require_once "lib/EasyRdf.php";
  EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');
  EasyRdf_Namespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
  EasyRdf_Namespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
  EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
  EasyRdf_Namespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
  EasyRdf_Namespace::set('dc', 'http://purl.org/dc/elements/1.1/');
  EasyRdf_Namespace::set('dbr', 'http://dbpedia.org/resource/');
  EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
  EasyRdf_Namespace::set('db', 'http://dbpedia.org/');
  EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
  EasyRdf_Namespace::set('dbpedia2', 'http://dbpedia.org/property/');
  EasyRdf_Namespace::set('dbpedia', 'http://dbpedia.org/');


  $sparql = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql/');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--BOOSTRAP CSS AND CKEDITOR-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <!--END BOSTTSTRAP AND CKEDITOR-->
  <!--CSS KITA SENDIRI-->
  <link rel="stylesheet" href="css/universitas.css">
  <!--end css kita sendiri-->
  <title>Cari Universitas</title>
</head>
  <body class="bg-image" style="background-image: url('img/finderimg.jpg'); ">
    <div class="bg-image" style="background-image: url('img/finderimg.jpg');  height: 50vh;">
    <!-- <div> -->
      <!-- <img src="img/univfinderimg.jpg" class="bg-image finderbgimg"> -->
      <div class="p-5 h-100 text-center mb-5">
        <p class="display-4 text-light">Search for universities around the world!</p>
        <form action="" method="POST">
          <div class="row my-5">
            <div class="col-sm-8">
              <input type="text" class="form-control" name="univcari" placeholder="Enter the name of a country">
            </div>
            <div class="col-sm-4">
              <button type="submit" class="btn btn-secondary form-control">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="px-5 py-3 bg-dark" >
      TEST
      <div class="m-4 p-5 bg-warning">
        <table class="table table-striped table-bordered table-light">
          <thead>
            <tr class="h4">
              <td>No.</td>
              <td>Nama Universitas</td>
              <td>Jumlah Mahasiswa</td>
              <td>Detail</td>
            </tr>
          </thead>
          <?php
          if (isset($_POST['univcari'])) {
            $result = $sparql->query(
                'SELECT ?university ?ranking ?nama ?country ?cityname ?jlhgrad ?jlhmurid ?jlhblmlulus WHERE { '.
                  '?university a dbo:University.'.
                  '?university dbp:country dbr:' . str_replace(' ', '_', ucwords($_POST['univcari'])) . '.' .
                  '?university dbp:name ?nama.'.
                  'OPTIONAL {?university dbo:numberOfGraduateStudents ?jlhgrad}.'.
                  'OPTIONAL {?university dbo:numberOfStudents ?jlhmurid}.'.
                  'OPTIONAL {?university dbo:numberOfUndergraduateStudents ?jlhblmlulus}.'.
                  'OPTIONAL {?university dbo:nationalRanking ?ranking}.'.
                  '}'.
                'ORDER BY DESC(?jlhmurid)'
            );
          }
            ?>



          <tb>
            <?php
              $no = 1;
              if(!empty($result)){
                foreach ($result as $row) {
                  echo"
                    <tr>
                        <td>" . $no++ . "</td>
                        <td>" . $row->nama . "</td>
                        <td>";
                        if(!empty($row->jlhmurid)){
                          echo $row->jlhmurid;
                        }else{}
                  echo"
                        </td>".
                        "<td>
                          <form method='POST' action='detail.php'>
                              <input type='hidden' value='" . $row->nama . "' name='namauniv'/>
                              <button type='submit' name='airportName' class='btn btn-info'>
                                <img src='img/settingicon.png' style='height:20px; width:20px; margin-top:-5px'>
                                Detail
                              </button>
                          </form>
                        </td>
                    </tr>
                  ";
                }
              }else{
                echo "RESULT KOSONG";
              }
            ?>
          </tb>
        </table>
      </div>
    </div>
  </body>
</html>
