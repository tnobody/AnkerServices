package com.ankercbt.ankerservices.service.impl;

import com.ankercbt.ankerservices.model.Person;
import com.ankercbt.ankerservices.model.builder.PersonTestBuilder;
import com.ankercbt.ankerservices.persistence.PersonRepository;
import org.mockito.InjectMocks;
import org.mockito.Mock;
import org.mockito.MockitoAnnotations;
import org.testng.annotations.BeforeMethod;
import org.testng.annotations.Test;

import java.util.Arrays;
import java.util.List;

import static org.mockito.Matchers.any;
import static org.mockito.Mockito.when;
import static org.testng.Assert.assertEquals;

/**
 * @author tschneck
 *         Date: 19.04.14
 */
public class PersonServiceImplTest {

    @Mock
    private PersonRepository personRepositoryMock;
    @InjectMocks
    private PersonServiceImpl testling;

    @BeforeMethod
    public void setUp() throws Exception {
        MockitoAnnotations.initMocks(this);
    }

    @Test
    public void testCreatePerson() throws Exception {
        final String firstName = "Tobi";
        final String lastName = "Schneck";
        when(personRepositoryMock.save(any(Person.class))).then(answer -> {
            Person person = (Person) answer.getArguments()[0];
            assertEquals(person.getFirstName(), firstName);
            assertEquals(person.getLastName(), lastName);
            return person;
        });
        testling.createPerson(firstName, lastName);

    }

    @Test
    public void testGetPersonForFirstName() throws Exception {
        String firstName = "Tobi";
        List<Person> expectedList = Arrays.asList(new PersonTestBuilder().withFirstName(firstName).build());
        when(personRepositoryMock.findAllByFirstName(firstName)).thenReturn(expectedList);
        assertEquals(testling.getPersonForFirstName(firstName), expectedList);
    }

    @Test
    public void testGetAllPersons() throws Exception {
        List<Person> expectedList = Arrays.asList(new PersonTestBuilder().build());
        when(personRepositoryMock.findAll()).thenReturn(expectedList);
        assertEquals(testling.getAllPersons(), expectedList);
    }
}
