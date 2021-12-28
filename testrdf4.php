PREFIX dbpedia0: <http://dbpedia.org/ontology/>
PREFIX dbpedia2: <http://dbpedia.org/property/>

SELECT ?university ?ranking ?nama ?country ?cityname ?jlhgrad ?jlhmurid ?jlhblmlulus WHERE {
  ?university a dbo:University.
  ?university dbp:country dbr:Italy.
  ?university dbp:name ?nama.
  OPTIONAL {?university dbo:numberOfGraduateStudents ?jlhgrad}.
  OPTIONAL {?university dbo:numberOfStudents ?jlhmurid}.
  OPTIONAL {?university dbo:numberOfUndergraduateStudents ?jlhblmlulus}.
  OPTIONAL {?university dbo:nationalRanking ?ranking}.
  }
ORDER BY ?university
LIMIT 100
