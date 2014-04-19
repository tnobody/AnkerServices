package com.ankercbt.ankerservices.persistence;

import com.ankercbt.ankerservices.model.EmailAddress;
import com.ankercbt.ankerservices.model.Person;
import org.springframework.data.repository.PagingAndSortingRepository;

import java.math.BigInteger;
import java.util.List;

/**
 * @author tschneck
 *         Date: 21.02.14
 */
public interface PersonRepository extends PagingAndSortingRepository<Person, BigInteger> {

    /**
     * find all Person filtered by the first name.
     *
     * @param firstName first name of a person
     * @return list of {@link Person}
     */
    List<Person> findAllByFirstName(String firstName);

    /**
     * /**
     * Returns the {@link Person} with the given {@link EmailAddress}.
     *
     * @param emailAddress as string (will be converter into {@link EmailAddress})
     * @return list of {@link Person}
     */
    Person findByEmailAddress(EmailAddress emailAddress);

    /**
     * @return all Persons in the repository
     */
    List<Person> findAll();

}
