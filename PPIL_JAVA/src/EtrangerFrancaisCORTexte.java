public class EtrangerFrancaisCORTexte extends EtrangerFrancaisCOR {

    String[][] t;

    public EtrangerFrancaisCORTexte(String[][] t, EtrangerFrancaisCOR suivant) {
        super(suivant);
        this.t = t;
    }

    @Override
    public String traduit2(String texte) {
        String data = texte.trim();

        for (int i = 0; i < t.length; i++) {
            if (data.equalsIgnoreCase(t[i][0])) {
                return t[i][1];
            }
        }
        return null; // seulement après avoir tout parcouru
    }

}
