package com.ankercbt.ankerservices.model;

import java.util.Date;

class ProfilMerkliste {
	private String query;
	private Date angelegt;
	private Date letzte_aenderung;
	private Profile profil;

    public String getQuery() {
        return query;
    }

    public void setQuery(String query) {
        this.query = query;
    }

    public Date getAngelegt() {
        return angelegt;
    }

    public void setAngelegt(Date angelegt) {
        this.angelegt = angelegt;
    }

    public Date getLetzte_aenderung() {
        return letzte_aenderung;
    }

    public void setLetzte_aenderung(Date letzte_aenderung) {
        this.letzte_aenderung = letzte_aenderung;
    }

    public Profile getProfil() {
        return profil;
    }

    public void setProfil(Profile profil) {
        this.profil = profil;
    }
        
        
}