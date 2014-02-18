package com.ankercbt.ankerservices.model;

import java.util.List;

class Zertifikate {
	private String bezeichnung;
	private String beschreibung;
	private String link;
	private Profile profil;
	private List<Niveaus> zertifikat;

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

    public String getLink() {
        return link;
    }

    public void setLink(String link) {
        this.link = link;
    }

    public Profile getProfil() {
        return profil;
    }

    public void setProfil(Profile profil) {
        this.profil = profil;
    }

    public List<Niveaus> getZertifikat() {
        return zertifikat;
    }

    public void setZertifikat(List<Niveaus> zertifikat) {
        this.zertifikat = zertifikat;
    }
        
}