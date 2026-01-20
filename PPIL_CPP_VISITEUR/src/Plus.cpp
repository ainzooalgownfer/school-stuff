#include "Plus.h"

#include <variant>

#include "Visiteur.h"

Plus::Plus( Expression * operandeGauche,  Expression * operandeDroit):OpBinaire(operandeGauche,operandeDroit){}
Plus::Plus( const Plus & plus):OpBinaire(plus){}

Expression* Plus::accept(Visiteur& v) {
     return v.visite(*this);
}



/**
Retourne une copie de l'arbre repr�sentant f
*/
/*virtual*/ Expression * Plus::clone () const
{
    return new Plus(*this);
}

/**
retourne le symbole de l'op�rateur : '+'
*/
/*virtual*/ char Plus::symbole() const
{
    return '+';
}

/**
repr�sente le calcul � effectuer :
retourne x + y
*/
/*virtual*/ double Plus::effectuer(const double & x, const double & y) const
{
    return x + y;
}