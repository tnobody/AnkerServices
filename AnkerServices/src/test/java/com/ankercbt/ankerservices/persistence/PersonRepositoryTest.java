package com.ankercbt.ankerservices.persistence;

import com.ankercbt.ankerservices.model.Person;
import com.ankercbt.ankerservices.model.builder.PersonTestBuilder;
import org.junit.Assert;
import org.junit.Test;

import java.util.List;

/**
 * @author tschneck
 *         Date: 26.02.14
 */
public class PersonRepositoryTest extends BaseRepositoryTest<PersonRepository> {

//    @Before
//    public void setUp() throws Exception {
//        testling.deleteAll();
//
//    }

    @Test
    public void testFindByFirstName() throws Exception {
        Person p1 = testling.save(new PersonTestBuilder().withFirstName("Max").withLastName("Mustermann").build());
        Person p2 = testling.save(new PersonTestBuilder().withFirstName("Max").withLastName("Meier").build());


        List<Person> result = testling.findAllByFirstName("Max");
        Assert.assertTrue(result.contains(p1));
        Assert.assertTrue(result.contains(p2));
    }
}
