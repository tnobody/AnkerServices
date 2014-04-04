package com.ankercbt.ankerservices.model;

import org.springframework.data.mongodb.core.index.Indexed;
import org.springframework.data.mongodb.core.mapping.Field;

import java.util.List;

/**
 * @author tschneck
 *         Date: 21.02.14
 */
public abstract class PersonOrCompany extends AsDocument {

    private List<Address> addresses;

    @Field("email")
    @Indexed(unique = false)
    private EmailAddress emailAddress;

    public List<Address> getAddresses() {
        return addresses;
    }

    public void setAddresses(List<Address> addresses) {
        this.addresses = addresses;
    }

    public EmailAddress getEmailAddress() {
        return emailAddress;
    }

    public void setEmailAddress(EmailAddress emailAddress) {
        this.emailAddress = emailAddress;
    }

    public void setEmailAddress(String s) {
        this.emailAddress = new EmailAddress(s);
    }

    @Override
    public String toString() {
        return "addresses=" + addresses +
                ", emailAddress=" + emailAddress;
    }
}
