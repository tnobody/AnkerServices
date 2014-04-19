AnkerServices
=============

## AS - WebServer startUps:

* Embedded Mongo (stand alone)
  `mvn embedmongo:start -Dembedmongo.wait`

* Server Start (SpringBoot)
  `mvn spring-boot:run`

* Only Unit-Tests
  `mvn test`

* All-Tests (Unit + Integration Tests with embedded mongo)
  `mvn verify`
