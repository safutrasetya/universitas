<?php
  require 'vendor/autoload.php';
  require_once "lib/EasyRdf.php";
    EasyRdf_Namespace::set('dbp', 'http://dbpedia.org/property/');
  EasyRdf_Namespace::set('dbr', 'http://dbpedia.org/resource/');
  EasyRdf_Namespace::set('db', 'http://dbpedia.org/');
  EasyRdf_Namespace::set('geo', 'http://www.opengis.net/ont/geosparql#');
  EasyRdf_Namespace::set('dbo', 'http://dbpedia.org/ontology/');
  EasyRdf_Namespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
  EasyRdf_Namespace::set('o', 'http://dbpedia.org/ontology/');
  EasyRdf_Namespace::set('p', 'http://dbpedia.org/property/');
  EasyRdf_Namespace::set('owl', 'http://www.w3.org/2002/07/owl#');
  $sparql = new EasyRdf_Sparql_Client('http://dbpedia.org/sparql');
  $foaf = new \EasyRdf\Graph("http://njh.me/foaf.rdf");
  $foaf->load();
  $me = $foaf->primaryTopic();
  echo "My name is: ".$me->get('foaf:name')."\n";

  $amerika = "Italy";
  $result = $sparql->query(
      'SELECT DISTINCT ?nama ?iata WHERE {' .
          '?airport rdf:type o:Airport;' .
              'dbo:abstract ?desc;' .
              'dbo:thumbnail ?image;' .
              'dbo:location dbr:' . str_replace(' ', '_', ucwords($amerika)) . ';' .
              'p:iata ?iata ;' .
              'p:name  ?nama  .' .
          '}' .
          'ORDER by ?nama'
  );

  $no = 1;
                        foreach ($result as $row) {
                            echo"
                                    <tr>
                                        <td>" . $no++ . "</td>
                                        <td>" . $row->nama . "</td>
                                        <td>" . $row->iata . "</td>
                                        <td>
                                        <form method='POST' action='detail.php'>
                                            <input type='hidden' value='" . $row->nama . "' name='namaBandara'/>
                                            <button type='submit' name='airportName' class='btn btn-outline-primary'>Detail</a></button>
                                        </form>
                                        </td>
                                    </tr>
                                ";
                        }




?>
