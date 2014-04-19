package com.ankercbt.ankerservices.service.impl;

import com.ankercbt.ankerservices.model.Person;
import com.ankercbt.ankerservices.model.builder.PersonBuilder;
import com.ankercbt.ankerservices.persistence.PersonRepository;
import com.ankercbt.ankerservices.service.PersonService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.List;

/**
 * @author tschneck
 *         Date: 21.02.14
 */
@Component
public class PersonServiceImpl implements PersonService {

    @Autowired
    private PersonRepository personRepository;

    /**
     * {@inheritDoc} *
     */
    @Override
    public List<Person> getPersonForFirstName(String firstname) {
        return personRepository.findAllByFirstName(firstname);
    }

    /**
     * {@inheritDoc} *
     */
    @Override
    public void createPerson(String firstname, String lastname) {
        personRepository.save(new PersonBuilder()
                .withFirstName(firstname)
                .withLastName(lastname)
                .build());
    }

    /**
     * {@inheritDoc} *
     */
    @Override
    public List<Person> getAllPersons() {
        return personRepository.findAll();
    }
}
