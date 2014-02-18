package com.ankercbt.ankerservices.model;

import java.util.Date;

class Dokumente {
	private int id;
	private String titel;
	private Date angelegt;
	private Date letzte_aenderung;
	private String pfad;
	private Profile profil;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitel() {
        return titel;
    }

    public void setTitel(String titel) {
        this.titel = titel;
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

    public String getPfad() {
        return pfad;
    }

    public void setPfad(String pfad) {
        this.pfad = pfad;
    }

    public Profile getProfil() {
        return profil;
    }

    public void setProfil(Profile profil) {
        this.profil = profil;
    }
        
}