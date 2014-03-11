/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ankercbt.ankerservices.controller;

import com.ankercbt.ankerservices.controller.util.LoginException;
import com.ankercbt.ankerservices.viewmodel.security.LoginVm;
import com.ankercbt.ankerservices.viewmodel.security.UserVm;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.ResponseStatus;

/**
 *
 * @author Tim.Keiner
 */
@Controller
public class SecurityController {

    
    
    @ResponseBody
    @RequestMapping(value = "/login", method = RequestMethod.POST, headers = "Accept=application/json")
    public UserVm login(@RequestBody LoginVm login) {
        if(login.getUser().equals("tim@mail.de")) {
            UserVm u = new UserVm();
            u.setName("Tim");
            u.getRoles().add("Admin");
            u.getRoles().add("Student");
            u.setAuthenticated(true);
            return u;
        }
        throw new LoginException();
    }
    
    @RequestMapping("/logout")
    @ResponseStatus(HttpStatus.NO_CONTENT)
    public void logout() {
        
    }
    
}
