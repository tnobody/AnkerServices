package com.ankercbt.ankerservices.model;

import java.util.List;

/**
 * @author tschneck
 *         Date: 21.02.14
 */
public abstract class PersonOrCompany extends AsEntity {

    private List<Address> addresses;

    public List<Address> getAddresses() {
        return addresses;
    }

    public void setAddresses(List<Address> addresses) {
        this.addresses = addresses;
    }
}
