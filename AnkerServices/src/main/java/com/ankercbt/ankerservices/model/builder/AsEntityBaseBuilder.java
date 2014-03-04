package com.ankercbt.ankerservices.model.builder;

import com.ankercbt.ankerservices.model.AsEntity;

/**
 * @author tschneck
 *         Date: 26.02.14
 */
@SuppressWarnings("UnusedDeclaration")
public abstract class AsEntityBaseBuilder<E extends AsEntity> implements AsEntityBuilder<E> {

    protected E entity;

    protected AsEntityBaseBuilder() {
        this.entity = createEntity();
    }

    protected abstract E createEntity();

    @Override
    public E build() {
        return entity;
    }
}
