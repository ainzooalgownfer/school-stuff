package DP_visiteur;



public class Test_verb
{
    public static void main(String[] args) {
        verbe v1=new verbe_1er("danser");
        verbe v2=new verbe_2eme("fremir");

        System.out.println(v1.conjugueP1s());
        System.out.println(v1.conjugueP1sPluriel());

        VisiteurVerb vb_PS = new PasseSimple();
        String s1 = v1.accepte(vb_PS);
        String s2= v2.accepte(vb_PS);

        System.out.println(s1);
        System.out.println(s2);

        VisiteurVerb vb_pp = new participe_passer();

        String s3 = v1.accepte(vb_pp);
        String s4 = v2.accepte(vb_pp);

        System.out.println(s3);
        System.out.println(s4);

    }
}
