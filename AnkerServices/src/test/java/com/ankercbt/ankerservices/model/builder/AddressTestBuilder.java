package com.ankercbt.ankerservices.model.builder;

import com.ankercbt.ankerservices.model.Address;

/**
 * @author tschneck
 *         Date: 26.02.14
 */
public class AddressTestBuilder extends AddressBuilder {
    @Override
    public Address build() {
        if (entity.getAlias() == null) {
            withAlias("Hauptwohnsitz");
        }
        if (entity.getStreet() == null) {
            withStreet("Ingolstaedter Strasse 1");
        }
        if (entity.getZip() == null) {
            withZip("81673");
        }
        if (entity.getCity() == null) {
            withCity("Muenchen");
        }
        if (entity.getCountry() == null) {
            withCountry("Deutschland");
        }
        return super.build();
    }
}
