package DP_visiteur;

/*
* Exemples: marcher = marché
*           frémir = frémi
* */

public class participe_passer implements  VisiteurVerb{

    @Override
    public String visite(verbe_2eme vb_2eme) {
        return vb_2eme.radical + "i";
    }

    @Override
    public String visite(verbe_1er vb_1er) {
        return vb_1er.radical +"é";
    }
}
