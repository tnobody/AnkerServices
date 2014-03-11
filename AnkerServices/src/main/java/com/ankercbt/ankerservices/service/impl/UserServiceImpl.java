package com.ankercbt.ankerservices.service.impl;

import com.ankercbt.ankerservices.service.UserService;
import com.ankercbt.ankerservices.viewmodel.User;
import org.springframework.stereotype.Service;

/**
 * @author tschneck
 *         Date: 02.02.14
 */
@Service
public class UserServiceImpl implements UserService {

    @Override
    public User getCurrentUser() {
        User user = new User();
        user.setFirstname("Max");
        user.setLastname("Moritz");
        return user;
    }
}
