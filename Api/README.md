# WebService-Progetti
 ## data structure
 Progetti
```
{
    "id": value,
    "nome": "value",
    "descrizione": "value",
    "data_inizio": "value",
    "data_fine": "value",
    "latitudine":"value",
    "longitudine":"value",
    "eta_minima":value
}
```
## data return
 1.Return all records:GET/progetto
 
 2.Return one record:GET/progetto/{id}
## data input
  1. create a new record: POST /progetto
```
{
    "id": value,
    "nome": "value",
    "descrizione": "value",
    "data_inizio": "value",
    "data_fine": "value",
    "latitudine":"value",
    "longitudine":"value",
    "eta_minima":value
}
```
## data update
1.  Update a specific record: PUT /progetto/[id]
```
{
    "id": value,
    "nome": "value",
    "descrizione": "value",
    "data_inizio": "value",
    "data_fine": "value",
    "latitudine":"value",
    "longitudine":"value",
    "eta_minima":value
}
```
## data delete
1.  Delete a specific record: DELETE /progetto/[id]
