package com.ankercbt.ankerservices.integration.persistence;

import com.ankercbt.ankerservices.integration.IntegrationBaseTest;
import com.ankercbt.ankerservices.model.AsDocument;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.repository.Repository;

import java.math.BigInteger;

/**
 * @author tschneck
 *         Date: 02.03.14
 */
public abstract class BaseRepositoryTest<R extends Repository<? extends AsDocument, BigInteger>> extends IntegrationBaseTest {

    @SuppressWarnings("SpringJavaAutowiringInspection")
    @Autowired
    protected R testling;
}
