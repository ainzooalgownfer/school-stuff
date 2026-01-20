#pragma once
#include "opbinaire.h"

/**
Repr�sente une fonction math�matique de la forme x |---> h(x) = f(x) * g(x)

o�  x |---> f(x) et x |--->g(x) sont deux fonctions math�matiques

En m�moire, h est repr�sent� par un arbre binaire o� :

le fils gauche est la fonction x |--->f(x)
le fils  droit est la fonction x |--->g(x)

*/
class Fois : public OpBinaire
{
public:
    Fois( Expression * operandeGauche,  Expression * operandeDroit);
    Fois( const Fois & plus);




    /**
    Retourne une copie de l'arbre repr�sentant f
    */
    virtual Expression * clone () const;

    /**
    retourne le symbole de l'op�rateur : '*'
    */
    virtual char symbole() const;

    /**
    repr�sente le calcul � effectuer :
    retourne x * y
    */
    virtual double effectuer(const double & x, const double & y) const;
    virtual Expression* accept(Visiteur& v);
};

