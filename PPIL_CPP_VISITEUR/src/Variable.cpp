#include "Variable.h"

#include "Visiteur.h"

/**
Retourne une copie de l'arbre repr�sentant f
*/
/*virtual*/ Expression * Variable::clone () const
{
    return new Variable;
}

Expression* Variable::accept(Visiteur &v) {
   return v.visite(*this);
}

///**
//Conversion de f en string
//*/
//virtual const string toString() const = 0;

/*virtual*/ Variable::operator string() const
{
    return "x";
}

/**
Calcule la valeur de f(x)
*/
/*virtual*/ double Variable::evaluer(const double & x) const
{
    return x;
}
