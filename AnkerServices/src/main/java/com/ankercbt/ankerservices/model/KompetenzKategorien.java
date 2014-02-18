package com.ankercbt.ankerservices.model;

import java.util.List;

class KompetenzKategorien {
	private String bezeichnung;
	private String beschreibung;
	private int aktiv;
	private List<Kompetenzen> kompetenz_kategorie;

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

    public List<Kompetenzen> getKompetenz_kategorie() {
        return kompetenz_kategorie;
    }

    public void setKompetenz_kategorie(List<Kompetenzen> kompetenz_kategorie) {
        this.kompetenz_kategorie = kompetenz_kategorie;
    }
        
        
}