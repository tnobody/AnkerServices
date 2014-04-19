package com.ankercbt.ankerservices;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.data.mongodb.core.MongoFactoryBean;

/**
 * @author tschneck
 *         Date: 06.04.14
 */
@Configuration
public class MongoDbConfig {

    /*
     * Factory bean that creates the com.mongodb.Mongo instance
     */
    public
    @Bean
    MongoFactoryBean mongo() {
        MongoFactoryBean mongo = new MongoFactoryBean();
        mongo.setHost("localhost");
        mongo.setPort(27017);
        return mongo;
    }
}
