package com.ankercbt.ankerservices.model;

import org.junit.Assert;
import org.junit.Test;

/**
 * @author tschneck
 *         Date: 22.03.14
 */
public class EmailAddressTest {
    @Test
    public void testIsValid() throws Exception {
        Assert.assertTrue(EmailAddress.isValid("bla.bla@example.de"));
        Assert.assertTrue(EmailAddress.isValid("bla.bla@example-dash.de"));
        Assert.assertTrue(EmailAddress.isValid("bla-bla@example.de"));
        Assert.assertTrue(EmailAddress.isValid("bla-bla@example-dash.de"));
        Assert.assertTrue(EmailAddress.isValid("blabla@example.com"));
        Assert.assertFalse(EmailAddress.isValid("bla?bla@example.de"));
        Assert.assertFalse(EmailAddress.isValid("blabla@example?dash.de"));
    }

    @Test
    public void testCreateEMail() throws Exception {
        String emailString = "blabla@exampl.de";
        EmailAddress email = new EmailAddress(emailString);
        Assert.assertEquals(email.toString(), emailString);

    }
}
