package com.ankercbt.ankerservices.model;

import java.util.Date;

class Kompetenzen {
	private String bezeichnung;
	private String beschreibung;
	private int aktiv;
	private Date letzte_aenderung;
	private KompetenzKategorien kompetenz_kategorie;

    public String getBezeichnung() {
        return bezeichnung;
    }

    public void setBezeichnung(String bezeichnung) {
        this.bezeichnung = bezeichnung;
    }

    public String getBeschreibung() {
        return beschreibung;
    }

    public void setBeschreibung(String beschreibung) {
        this.beschreibung = beschreibung;
    }

    public int getAktiv() {
        return aktiv;
    }

    public void setAktiv(int aktiv) {
        this.aktiv = aktiv;
    }

    public Date getLetzte_aenderung() {
        return letzte_aenderung;
    }

    public void setLetzte_aenderung(Date letzte_aenderung) {
        this.letzte_aenderung = letzte_aenderung;
    }

    public KompetenzKategorien getKompetenz_kategorie() {
        return kompetenz_kategorie;
    }

    public void setKompetenz_kategorie(KompetenzKategorien kompetenz_kategorie) {
        this.kompetenz_kategorie = kompetenz_kategorie;
    }
        
        
}