package com.ankercbt.ankerservices.model;

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
}