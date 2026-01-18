public abstract class EtrangerFrancaisCOR implements DicoEtrangerFrancais
{
    EtrangerFrancaisCOR suivant;
    //met on oeuvre le contart de DicoEntrangerFrancais
    //

    public EtrangerFrancaisCOR(EtrangerFrancaisCOR suivant) {
        this.suivant = suivant;
    }

    @Override
    public String traduit(String text) {
        String r = this.traduit1(text);
        if(r!=null)
            return r;
        else
            return text;
    }
    // traduir une texte return le etxte en francais ou null on cas de echec
    //parcours la chaine de la responsabilite
    private String traduit1(String texte) {
        String r = this.traduit2(texte);
        if( r != null)
            return r;
        else
            if(this.suivant != null)
                return this.suivant.traduit1(texte);
            else
                return null;
    }

    public abstract String traduit2(String text) ;


}
