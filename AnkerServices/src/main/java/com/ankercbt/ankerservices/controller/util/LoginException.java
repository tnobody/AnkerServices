/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.ankercbt.ankerservices.controller.util;

import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.ResponseStatus;

/**
 *
 * @author Tim.Keiner
 */
@ResponseStatus(HttpStatus.NOT_FOUND)
public class LoginException extends RuntimeException{
    
}
