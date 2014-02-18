package com.ankercbt.ankerservices.model;

import java.util.Date;

class Adressen {
	private int id;
	private String alias;
	private String strasse_und_hausnr;
	private int plz;
	private String ort;
	private String land;
	private Date letzte_aenderung;
	private Profile profil;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getAlias() {
        return alias;
    }

    public void setAlias(String alias) {
        this.alias = alias;
    }

    public String getStrasse_und_hausnr() {
        return strasse_und_hausnr;
    }

    public void setStrasse_und_hausnr(String strasse_und_hausnr) {
        this.strasse_und_hausnr = strasse_und_hausnr;
    }

    public int getPlz() {
        return plz;
    }

    public void setPlz(int plz) {
        this.plz = plz;
    }

    public String getOrt() {
        return ort;
    }

    public void setOrt(String ort) {
        this.ort = ort;
    }

    public String getLand() {
        return land;
    }

    public void setLand(String land) {
        this.land = land;
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