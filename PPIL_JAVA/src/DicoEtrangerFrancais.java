public interface DicoEtrangerFrancais {
    // @param: traduit le texte donne dans une langue etrangere
    // @return: si le text n'est pas reconnu, retourne le texte de original.

    String traduit(String text);
}
