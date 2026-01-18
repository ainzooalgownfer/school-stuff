package DP_visiteur;

public class verbe_2eme extends verbe {

    public verbe_2eme(String infinitif) {
        super(infinitif);
    }

    @Override
    public String terminison1eps() {
        return "is";
    }

    @Override
    public String terminison1epsp() {
        return "issons";
    }

    @Override
    public String terminisonInfi() {
        return "ir";
    }

    @Override
    public String accepte(VisiteurVerb vb) {
        return vb.visite(this);
    }
}
