package com.ankercbt.ankerservices.model;

import java.util.Date;
import java.util.List;

class Lebenslauf {
	private String bezeichnung;
	private String beschreibung;
	private Date letzte_aenderung;
	private Date beginn;
	private Date ende;
	private int aktiv;
	private Profile profil;
	private LebenslaufKategorien art;
	private List<Niveaus> niveau;

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

    public Date getLetzte_aenderung() {
        return letzte_aenderung;
    }

    public void setLetzte_aenderung(Date letzte_aenderung) {
        this.letzte_aenderung = letzte_aenderung;
    }

    public Date getBeginn() {
        return beginn;
    }

    public void setBeginn(Date beginn) {
        this.beginn = beginn;
    }

    public Date getEnde() {
        return ende;
    }

    public void setEnde(Date ende) {
        this.ende = ende;
    }

    public int getAktiv() {
        return aktiv;
    }

    public void setAktiv(int aktiv) {
        this.aktiv = aktiv;
    }

    public Profile getProfil() {
        return profil;
    }

    public void setProfil(Profile profil) {
        this.profil = profil;
    }

    public LebenslaufKategorien getArt() {
        return art;
    }

    public void setArt(LebenslaufKategorien art) {
        this.art = art;
    }

    public List<Niveaus> getNiveau() {
        return niveau;
    }

    public void setNiveau(List<Niveaus> niveau) {
        this.niveau = niveau;
    }
        
        
}