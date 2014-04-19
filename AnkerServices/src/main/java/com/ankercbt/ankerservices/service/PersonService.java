package com.ankercbt.ankerservices.service;

import com.ankercbt.ankerservices.model.Person;

import java.util.List;

/**
 * @author tschneck
 *         Date: 02.02.14
 */
public interface PersonService {

    List<Person> getPersonForFirstName(String firstname);

    void createPerson(String firstname, String lastname);

    List<Person> getAllPersons();
}
