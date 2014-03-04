package com.ankercbt.ankerservices.model.builder;

import com.ankercbt.ankerservices.model.Person;
import com.ankercbt.ankerservices.model.Sex;
import org.joda.time.LocalDate;

/**
 * @author tschneck
 *         Date: 26.02.14
 */
public class PersonBuilder extends PersonOrCompanyBuilder<Person> {
    @Override
    protected Person createEntity() {
        return new Person();
    }

    public PersonBuilder withFirstName(String firstName) {
        entity.setFirstName(firstName);
        return this;
    }

    public PersonBuilder withLastName(String lastName) {
        entity.setLastName(lastName);
        return this;
    }

    public PersonBuilder withBirthday(LocalDate birthday) {
        entity.setBirthday(birthday);
        return this;
    }

    public PersonBuilder withCountryOfBirth(String countryOfBirth) {
        entity.setCountryOfBirth(countryOfBirth);
        return this;
    }

    public PersonBuilder withPlaceOfBirth(String placeOfBirth) {
        entity.setPlaceOfBirth(placeOfBirth);
        return this;
    }

    public PersonBuilder withNationality(String nationality) {
        entity.setNationality(nationality);
        return this;
    }

    public PersonBuilder withSex(Sex sex) {
        entity.setSex(sex);
        return this;
    }
}
