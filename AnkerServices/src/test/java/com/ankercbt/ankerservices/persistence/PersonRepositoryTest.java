package com.ankercbt.ankerservices.persistence;

import com.ankercbt.ankerservices.model.Address;
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

        for (Person person : result) {
            Assert.assertNotNull(person.getId());
            for (Address address : person.getAddresses()) {
                assertAddress(address);
            }
        }
    }

    private void assertAddress(Address address) {
        Assert.assertEquals("Hauptwohnsitz", address.getAlias());
        Assert.assertEquals("Ingolstädter Straße 1", address.getStreet());
        Assert.assertEquals("81673", address.getZip());
        Assert.assertEquals("München", address.getCity());
        Assert.assertEquals("Deutschland", address.getCountry());

    }
}
