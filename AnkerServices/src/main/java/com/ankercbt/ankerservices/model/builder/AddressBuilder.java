package com.ankercbt.ankerservices.model.builder;

import com.ankercbt.ankerservices.model.Address;

/**
 * @author tschneck
 *         Date: 27.02.14
 */
public class AddressBuilder extends AsEntityBaseBuilder<Address> {
    @Override
    protected Address createEntity() {
        return new Address();
    }

    public AddressBuilder withAlias(String alias) {
        entity.setAlias(alias);
        return this;
    }

    public AddressBuilder withStreet(String street) {
        entity.setStreet(street);
        return this;
    }

    public AddressBuilder withZip(String zip) {
        entity.setZip(zip);
        return this;
    }

    public AddressBuilder withCity(String city) {
        entity.setCity(city);
        return this;
    }

    public AddressBuilder withCountry(String country) {
        entity.setCountry(country);
        return this;
    }

    public AddressBuilder withIsPrimary(boolean isPrimary) {
        entity.setPrimary(isPrimary);
        return this;
    }
}
