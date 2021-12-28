SELECT ?university ?ranking ?namauniv ?country ?cityname ?jlhgrad ?jlhmurid ?jlhblmlulus WHERE {
  ?university a dbo:University.
  ?university dbo:name dbr:University_of_Bologna.
  ?university dbp:name ?namauniv.
  OPTIONAL {?university dbo:numberOfGraduateStudents ?jlhgrad}.
  OPTIONAL {?university dbo:numberOfStudents ?jlhmurid}.
  OPTIONAL {?university dbo:numberOfUndergraduateStudents ?jlhblmlulus}.
  OPTIONAL {?university dbo:nationalRanking ?ranking}.
  }
ORDER BY ?university
LIMIT 20
