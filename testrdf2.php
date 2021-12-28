SELECT ?ranking ?nama ?countryname ?cityname ?jlhgrad ?jlhmurid ?jlhblmlulus WHERE {
  ?university a dbo:University.
  ?university dbp:name ?nama.
  ?university dbo:country ?country.
  ?country dbp:commonName ?countryname.
  OPTIONAL {?university dbo:numberOfGraduateStudents ?jlhgrad}.
  OPTIONAL {?university dbo:numberOfStudents ?jlhmurid}.
  OPTIONAL {?university dbo:numberOfUndergraduateStudents ?jlhblmlulus}.
  OPTIONAL {?university dbo:nationalRanking ?ranking}.
  filter(regex(str(?nama), "The University of Iowa")).

  }
