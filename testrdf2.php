SELECT DISTINCT ?university ?lat ?long ?wiki ?abstrak ?nama ?countryname ?cityname ?rector ?dean ?principal ?provost ?officerInCharge ?jlhgrad ?jlhmurid WHERE {
  ?university a dbo:University.
  ?university foaf:isPrimaryTopicOf ?wiki.
  ?university dbp:name ?nama.
  ?university dbo:abstract ?abstrak.
  ?university dbo:country ?country.
  ?country dbp:commonName ?countryname.
  ?university dbp:city ?cityname.
  ?university geo:lat ?lat.
  ?university geo:long ?long.
  OPTIONAL {?university dbo:numberOfDoctoralStudents ?jlhgrad}.
  OPTIONAL {?university dbo:numberOfStudents ?jlhmurid}.
  OPTIONAL {?university dbo:rector ?rectoro.
              ?rectoro dbp:name ?rector}.
  OPTIONAL {?university dbo:dean ?deano.
              ?deano dbp:name ?dean}.
  OPTIONAL {?university dbo:principal ?principalo.
              ?principalo dbp:name ?principal}.
  OPTIONAL {?university dbo:provost ?provosto.
              ?provosto dbp:name  ?provost}.
  OPTIONAL {?university dbo:officerInCharge ?officerInChargeo.
              ?officerInChargeo dbp:name ?officerInCharge}.
  FILTER langMatches( lang( ?abstrak ), "EN" )
  filter(regex(str(?nama), "University of Bologna")).

  }
ORDER BY ?university
LIMIT 1
