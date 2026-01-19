package DP_visiteur;

public class PasseSimple implements VisiteurVerb{

    public String coupe(verbe vb  , String terminison) {
        String s = vb.radical;
       return "Nous " + s + terminison;
    }

    //non java doc
    @Override
    public String visite(verbe_2eme vb_2eme) {
        return coupe(vb_2eme,"imes") ;
    }

    @Override
    public String visite(verbe_1er vb_1er) {
       return coupe(vb_1er,"ames");
    }
}
