package com.ankercbt.ankerservices.model.builder;

import com.ankercbt.ankerservices.model.Person;
import com.ankercbt.ankerservices.model.Sex;
import org.joda.time.DateTime;

/**
 * @author tschneck
 *         Date: 26.02.14
 */
public class PersonTestBuilder extends PersonBuilder {


    @Override
    public Person build() {
        if (entity.getFirstName() == null) {
            withFirstName("Hans");
        }
        if (entity.getLastName() == null) {
            withLastName("Müller");
        }
        if (entity.getBirthday() == null) {
            withBirthday(new DateTime().minusYears(20).toLocalDate());
        }
        if (entity.getCountryOfBirth() == null) {
            withCountryOfBirth("Deutschland");
        }
        if (entity.getPlaceOfBirth() == null) {
            withPlaceOfBirth("München");
        }
        if (entity.getNationality() == null) {
            withNationality("Deutsch");
        }
        if (entity.getSex() == null) {
            withSex(Sex.MALE);
        }
        if (entity.getAddresses() == null) {
            addAddress(new AddressTestBuilder().build());
        }
        if (entity.getEmailAddress() == null) {
            entity.setEmailAddress("test@ankerservices.de");
        }
        return super.build();
    }


}
