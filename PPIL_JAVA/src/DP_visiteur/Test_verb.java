package DP_visiteur;

public class Test_verb
{
    public static void main(String[] args) {
        verbe v1=new verbe_1er("danser");
        verbe v2=new verbe_2eme("fremir");

        System.out.println(v1.conjugueP1s());
        System.out.println(v1.conjugueP1sPluriel());


    }
}
