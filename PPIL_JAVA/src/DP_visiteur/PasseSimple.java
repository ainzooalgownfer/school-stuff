package DP_visiteur;

public class PasseSimple implements VisiteurVerb{

    public String coupe(verbe vb , int n , String terminison) {
        String s = vb.terminison1epsp();
        int l = s.length();
        return s.substring(0,l-n) + terminison;
    }

    //non java doc
    @Override
    public String visite(verbe_2eme vb_2eme) {
        return coupe(vb_2eme,6,"imes") ;
    }

    @Override
    public String visite(verbe_1er vb_1er) {
        String s = vb_1er.terminison1epsp();
        int l = s.length();
        return s.substring(0,l-3) + "ames";
    }
}
