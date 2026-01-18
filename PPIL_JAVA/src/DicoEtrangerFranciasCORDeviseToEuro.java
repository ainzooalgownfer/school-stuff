public class DicoEtrangerFranciasCORDeviseToEuro extends EtrangerFrancaisCOR {
    char symbole;
    double taux;

    public DicoEtrangerFranciasCORDeviseToEuro(EtrangerFrancaisCOR suivant,double taux, char symbole) {
        super(suivant);
        this.symbole = symbole;
        this.taux=taux;
    }
    //exemples tache convertit un montanr donne dans la devise etrangere vers l'euro
    @Override
    public String traduit2(String texte) {

        // >>> REFUS clair si le symbole n'est pas présent
        if (texte == null || texte.length() < 2 || texte.charAt(0) != symbole) {
            return null; // passe au maillon suivant
        }

        String s = texte.substring(1);

        try {
            double x = Double.parseDouble(s);
            double y = x * taux;
            return String.format("€%.2f", y);
        } catch (NumberFormatException e) {
            return null; // IMPORTANT : pas une erreur fatale
        }
    }
}
