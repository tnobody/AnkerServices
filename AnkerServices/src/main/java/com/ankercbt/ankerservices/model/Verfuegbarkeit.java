package com.ankercbt.ankerservices.model;

import java.util.Date;

class Verfuegbarkeit {
	private Date datum;
	private int stundenzahl;
	private String zeitraum;
	private String anmerkung;
	private Profile profil;

    public Date getDatum() {
        return datum;
    }

    public void setDatum(Date datum) {
        this.datum = datum;
    }

    public int getStundenzahl() {
        return stundenzahl;
    }

    public void setStundenzahl(int stundenzahl) {
        this.stundenzahl = stundenzahl;
    }

    public String getZeitraum() {
        return zeitraum;
    }

    public void setZeitraum(String zeitraum) {
        this.zeitraum = zeitraum;
    }

    public String getAnmerkung() {
        return anmerkung;
    }

    public void setAnmerkung(String anmerkung) {
        this.anmerkung = anmerkung;
    }

    public Profile getProfil() {
        return profil;
    }

    public void setProfil(Profile profil) {
        this.profil = profil;
    }
        
        
}