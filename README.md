# Symfony 4.4 - zadanie testowe


# utworzenie baz i migracja danych
```bash
./go_creat_db.sh
```

# utworzenie bazy dla testow jednostkowych i wywolanie testow jednostrowych

```bash
./go_creat_db_test_run_tests.sh
```

przypadki testowe wywolywane w testach jednostkowych:

GET /api/teams

GET /api/teams/12

GET /api/persons/42

GET /api/countries


uwaga ad. p. b
- nie wiem po czym mam polaczyc tabele (zawodnikow i zespolu) - po jakim ref id.

