/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package com.ankercbt.ankerservices.service.impl;

import com.ankercbt.ankerservices.service.AuthenticationService;
import org.springframework.stereotype.Component;

/**
 *
 * @author tim
 */

@Component
public class AuthenticationServiceImpl implements AuthenticationService {

    @Override
    public boolean login(String identifier, String password) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public boolean logout() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public boolean isLoggedIn() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}
