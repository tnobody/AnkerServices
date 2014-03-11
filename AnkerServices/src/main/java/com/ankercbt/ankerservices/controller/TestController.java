/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package com.ankercbt.ankerservices.controller;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

/**
 *
 * @author tim
 */
@RestController
public class TestController {
    
    @RequestMapping("/admin")
    @ResponseBody
    public String admin() {
        return "Hello Admin";
    }
    
    @RequestMapping("/student")
    @ResponseBody
    public String student() {
        return "Hello student";
    }
    
    @RequestMapping("/company")
    @ResponseBody
    public String company() {
        return "Hello company";
    }
}
