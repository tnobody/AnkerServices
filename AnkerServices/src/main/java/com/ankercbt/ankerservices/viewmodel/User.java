/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ankercbt.ankerservices.viewmodel;

/**
 *
 * @author Tim.Keiner
 */
public class User {

    private String firstname;
    private String lastname;

    public String getFirstname() {
        return firstname;
    }

    public void setFirstname(String firstname) {
        this.firstname = firstname;
    }

    public String getLastname() {
        return lastname;
    }

    public void setLastname(String lastname) {
        this.lastname = lastname;
    }
    
    public String getFullName() {
        return firstname + " " + lastname;
    }
}
