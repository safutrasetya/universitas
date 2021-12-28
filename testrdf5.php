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
  $foaf = new \EasyRdf\Graph("http://njh.me/foaf.rdf");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $amerika = "Italy";
      $result = $sparql->query(
          'SELECT ?university ?nama ?country ?city ?cityname ?jlhdoc ?jlhmurid ?jlhblmlulus WHERE { '.
            '?university a dbo:University.'.
            '?university dbp:country dbr:Italy.'.
            '?university dbp:name ?nama.'.
            'OPTIONAL {?university dbo:numberOfDoctoralStudents ?jlhdoc}.'.
            'OPTIONAL {?university dbo:numberOfStudents ?jlhmurid}.'.
            'OPTIONAL {?university dbo:numberOfUndergraduateStudents ?jlhblmlulus}.'.
            '}'.
          'ORDER BY ?university'.
          'LIMIT 100'
            );

      ?>
    <p>
      <?php
        $no = 1;
        if(!empty($result)){
          foreach ($result as $row) {
            echo"
              <tr>
                  <td>" . $no++ . "</td>
                  <td>" . $row->nama . "</td>
                  <form method='POST' action='detail.php'>
                      <input type='hidden' value='" . $row->nama . "' name='namaBandara'/>
                      <button type='submit' name='airportName' class='btn btn-outline-primary'>Detail</a></button>
                  </form>
                  </td>
              </tr>
            ";
          }
          echo "RESULT ADA";
        }else{
          echo "RESULT KOSONG";
        }
      ?>
    </p>
  </body>
</html>
