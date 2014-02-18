package com.ankercbt.ankerservices.model;

import java.util.List;

class OrteKompetenzerwerb {
	private String bezeichnung;
	private List<Niveaus> niveaus;

    public String getBezeichnung() {
        return bezeichnung;
    }

    public void setBezeichnung(String bezeichnung) {
        this.bezeichnung = bezeichnung;
    }

    public List<Niveaus> getNiveaus() {
        return niveaus;
    }

    public void setNiveaus(List<Niveaus> niveaus) {
        this.niveaus = niveaus;
    }
        
        
}