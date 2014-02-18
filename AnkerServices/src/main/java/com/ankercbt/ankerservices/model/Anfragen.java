package com.ankercbt.ankerservices.model;

import java.util.Date;

class Anfragen {
	private String kommentar;
	private Date angelegt;
	private Date letzte_aenderung;
	//private sfGuardUser id;
	private Profile profil;

    public String getKommentar() {
        return kommentar;
    }

    public void setKommentar(String kommentar) {
        this.kommentar = kommentar;
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