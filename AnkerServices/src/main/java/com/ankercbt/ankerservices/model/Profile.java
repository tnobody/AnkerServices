package com.ankercbt.ankerservices.model;

import java.util.Date;
import java.util.List;

class Profile {
	private String vornamen;
	private String nachname;
	private Date geburtsdatum;
	private String geschlecht;
	private Date angelegt;
	private Date letzte_aenderung;
	private int aktiv;
	private String geburtsort;
	private String geburtsland;
	private String nationalitaet;
	private int kontaktadresse;
	private List<Adressen> adressen;
	private List<Dokumente> dokumente;
	private List<Niveaus> niveaus;
	private List<Lebenslauf> lebenslaeufe;
	private List<ProfilMerkliste> profileMerklisten;
	private List<Verfuegbarkeit> verfuegbarkeiten;

    public String getVornamen() {
        return vornamen;
    }

    public void setVornamen(String vornamen) {
        this.vornamen = vornamen;
    }

    public String getNachname() {
        return nachname;
    }

    public void setNachname(String nachname) {
        this.nachname = nachname;
    }

    public Date getGeburtsdatum() {
        return geburtsdatum;
    }

    public void setGeburtsdatum(Date geburtsdatum) {
        this.geburtsdatum = geburtsdatum;
    }

    public String getGeschlecht() {
        return geschlecht;
    }

    public void setGeschlecht(String geschlecht) {
        this.geschlecht = geschlecht;
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

    public int getAktiv() {
        return aktiv;
    }

    public void setAktiv(int aktiv) {
        this.aktiv = aktiv;
    }

    public String getGeburtsort() {
        return geburtsort;
    }

    public void setGeburtsort(String geburtsort) {
        this.geburtsort = geburtsort;
    }

    public String getGeburtsland() {
        return geburtsland;
    }

    public void setGeburtsland(String geburtsland) {
        this.geburtsland = geburtsland;
    }

    public String getNationalitaet() {
        return nationalitaet;
    }

    public void setNationalitaet(String nationalitaet) {
        this.nationalitaet = nationalitaet;
    }

    public int getKontaktadresse() {
        return kontaktadresse;
    }

    public void setKontaktadresse(int kontaktadresse) {
        this.kontaktadresse = kontaktadresse;
    }

    public List<Adressen> getAdressen() {
        return adressen;
    }

    public void setAdressen(List<Adressen> adressen) {
        this.adressen = adressen;
    }

    public List<Dokumente> getDokumente() {
        return dokumente;
    }

    public void setDokumente(List<Dokumente> dokumente) {
        this.dokumente = dokumente;
    }

    public List<Niveaus> getNiveaus() {
        return niveaus;
    }

    public void setNiveaus(List<Niveaus> niveaus) {
        this.niveaus = niveaus;
    }

    public List<Lebenslauf> getLebenslaeufe() {
        return lebenslaeufe;
    }

    public void setLebenslaeufe(List<Lebenslauf> lebenslaeufe) {
        this.lebenslaeufe = lebenslaeufe;
    }

    public List<ProfilMerkliste> getProfileMerklisten() {
        return profileMerklisten;
    }

    public void setProfileMerklisten(List<ProfilMerkliste> profileMerklisten) {
        this.profileMerklisten = profileMerklisten;
    }

    public List<Verfuegbarkeit> getVerfuegbarkeiten() {
        return verfuegbarkeiten;
    }

    public void setVerfuegbarkeiten(List<Verfuegbarkeit> verfuegbarkeiten) {
        this.verfuegbarkeiten = verfuegbarkeiten;
    }
        
        
        
}