AnkerServices
=============

AS - WebServer startUps:

* Embeded Mongo (stand alone)
  mvn embedmongo:start -Dembedmongo.wait

* Server Start (SpringBoot)
  mvn spring-boot:run

* Only Unit-Tests
  mvn test

* All-Tests (Unit + Integration Tests)
  mvn verify
