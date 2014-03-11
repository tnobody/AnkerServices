/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package com.ankercbt.ankerservices.service;

/**
 *
 * @author tim
 */
public interface AuthenticationService {
    
    public boolean login(String identifier, String password);
    public boolean logout();
    public boolean isLoggedIn();
    
}
