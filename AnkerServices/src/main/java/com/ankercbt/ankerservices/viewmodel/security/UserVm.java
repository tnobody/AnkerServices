/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ankercbt.ankerservices.viewmodel.security;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author Tim.Keiner
 */
public class UserVm {

    private String name = "anonymous";
    private List<String> roles = new ArrayList<String>();
    private boolean authenticated = false;

    public boolean isAuthenticated() {
        return authenticated;
    }

    public void setAuthenticated(boolean authenticated) {
        this.authenticated = authenticated;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public List<String> getRoles() {
        return roles;
    }

    public void setRoles(List<String> roles) {
        this.roles = roles;
    }
    
    
}
