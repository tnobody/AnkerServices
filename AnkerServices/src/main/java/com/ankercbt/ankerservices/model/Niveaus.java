package com.ankercbt.ankerservices.model;

import java.util.List;

class Niveaus {

    private String art_kompetenzerwerb;
    private Profile profil;
    private Kompetenzen kompetenz;
    private Zertifikate zertifikat;
    private OrteKompetenzerwerb erwerb;
    private List<Lebenslauf> ll;
    private int niveau;

    public String getArt_kompetenzerwerb() {
        return art_kompetenzerwerb;
    }

    public void setArt_kompetenzerwerb(String art_kompetenzerwerb) {
        this.art_kompetenzerwerb = art_kompetenzerwerb;
    }

    public int getNiveau() {
        return niveau;
    }

    public void setNiveau(int niveau) {
        this.niveau = niveau;
    }

    public Profile getProfil() {
        return profil;
    }

    public void setProfil(Profile profil) {
        this.profil = profil;
    }

    public Kompetenzen getKompetenz() {
        return kompetenz;
    }

    public void setKompetenz(Kompetenzen kompetenz) {
        this.kompetenz = kompetenz;
    }

    public Zertifikate getZertifikat() {
        return zertifikat;
    }

    public void setZertifikat(Zertifikate zertifikat) {
        this.zertifikat = zertifikat;
    }

    public OrteKompetenzerwerb getErwerb() {
        return erwerb;
    }

    public void setErwerb(OrteKompetenzerwerb erwerb) {
        this.erwerb = erwerb;
    }

    public List<Lebenslauf> getLl() {
        return ll;
    }

    public void setLl(List<Lebenslauf> ll) {
        this.ll = ll;
    }
}