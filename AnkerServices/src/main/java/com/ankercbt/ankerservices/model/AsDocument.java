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
public abstract class AsDocument implements AsEntity, Comparable<AsDocument> {

    @Id
    private BigInteger id;

    public BigInteger getId() {
        return id;
    }

    @Override
    public int compareTo(AsDocument o) {
        if (o == null) {
            return (id == null) ? 0 : 1;
        }
        if (id == null) {
            return (o.id == null) ? 0 : 1;

        }
        return this.id.compareTo(o.id);
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) {
            return true;
        }
        if (this.id == null || o == null) {
            return false;
        }

        if (o instanceof AsDocument) {
            return this.id.equals(((AsDocument) o).id);
        }
        return super.equals(o);
    }

    @Override
    public int hashCode() {
        return id == null ? 0 : id.hashCode();
    }
}
