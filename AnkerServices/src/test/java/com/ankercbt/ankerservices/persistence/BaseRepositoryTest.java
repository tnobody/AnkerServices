package com.ankercbt.ankerservices.persistence;

import com.ankercbt.ankerservices.IntegrationBaseTest;
import com.ankercbt.ankerservices.model.AsDocument;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.mongodb.repository.MongoRepository;

import java.math.BigInteger;

/**
 * @author tschneck
 *         Date: 02.03.14
 */
public abstract class BaseRepositoryTest<R extends MongoRepository<? extends AsDocument, BigInteger>> extends IntegrationBaseTest {

    @SuppressWarnings("SpringJavaAutowiringInspection")
    @Autowired
    protected R testling;
}
