package com.ankercbt.ankerservices.integration;

import com.ankercbt.ankerservices.App;
import org.springframework.test.context.ContextConfiguration;
import org.springframework.test.context.testng.AbstractTestNGSpringContextTests;
import org.testng.annotations.Test;

/**
 * @author tschneck
 *         Date: 02.03.14
 */
@Test(groups = IntegrationTest.GROUP)
@ContextConfiguration(classes = App.class)
public abstract class IntegrationBaseTest extends AbstractTestNGSpringContextTests {
}
