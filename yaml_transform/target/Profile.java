package com.ankercbt.ankerservices.model;

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
	private List<Adressen> profil;
	private List<Dokumente> profil;
	private List<Niveaus> profil;
	private List<Lebenslauf> profil;
	private List<ProfilMerkliste> profil;
	private List<Verfuegbarkeit> profil;
	private sfGuardUser id;
}