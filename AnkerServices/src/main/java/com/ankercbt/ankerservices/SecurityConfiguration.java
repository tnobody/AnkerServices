/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package com.ankercbt.ankerservices;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.builders.WebSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;

/**
 *
 * @author tim
 * This Configuration assumes that the we have three Areas in the App (Admin, 
 * Student, Company). An Admin can access all parts of Application. Students 
 * and Companies only their dedicated areas.
 * 
 * 
 */
@Configuration
@EnableWebSecurity
public class SecurityConfiguration extends WebSecurityConfigurerAdapter {

    /**
     * Configure the Access Levels for our URLs
     * @param http
     * @throws Exception 
     */
    @Override
    protected void configure(HttpSecurity http) throws Exception {
        http
            .authorizeRequests()
                .antMatchers("/login", "/logout", "/user").permitAll()
             /*   .antMatchers("/company/**").hasAnyRole("COMPANY","ADMIN")
                .antMatchers("/student/**").hasAnyRole("STUDENT","ADMIN")*/
                .antMatchers("/admin/**").hasRole("ADMIN")
                .anyRequest().authenticated()
                .and()
                .httpBasic()
                ;
    }

    /**
     * Configuring Static Files tobe served by our App
     * @param web
     * @throws Exception 
     */
    @Override
    public void configure(WebSecurity web) throws Exception {
        web
       /*     .ignoring().antMatchers("/css/**")  .and()
            .ignoring().antMatchers("/js/**")   .and()
            .ignoring().antMatchers("/html/**") .and() */
            .ignoring().antMatchers("/images/**");
                
    }

    
    /**
     * Configure InMem Users (for Testing)
     * @param auth
     * @throws Exception 
     */
    @Autowired
    protected void configureGlobal(AuthenticationManagerBuilder auth) throws Exception {
        auth
            .inMemoryAuthentication()
                .withUser("admin").password("password").roles("ADMIN").and()
                .withUser("student").password("student").roles("STUDENT").and()
                .withUser("company").password("company").roles("COMPANY");
    }
    
}
