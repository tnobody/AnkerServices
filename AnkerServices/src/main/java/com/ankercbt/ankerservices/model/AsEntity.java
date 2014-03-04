package com.ankercbt.ankerservices.model;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

import java.math.BigInteger;

/**
 * abstract base class for all entities of AnkerServices.
 *
 * @author tschneck
 *         Date: 21.02.14
 */
@SuppressWarnings("UnusedDeclaration")
@Document
public abstract class AsEntity implements Comparable<AsEntity> {

    @Id
    private BigInteger id;

    @Override
    public int compareTo(AsEntity o) {
        return this.id.compareTo(o.id);
    }

    @Override
    public boolean equals(Object o) {
        if (o instanceof AsEntity) {
            return compareTo((AsEntity) o) == 0;
        }
        return super.equals(o);
    }
}
