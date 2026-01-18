import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;

public class testDicoEtrangerFrancais {

    public static void main(String[] args) {

        // >>> Initialisation du début de la chaîne COR à null (normal en COR)
        EtrangerFrancaisCOR dico = null;

        // ------------------ Dictionnaire anglais → français ------------------
        String tableEng[][] = {
                {"Nice to meet you", "c'est un plaisir de faire votre connaissance"},
                {"Mind your own business", "Occupe-toi de tes affaires"},
                {"turnip", "navet"},
                {"You are so cute", "vous êtes très mignonne"}
        };

        // >>> Ajout du maillon texte anglais dans la chaîne
        dico = new EtrangerFrancaisCORTexte(tableEng, dico);

        // ------------------ Dictionnaire espagnol → français ------------------
        String tableEspa[][] = {
                {"Una cerveza bien fria", "une bière bien fraîche"},
                {"El coche de mis sueños", "la voiture de mes rêves"},
                {"Ratoncito", "souris"}
        };

        // >>> Ajout du maillon texte espagnol dans la chaîne
        dico = new EtrangerFrancaisCORTexte(tableEspa, dico);

        // ------------------ Conversion devise ------------------
        char symbole = '$';
        double taux = 0.89; // >>> corrigé le commentaire : 1$ = 0.89€

        // >>> Ajout du maillon devise → euro
        dico = new DicoEtrangerFranciasCORDeviseToEuro(dico, taux, symbole);

        // ------------------ Conversion température ------------------
        // >>> Ajout du maillon Fahrenheit → Celsius
        dico = new DicoEtrangerFranciasCORFarToCel(dico);

        // ------------------ Lecture clavier ------------------
        BufferedReader clavier = new BufferedReader(new InputStreamReader(System.in));
        while(true) {

            System.out.println("Tapez le texte à traduire : ");

            String text;

            try {
                text = clavier.readLine();
            } catch (IOException e) {
                // >>> Gestion propre de l’erreur (évite RuntimeException inutile)
                System.out.println("Erreur lors de la lecture du texte.");
                return;
            }

            // ------------------ Traduction ------------------
            String response = dico.traduit(text);

            // >>> Gestion du cas où aucun maillon ne reconnaît l’entrée
            if (response == null) {
                System.out.println("Traduction inconnue.");
            } else {
                System.out.println("Traduction : " + response);
            }
        }
    }

}
