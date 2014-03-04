package com.ankercbt.ankerservices.model.builder;

import com.ankercbt.ankerservices.model.Address;
import com.ankercbt.ankerservices.model.PersonOrCompany;

import java.util.Arrays;
import java.util.List;

/**
 * @author tschneck
 *         Date: 26.02.14
 */
public abstract class PersonOrCompanyBuilder<PC extends PersonOrCompany> extends AsEntityBaseBuilder<PC> {

    public PersonOrCompanyBuilder<PC> addAddress(Address address) {
        if (entity.getAddresses() == null) {
            entity.setAddresses(Arrays.asList(address));
        } else {
            entity.getAddresses().add(address);
        }
        return this;
    }

    public PersonOrCompanyBuilder<PC> withAddresses(List<Address> addresses) {
        entity.setAddresses(addresses);
        return this;
    }
}
