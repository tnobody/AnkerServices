/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ankercbt.ankerservices.controller;

import com.ankercbt.ankerservices.service.UserService;
import com.ankercbt.ankerservices.viewmodel.User;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

/**
 *
 * @author Tim.Keiner
 */
@Controller
public class IndexController {

    @Autowired
    UserService userService;

    @ResponseBody()
    @RequestMapping("/you")
    public String hello() {
        return "Hello Spring";
    }
    
    @ResponseBody()
    @RequestMapping("/me")
    public User getMe() {
        return userService.getCurrentUser();
    }
    
}
