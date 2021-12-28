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

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

  <style type="text/css" media="all">
    #map {
      border: 1px gray solid;
      float: right;
      margin: 0 0 20px 20px;
    }
    #mapid {
      width: 100%;
      height: 324px;
    }
  </style>
  <title>Cari Universitas</title>
</head>
  <body class="bg-image" style="background-image: url('img/finderimg.jpg'); ">
    <div class="bg-image" style="background-image: url('img/finderimg.jpg');  height: 50vh;">
      <div class="p-5 text-center">
        <p class="display-4 text-light">Search for universities around the world!</p>
      </div>
      <?php
        if (isset($_POST['namauniv'])) {
          $namauniv = $_POST['namauniv'];
          $result = $sparql->query(
            'SELECT DISTINCT ?university ?lat ?long ?wiki ?abstrak ?nama ?countryname ?cityname ?rector ?dean ?principal ?provost ?officerInCharge ?jlhgrad ?jlhmurid WHERE {'.
              '?university a dbo:University.'.
              '?university foaf:isPrimaryTopicOf ?wiki.'.
              '?university dbp:name ?nama.'.
              '?university dbo:abstract ?abstrak.'.
              '?university dbo:country ?country.'.
              '?country dbp:commonName ?countryname.'.
              '?university geo:lat ?lat.'.
              '?university geo:long ?long.'.
              'OPTIONAL {?university dbo:numberOfDoctoralStudents ?jlhgrad}.'.
              'OPTIONAL {?university dbo:numberOfStudents ?jlhmurid}.'.
              'OPTIONAL {?university dbo:rector ?rectoro.
                          ?rectoro dbp:name ?rector}.'.
              'OPTIONAL {?university dbo:dean ?deano.
                          ?deano dbp:name ?dean}.'.
              'OPTIONAL {?university dbo:principal ?principalo.
                          ?principalo dbp:name ?principal}.'.
              'OPTIONAL {?university dbo:provost ?provosto.
                          ?provosto dbp:name  ?provost}.'.
              'OPTIONAL {?university dbo:officerInCharge ?officerInChargeo.
                          ?officerInChargeo dbp:name ?officerInCharge}.'.
              'FILTER langMatches( lang( ?abstrak ), "EN" )'.
              'filter(regex(str(?nama), "' . $namauniv . '")).'.

              '}'.
            'ORDER BY ?university'.
            'LIMIT 1'
          );
      ?>
      <div class="p-5 bg-dark border border-light rounded">
        <?php
          if(!empty($result)){
            $no = 1;
            foreach ($result as $row) {
              $detail = [
                'lat' =>$row->lat,
                'long'=>$row->long,
                'wiki'=>$row->wiki
              ];
              EasyRdf_Namespace::setDefault('og');

              $wiki = EasyRdf_Graph::newAndLoad($detail['wiki']);
              $foto_url = $wiki->image;
        ?>
        <div class="p-5 bg-light border border-warning border-4 rounded">
          <p class="display-5"><?php echo $row->nama; ?></p>
          <div class="text-center">
            <img src="<?= $foto_url ?>" alt="GAMBAR UNIVERSITAS" style="height: 400px;  width: auto;">
          </div>
          <p class="mt-3"><?php echo $row->abstrak; ?></p>
          <p>Negara : <?php echo $row->countryname; ?></p>
          <p>Lokasi : </p>
          <p>Rektor : <?php echo $row->rector; ?></p>
          <p>Kepala Sekolah : <?php if(!empty($row->principal)){ echo $row->principal;} ?></p>
          <p>Dekan : <?php if(!empty($row->dean)){ echo $row->dean;} ?></p>
          <p>Pemelihara/Wali  : <?php if(!empty($row->provost)){ echo $row->provost;} ?></p>
          <p>Petugas yang bertanggung jawab : <?php if(!empty($row->officerInCharge)){ echo $row->officerInCharge;} ?></p>
          <p>Jumlah Murid :  <?php if(!empty($row->jlhmurid)){ echo $row->jlhmurid;} ?></p>
          <p>Jumlah Murid bergelar Doktor : <?php if(!empty($row->numberOfDoctoralStudents)){ echo $row->numberOfDoctoralStudents;} ?> </p>
          <div class="col-sm-8">

            <?php
              print "<div id='mapid'></div>";
              $map_script = "var mymap = L.map('mapid').setView([" . $detail['lat'] . ", " . $detail['long'] . "], 13);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        maxZoom: 18,
                        attribution: 'Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors, ' +
                                  '<a href=\"https://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, ' +
                                     'Imagery © <a href=\"https://www.mapbox.com/\">Mapbox</a>',
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1
                       }).addTo(mymap);

                       L.marker([" . $detail['lat'] . ", " . $detail['long'] . "]).addTo(mymap)
                       .bindPopup(\"<b>" . $row->nama . "</b>\").openPopup();";

              print "<script>" . $map_script . "</script>";

            ?>
          </div>




        </div>
      </div>
      <?php
            $no++;
          }
          echo $no;
        }else{
          echo "RESULT KOSONG";
        }
      }
      ?>
    </div>

  </body>
</html>
