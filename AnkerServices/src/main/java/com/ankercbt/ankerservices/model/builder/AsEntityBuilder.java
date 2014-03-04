package com.ankercbt.ankerservices.model.builder;

import com.ankercbt.ankerservices.model.AsEntity;

/**
 * @author tschneck
 *         Date: 26.02.14
 */
public interface AsEntityBuilder<E extends AsEntity> {

    /**
     * @return a new build Entity from {@link E}.
     */
    E build();
}
