package com.ankercbt.ankerservices.persistence;

import com.ankercbt.ankerservices.model.Person;
import org.springframework.data.mongodb.repository.MongoRepository;

import java.math.BigInteger;
import java.util.List;

/**
 * @author tschneck
 *         Date: 21.02.14
 */
public interface PersonRepository extends MongoRepository<Person, BigInteger> {

    public List<Person> findAllByFirstName(String firstName);
}
