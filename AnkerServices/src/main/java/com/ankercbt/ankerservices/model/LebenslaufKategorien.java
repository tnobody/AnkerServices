package com.ankercbt.ankerservices.model;

import java.util.List;

class LebenslaufKategorien {
	private String bezeichnung;
	private List<Lebenslauf> lebenslaeufe;

    public String getBezeichnung() {
        return bezeichnung;
    }

    public void setBezeichnung(String bezeichnung) {
        this.bezeichnung = bezeichnung;
    }

    public List<Lebenslauf> getLebenslaeufe() {
        return lebenslaeufe;
    }

    public void setLebenslaeufe(List<Lebenslauf> lebenslaeufe) {
        this.lebenslaeufe = lebenslaeufe;
    }
    
}