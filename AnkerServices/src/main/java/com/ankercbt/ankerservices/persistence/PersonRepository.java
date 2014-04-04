package com.ankercbt.ankerservices.persistence;

import com.ankercbt.ankerservices.model.EmailAddress;
import com.ankercbt.ankerservices.model.Person;
import org.springframework.data.mongodb.repository.MongoRepository;

import java.math.BigInteger;
import java.util.List;

/**
 * @author tschneck
 *         Date: 21.02.14
 */
public interface PersonRepository extends MongoRepository<Person, BigInteger> {

    List<Person> findAllByFirstName(String firstName);

    /**
     * /**
     * Returns the {@link Person} with the given {@link EmailAddress}.
     *
     * @param emailAddress as string (will be converter into {@link EmailAddress})
     * @return
     */
    Person findByEmailAddress(EmailAddress emailAddress);


}
