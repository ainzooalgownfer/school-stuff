package DP_visiteur;

public class verbe_1er extends verbe{


    public verbe_1er(String infinitif) {
        super(infinitif);
    }


    @Override
    public String terminison1eps() {
        return "e";
    }

    @Override
    public String terminison1epsp() {
        return "ons";
    }

    @Override
    public String terminisonInfi() {
        return "er";
    }

    @Override
    public String accepte(VisiteurVerb vb) {
        return vb.visite(this);
    }
}
