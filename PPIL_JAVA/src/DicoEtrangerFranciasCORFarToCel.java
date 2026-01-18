public class DicoEtrangerFranciasCORFarToCel extends EtrangerFrancaisCOR {

    public DicoEtrangerFranciasCORFarToCel(EtrangerFrancaisCOR suivant) {
        super(suivant);
    }
    static final double a=-32;
    static final double b=(5.0/9.0);


    @Override
    public String traduit2(String text){
        String d=text.trim();
        if(!d.endsWith("ºF")) return null;
        String t[] = d.split("º");
        try {
            double x = Double.parseDouble(t[0]);
            double y = (x+a)*b;
            return Double.toString(y) + "ºC";
        } catch(NumberFormatException e) {
            System.out.println(e);
            return "error";
        }
    }
}
