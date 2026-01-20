#pragma once

#include "Expression.h"

/**
Repr�sente une fonction math�matique de la forme x |---> h(x) = f(x) op g(x)

o� op est un op�rateur binaire comme + ou * et x |---> f(x) et x |--->g(x) sont deux fonctions math�matiques

En m�moire, h est repr�sent� par un arbre binaire o� :

le fils gauche est la fonction x |--->f(x)
le fils  droit est la fonction x |--->g(x)

Cette classe permet de factoriser ce qui est commun aux classes Plus et Fois qui h�ritent de OpBinaire et qui repr�sentent respectivement les op�rateurs + et x
*/
class OpBinaire : public Expression
{
    Expression * gauche, * droit; // fils gauche et fils droit
public:
    OpBinaire( Expression * operandeGauche,  Expression * operandeDroit);
    OpBinaire( const OpBinaire & opBinaire);
    ~OpBinaire(void);

    Expression* getGauche() const ;
    Expression* getDroit() const ;

    operator string() const;

    /**
    retourne le symbole de l'op�rateur : '+', '*', ...
    d�fini par les classes d�riv�es
    */
    virtual char symbole() const = 0;
    /**
    Calcule la valeur de f(x)
    */
    double evaluer(const double & x) const;

    /**
    repr�sente le calcul � effectuer.
    d�fini par les classes d�riv�es
    */
    virtual double effectuer(const double & x, const double & y) const = 0;

    virtual Expression* accept(Visiteur & v) override = 0;
};

