package DP_visiteur;

//represente un verbe de la langue francaise
public abstract class verbe {

    String radical;

    public verbe(String infinitif) {
        int l=infinitif.trim().length();
        this.radical = infinitif.trim().substring(0,l-2);
    }



    //tache cnjugue this to 1er personne singulier
    // exemple: @param marcher , @return je marche

     //@return e pour 1er group , is pour le 2eme group
     public abstract String terminison1eps();

     public String conjugueP1s(){
        return "je " + this.radical+ terminison1eps();
    }

    public String conjugueP1sPluriel(){
        return "Nous " + this.radical+ terminison1epsp();
    }
    public abstract String terminison1epsp();
    public abstract String terminisonInfi();

    public abstract String accepte(VisiteurVerb vb);
}
